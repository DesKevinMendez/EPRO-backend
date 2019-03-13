<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edificio extends Model
{
    public function Parqueo()
    {
        return $this->hasOne(Parqueo::class);
    }
}
