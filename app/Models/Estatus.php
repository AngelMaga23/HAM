<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estatus extends Model
{
    protected $table = "estatus";

    protected $primaryKey = "id";

    protected $fillable = [
        'nbEstatus',
	'tpEstatus'
    ];

    public $timestamps = false;
    
    /*Estatus tiene mucha zonas*/
    public function zonas(){
      return $this ->hasMany(zonas::class,'id'); 
    }
}


