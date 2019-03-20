<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Parqueo;
use App\User;

class IngresoParqueo extends Model
{
    protected $guarded = ['id_parqueo'];
    //Relaciones
    public function User()
    {
        return $this->hasOne(User::class, 'id', 'id_usuario');
    }

    public function Parqueo()
    {
        return $this->hasOne(Parqueo::class, 'id');
    }
}
