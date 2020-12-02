<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class personas extends Model
{
    protected $table = "personas";

    protected $primaryKey = "id";

    protected $fillable = [
        'nbPersonas',
	'apPersonas',
	'apMaterno',
	'feNacimiento',
	'idGenero',
	'idEstatus',
	'nbNacionalidad'

    ];

    public $timestamps = false;
    

}
