<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\TipoNotificacion;
use App\Models\Usuario;
use App\Models\Notificaciones;

use App\Http\Controllers\Controller;

use Carbon\Carbon;
use Illuminate\Notifications\Notification;
use LengthException;

class NotificacionController extends Controller
{
  public function Listartipn(){
	$nott=TipoNotificacion::all();
	return $nott;
    }
  public function Listar(){
	$not=Notificaciones::all();
	return $not;
    }
    public function Buscar($id){
      $not=Notificaciones::find($id);
      return $not;
    }
    public function ListarNotiRec(){
      $not =Notificaciones::where([
	    ['idtipoNotificacion','=','2']
      ])->get();
      return $not;
    }
    public function ListarUser(){
      $user = Usuario::where([
            ['Estatus', '=','Activo']
        ])->get();
        return $user;
    }
    public function SaveRecor(Request $request){
      foreach ($request['id'] as $ids){
        $date=Carbon::Now();
	$Notif =new Notificaciones();
	    $Notif -> titulo= $request['titulo'];
            $Notif -> descripcion=$request['descripcion'];
	    $Notif -> fechaEvento =$request['fechaEvento'];
	    $Notif -> fechaRegistro= $date->toDateTimeString();
	    $Notif -> subtitulo=$request['subtitulo'];
	    $Notif -> idtipoNotificacion=2; 	    
	$Notif -> idUsuario=$ids;
	$Notif->save() ;
		
      }
    }
    public function SaveServ(Request $request){
        $Json = $request -> input('Json', null);
        $ParametrosArray = json_decode($Json, true);
	
	$contador=$this->ListarUser();
	foreach($contador as $con){
	  $date=Carbon::Now();
	  $Notif = new Notificaciones();
	    $Notif -> titulo= $ParametrosArray['titulo'];
	    $Notif -> subtitulo=$ParametrosArray['subtitulo'];
            $Notif -> descripcion=$ParametrosArray['descripcion'];
	    $Notif -> fechaEvento =$ParametrosArray['fechaEvento'];
	    $Notif -> fechaRegistro= $date->toDateTimeString();
	    $Notif -> idtipoNotificacion=3; //$ParametrosArray['descripcion'];
	    $Notif -> idUsuario=$con->id;
	    echo  $Notif;
	    	  }

          $Respuesta = array(
                'status'        =>      'success',
                'code'          =>      '200',
                'message'     =>      'registro guardado',
                'Notification'         =>      $Notif
            );
	return $Notif; 
    }
}
