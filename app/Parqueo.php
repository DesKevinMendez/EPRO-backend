<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\IngresoParqueo;
use App\Edificio;

class Parqueo extends Model
{
    protected $guarded = ['id'];

    //Relaciones

    public function IngresoParqueo()
    {
        return $this->belongsToMany(IngresoParqueo::class, 'id_parqueo');
    }

    public function Edificio()
    {
        return $this->hasOne(Edificio::class, 'id', 'edificio_id');
    }
}
