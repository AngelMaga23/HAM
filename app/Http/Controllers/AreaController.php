<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Area;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = "";
        try {

            $areas = DB::table('areas as a')
            ->select(DB::raw('a.id as idarea, a.nbArea,a.DesAreas,a.pathArchivo, a.numPersonasPermitidas, a.fgAdmiteNinios, z.nbZona'))
            ->join('zonas as z','a.idZona','=','z.id')
            ->get();

            if(!$areas->isEmpty())
            {
                return response()->json([
                    "Estatus" => 1,
                    "Data" => $areas,
                    "Mensaje" => "Operación realizada con éxito"
                ]);
            }else{

                return response()->json([
                    "Estatus" => 0,
                    "Data" => $areas,
                    "Mensaje" => "No se encontraron elementos"
                ]);
            }

        } catch (\Throwable $th) {
            return response()->json([
                "Estatus" => -1,
                "Data" => $areas,
                "Mensaje" => $th
            ]);
        }


       
    }

    public function get_area($idzona){
        $area = "";
        try {

            $area = DB::table('areas as a')
            ->select(DB::raw('a.id as idarea, a.nbArea,a.pathArchivo, a.numPersonasPermitidas, a.fgAdmiteNinios, z.nbZona'))
            ->join('zonas as z','a.idZona','=','z.id')
            ->where('z.id',$idzona)
            ->get();

            if(!$area->isEmpty()){
                return response()->json([
                    "Estatus" => 1,
                    "Data" => $area,
                    "Mensaje" => "Operación realizada con éxito"
                ]);
            }else{
                return response()->json([
                    "Estatus" => 0,
                    "Data" => $area,
                    "Mensaje" => "No se encontraron elementos"
                ]);
            }

        } catch (\Throwable $th) {
            return response()->json([
                "Estatus" => -1,
                "Data" => $area,
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
        $validatedData = $request->validate([
            'nombre_area' => 'required',
            'imagen' => 'required|file',
            'idzona' => 'required|integer',
            'num_personas' => 'required|integer',
            'fg_admite' => 'required|integer',
        ]);

        try {

            $area = new Area();
            if($request->hasFile('imagen')){

                $file = $request->file('imagen');
                $nameimg = time().$file->getClientOriginalName();
                $file->move(public_path().'/images',$nameimg);
            }
    
            $area->nbArea = $request->nombre_area;
            $area->pathArchivo = $nameimg;
            $area->idZona = $request->idzona;
            $area->numPersonasPermitidas = $request->num_personas;
            $area->fgAdmiteNinios = $request->fg_admite;
    
            $area->save();

            return response()->json([
                "message" => "Área guardada correctamente"
            ]);
            
        } catch (\Throwable $th) {
            return response()->json([
                "message" => $th
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
