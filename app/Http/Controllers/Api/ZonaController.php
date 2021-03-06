<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ZonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zonas = "";
        try {

            $zonas = DB::table('zonas')
                        ->select(DB::raw('zonas.id as idzona, zonas.nbZona, zonas.DesZonas, zonas.pathArchivo, zonas.numPersonasPermitidasMax, estatus.nbEstatus, estatus.tpEstatus,(SELECT COUNT(*) FROM areas WHERE areas.idZona = zonas.id) as cantAreas'))
                        ->join('estatus','zonas.idEstatus','=','estatus.id')
                        ->leftJoin('areas','zonas.id','=','areas.idZona')
                        ->groupBy('zonas.id')
                        ->get();

            // $zonas = DB::table('zonas as z')
            // ->select(DB::raw('z.id as idzona, z.nbZona,z.DesZonas, z.pathArchivo,z.numPersonasPermitidasMax, e.nbEstatus, e.tpEstatus, count(a.idZona) as cantAreas'))
            // ->join('estatus as e','z.idEstatus','=','e.id')
            // ->leftJoin('areas as a','z.id','=','a.idZona')
            // ->groupBy('a.idZona')
            // ->get();

            if(!$zonas->isEmpty())
            {
                return response()->json([
                    "Estatus" => 1,
                    "Data" => $zonas,
                    "Mensaje" => "Operación realizada con éxito"
                ]);

            }else{
                return response()->json([
                    "Estatus" => 0,
                    "Data" => $zonas,
                    "Mensaje" => "No se encontraron elementos"
                ]);

            }

        } catch (\Throwable $th) {
            return response()->json([
                "Estatus" => -1,
                "Data" => $zonas,
                "Mensaje" => $th
            ]);	
        }
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
