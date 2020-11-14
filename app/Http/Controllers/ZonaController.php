<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Zonas;

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
        $zonas = "";
        try {

            $zonas = DB::table('zonas as z')
            ->select(DB::raw('z.id as idzona, z.nbZona,z.DesZonas, z.pathArchivo,z.numPersonasPermitidasMax, e.nbEstatus, e.tpEstatus, count(a.idZona) as cantAreas'))
            ->join('estatus as e','z.idEstatus','=','e.id')
            ->leftJoin('areas as a','z.id','=','a.idZona')
            ->groupBy('a.idZona')
            ->get();

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

            /*se obtiene el id de la sucursal con el usuario admin logeado
            $IdSucursal = auth()->user('web')->IdEmpresaSucursal;

	    $EmpresaSucursal = EmpresaSucursal::find($IdSucursal);*/
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

        return response() -> json($Respuesta,$Respuesta['code']);

    }
}
