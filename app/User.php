<?php

namespace App;

use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\IngresoParqueo;
use App\Aranceles;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    

    protected $guarded= ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    // Relaciones
    public function IngresoParqueo()
    {
        return $this->hasMany(IngresoParqueo::class, 'id_usuario');
    }

    public function UltimoIngresoParqueo()
    {
        return $this->hasOne(IngresoParqueo::class, 'id_usuario');
    }

    public function Aranceles()
    {
        return $this->hasMany(Aranceles::class, 'id_usuario');
    }

    public function Arancel()
    {
        return $this->hasOne(Aranceles::class, 'id_usuario');
    }
    // Mutadores
    public function setPasswordAttribute($attribute)
    {
        $this->attributes['password'] = bcrypt($attribute);
    }

    public function setUrlAttribute($attribute)
    {
        dd($attribute);
        $this->attributes['url'] = str_replace('-', '_', $this->attributes['carnet']);
    }
}
