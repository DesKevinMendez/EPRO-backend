<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aranceles extends Model
{
    public function User()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
