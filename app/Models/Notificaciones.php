<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Notificaciones extends Model
{
    protected $table = "Notificaciones";

    protected $primaryKey = "id";

    protected $fillable = [
        'idtipoNotificacion',
	'titulo',
	'subtitulo',
	'descripcion',
	'fechaRegistro',
	'fechaEvento',
	'feVisto',
	'idUsuario', 
	'fgReservacion',
	'idReservacion'	
    ];

    public $timestamps = false;
    
   
}
