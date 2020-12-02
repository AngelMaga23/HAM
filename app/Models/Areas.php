<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class areas extends Model
{
   protected $table = "areas";

    protected $primaryKey = "id";

    protected $fillable = [
      'nbArea',
      'pathArchivo',
      'DesAreas',
      'idzona',
      'numPersonasPermitidas',
      'fgAdmiteNinios',    ]; 

    public $timestamps = false;
}
