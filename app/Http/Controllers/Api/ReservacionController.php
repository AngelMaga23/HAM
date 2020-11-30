<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            DB::table('reservaciones')->insert([

                'tpReservacion' => $request->tpReservacion,
                'idDiscriminador' => $request->idDiscriminador,
                'idUsuario' => $request->idUsuario,
                'numPersonas' => $request->numPersonas,
                'horaInicio' => $request->horaInicio,
                'horaFin' => $request->horaFin,
                'feAsistencia' => $request->feAsistencia,
                'feReservacion' => $request->feReservacion,
                'feRegistro' => $request->feRegistro,
                'Estatus' => $request->Estatus

            ]);

            return response()->json([
                "Estatus" => 1,
                "Mensaje" => "Operación realizada con éxito"
            ]);


        } catch (\Throwable $th) {

            return response()->json([
                "Estatus" => -1,
                "Mensaje" => $th
            ]);

        }
    }

    public function update_ocupado(Request $request)
    {
        try {
            
                DB::table('reservaciones')
                    ->where('id',$request->idreservacion)
                    ->update([
                        'Estatus' => 'Ocupado'
                    ]);

                return response()->json([
                    "Estatus" => 1,
                    "Mensaje" => "Operación realizada con éxito"
                ]);

        } catch (\Throwable $th) {

            return response()->json([
                "Estatus" => -1,
                "Mensaje" => $th
            ]);
        }
    }

    public function update_finalizado(Request $request)
    {
        try {
            
                DB::table('reservaciones')
                    ->where('id',$request->idreservacion)
                    ->update([
                        'Estatus' => 'Finalizado'
                    ]);

                return response()->json([
                    "Estatus" => 1,
                    "Mensaje" => "Operación realizada con éxito"
                ]);

        } catch (\Throwable $th) {
            
            return response()->json([
                "Estatus" => -1,
                "Mensaje" => $th
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {

            $reservaciones = DB::table('reservaciones as r')
                ->select(DB::raw('r.id as idreservacion,r.feReservacion,r.tpReservacion,a.nbArea,a.pathArchivo,a.DesAreas,r.numPersonas,r.Estatus,r.feRegistro'))
                ->join('areas as a','r.idDiscriminador','=','a.id')
                ->where('r.idUsuario',$id)
                ->orderBy('r.id')
                ->get();

            if(!$reservaciones->isEmpty())
            {
                return response()->json([
                    "Estatus" => 1,
                    "Data" => $reservaciones,
                    "Mensaje" => "Operación realizada con éxito"
                ]);

            }else{
                return response()->json([
                    "Estatus" => 0,
                    "Data" => $reservaciones,
                    "Mensaje" => "No se encontraron elementos"
                ]);
            }

        } catch (\Throwable $th) {

            return response()->json([
                "Estatus" => -1,
                "Data" => $reservaciones,
                "Mensaje" => $th
            ]);

        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
