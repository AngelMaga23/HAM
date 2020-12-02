<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Zonas;
use App\Http\Controllers\Controller;

use function GuzzleHttp\Promise\all;

class ZonaController extends Controller
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

   // function web 
    public function Listar(){ 
        $Zona =zonas::all(); 
        return $Zona;
    }

    public function Buscar($Id){

        $Zonas = zonas::find($Id);
        return $Zonas;

    }

    public function Eliminar(Request $Peticion){

        $Json = $Peticion -> input('Json', null);

        $ParametrosArray = json_decode($Json, true);

        $Zonas = $this -> Buscar($ParametrosArray['IdCanal']);

        $Zonas -> RegStatus = "false";

        $Zonas -> save();

        $Respuesta = array(
            'status'        =>      'success',
            'code'          =>      '200',
            'message'       =>      'registro eliminado',
            'Zonas'         =>       $Zonas
        );

        return response() -> json($Respuesta,$Respuesta['code']);

    }

    public function Actualizar(Request $Peticion){

        $Json = $Peticion -> input('Json', null);

        $ParametrosArray = json_decode($Json, true);

        $Zonas = $this -> Buscar($ParametrosArray['IdCanal']);

        $Validacion = \Validator::make($Zonas,[
            'Nombre'                =>      'required',
          //  'IdEmpresaSucursal'     =>      'required'
        ]);

        if($Validacion -> fails()){

            $Respuesta = array(
                'status'        =>      'error',
                'code'          =>      '500',
                'message'       =>      'Error de validacion',
                'errors'        =>      $Validacion -> errors()
            );

        } else {

            //se obtiene el id de la sucursal con el usuario admin logeado
	    $Zonas -> nbZona = $ParametrosArray['nbZona'];
            $Zonas -> DesZonas = $ParametrosArray['DesZonas'];
	    $Zonas-> numPersonasPermitidasMax=$ParametrosArray['numPersonasPermitidasMax'];
            $Zonas -> pathArchivo=$ParametrosArray['pathArchivo'] ;
            $Zonas -> save();

            $Respuesta = array(
                'status'        =>      'success',
                'code'          =>      '200',
                'message'       =>      'registro modificado',
                'zonas'         =>      $Zonas
            );

        }

        return response() -> json($Respuesta,$Respuesta['code']);

    }
    public function saveimg(Request $request){
	 /*   if($request->hasFile('pathArchivo')){
	    $file=$request ->file('pathArchivo');
	    $name = time().$file->getClientOriginalName();
	    $file->move(public_path().'/img/',$name); 
	    return $name; 
	  }
	  */
      return $request;

    }

    public function Agregar(Request $Peticion){

        $Json = $Peticion -> input('Json', null);

        $ParametrosArray = json_decode($Json, true);

        $Validacion = \Validator::make($ParametrosArray,[
            'nbZona'                =>      'required',
        ]);

        if($Validacion -> fails()){

            $Respuesta = array( 
                'status'        =>      'error',
                'code'          =>      '500',
                'message'       =>      'Error de validacion',
              'errors'        =>      $Validacion -> errors()
            );

	} else {
	
          $Zona = new zonas();

            $Zona -> Nombre = $ParametrosArray['Nombre'];
            $Zona -> DesZonas = $ParametrosArray['DesZonas'];
	    $Zona -> numPersonasPermitidasMax=$ParametrosArray['numPersonasPermitidasMax'];
            $Zona -> pathArchivo=$ParametrosArray['pathArchivo'] ;

            $Zona -> save();

            $Respuesta = array(
                'status'        =>      'success',
                'code'          =>      '200',
                'message'       =>      'registro guardado',
                'canal'         =>      $Zona
            );
	  
        }

       /* return response() -> json($Respuesta,$Respuesta['code']);*/
	return $Peticion;
    }
}
