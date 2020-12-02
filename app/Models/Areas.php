<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Areas extends Model
{
   protected $table = "areas";

    protected $primaryKey = "id";

    protected $fillable = [
        'nbArea',
	'pathArchivo'
    ]; 

    public $timestamps = false;
    
    /*Estatus tiene mucha zonas*/
    public function zonas(){
      return $this ->hasMany(zonas::class,'id'); 
    }
}
