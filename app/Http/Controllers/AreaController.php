<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Areas;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\areas as AppAreas;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
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
    public function Listar(){
	$areas=areas::all();
	return $areas;
    }
    public function Buscar($id){
      $areas=areas::find($id);
      return $areas;
    }
    public function Save(Request $request){
	  $Json =$request ->input('Json',null);
	  $data=json_decode($Json,true);

	  $areas =new areas();
	  $areas ->nbArea=$data['nbArea'] ;
	  $areas ->DesAreas=$data['DesAreas'] ;
	  $areas ->idzona=$data['idzona'] ;
	  $areas ->numPersonasPermitidas=$data['numPersonasPermitidas'] ;
	  $areas ->fgAdmiteNinios=$data['fgAdmiteNinios'] ;
	  $areas ->save();

    }
}
