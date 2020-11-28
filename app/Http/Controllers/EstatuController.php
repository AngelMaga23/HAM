<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Estatus;
use App\Http\Controllers\Controller;
class EstatuController extends Controller
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
	$estatus=estatus::all();
	return $estatus;
    }
    public function Buscar($id){
      $estatus=estatus::find($id);
      return $estatus;
    }
    public function Agregar(Request $Peticion){
           $Json = $Peticion -> input('Json', null);

        $ParametrosArray = json_decode($Json, true);

        $Validacion = \Validator::make($ParametrosArray,[
            'nbEstatus'    =>      'required',
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
            $estatus = new estatus();

            $estatus -> nbEstatus = $ParametrosArray['nbEstatus'];
            $estatus -> tpEstatus=$ParametrosArray['tpEstatus'] ;

            $estatus -> save();

            $Respuesta = array(
                'status'        =>      'success',
                'code'          =>      '200',
                'message'       =>      'registro guardado',
                'canal'         =>      $estatus
            );

        }

        return response() -> json($Respuesta,$Respuesta['code']);
    }
    public function Actualizar(Request $Peticion){
      $Json =$Peticion -> input('Json',null);

      $ParametrosArray =json_decode($Json,true);

      $estatus=$this ->Buscar($ParametrosArray['id']);

      $Validacion =\Validator::make($estatus,[
	   'nbEstatus'    =>      'required',
        ]);

        if($Validacion -> fails()){

            $Respuesta = array( 
                'status'        =>      'error',
                'code'          =>      '500',
                'message'       =>      'Error de validacion',
		'errors'        =>      $Validacion -> errors()
            );

	}else{
	  $estatus=new estatus();
	  $estatus -> nbEstatus=$ParametrosArray['nbEstatus'];
	  $estatus -> tpEstatus=$ParametrosArray['tpEstatus'];
	  $estatus -> save();

          $Respuesta = array(
                'status'        =>      'success',
                'code'          =>      '200',
                'message'       =>      'registro guardado',
                'canal'         =>      $estatus
            );
	}      
       	return response() -> json($Respuesta,$Respuesta['code']);

    }
    public function Eliminar(Request $Peticion){

    }   



}
