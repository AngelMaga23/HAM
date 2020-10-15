<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HabitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $habitaciones = DB::table('habitacions as h')
            ->select(DB::raw('h.nbPiso, h.numMaximoPersonas, e.id as idestatu, e.nbEstatus, e.tpEstatus'))
            ->join('estatus as e','h.idEstatus','=','e.id')
            ->get();
    
            if(!$habitaciones->isEmpty()){
                return response()->json([
                    "Estatus" => 1,
                    "Data" => $habitaciones,
                    "Mensaje" => "Operación realizada con éxito"
                ]);
            }else{
                return response()->json([
                    "Estatus" => 0,
                    "Data" => $habitaciones,
                    "Mensaje" => "No se encontraron elementos"
                ]);
            }


        } catch (\Throwable $th) {
            return response()->json([
                "Estatus" => -1,
                "Data" => $habitaciones,
                "Mensaje" => $th
            ]);
        }

        // return $habitaciones;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
