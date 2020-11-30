<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoNotificacion extends Model
{
   protected $table = "TipoNotificacion";

    protected $primaryKey = "id";

    protected $fillable = [
        'nbTipoNotificacion',
    ];

    public $timestamps = false;

}
