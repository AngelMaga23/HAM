<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotificacionController extends Controller
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
        try {
            
            $notifiaciones = DB::table('Notificaciones as n')
                                ->select(DB::raw('tn.nbTipoNotificacion,n.id as idreservacion,n.titulo,n.descripcion,n.fechaRegistro,n.fechaEvento,n.fgVisto,r.tpReservacion'))
                                ->join('TipoNotificacion as tn','n.idtipoNotificacion','=','tn.id')
                                ->join('reservaciones as r','n.idReservacion','=','r.id')
                                ->where('n.idUsuario',$id)
                                ->orderBy('n.id')
                                ->get();
            
            if(!$notifiaciones->isEmpty())
            {
                return response()->json([
                    "Estatus" => 1,
                    "Data" => $notifiaciones,
                    "Mensaje" => "Operación realizada con éxito"
                ]);
            }else
            {
                return response()->json([
                    "Estatus" => 0,
                    "Data" => $notifiaciones,
                    "Mensaje" => "No se encontraron elementos"
                ]);
            }

        } catch (\Throwable $th) {
            return response()->json([
                "Estatus" => -1,
                "Data" => $notifiaciones,
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
