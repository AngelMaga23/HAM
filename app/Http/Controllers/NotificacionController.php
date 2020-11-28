<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\TipoNotificacion;
use App\Models\Usuario;
use App\Http\Controllers\Controller;
use App\Models\Notificaciones;

use Carbon\Carbon;
use Illuminate\Notifications\Notification;
use LengthException;

class NotificacionController extends Controller
{
  public function Listartipn(){
	$nott=TipoNotificacion::all();
	return $nott;
    }
  public function ListarServ(){
	$not=Notificaciones::all();
	return $not;
    }
    public function BuscarServ($id){
      $not=Notificaciones::find($id);
      return $not;
    }
    public function ListarUser(){
      $user = Usuario::where([
            ['Estatus', '=','Activo']
        ])->get();
        return $user;
    }
    public function SaveServ(Request $request){
        $Json = $request -> input('Json', null);

        $ParametrosArray = json_decode($Json, true);
	/*
        $Validacion = \Validator::make($ParametrosArray,[
            'titulo'    =>      'required',
        ]);

        if($Validacion -> fails()){

            $Respuesta = array( 
                'status'        =>      'error',
                'code'          =>      '500',
                'message'       =>      'Error de validacion',
		'errors'        =>      $Validacion -> errors()
            );

	} else {*/
	  $contador=$this->ListarUser();
	foreach($contador as $con){
	  $date=Carbon::Now();

	  $Notif = new Notificaciones();

            $Notif -> titulo= $ParametrosArray['titulo'];
            $Notif -> descripcion=$ParametrosArray['descripcion'];
	    $Notif -> fechaEvento =$ParametrosArray['fechaEvento'];
	    $Notif -> fechaRegistro= $date->toDateTimeString();
	    $Notif -> idtipoNotificacion=3; //$ParametrosArray['descripcion'];
	    $Notif -> idUsuario=$con->id;
	    $Notif->save() ;
	    	  }




          $Respuesta = array(
                'status'        =>      'success',
                'code'          =>      '200',
                'message'     =>      'registro guardado',
                'Notification'         =>      $Notif
            );

	  
	  
    }
}
