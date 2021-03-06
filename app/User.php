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

    protected $guard_name = "api";
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

    public function getRouteKeyName(){
        return 'url';
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
        $url = str_replace(' ', '-', $this->attributes['nombre'].' '.$this->attributes['apellido']);
        if (static::where('url', $url)->exists()) {
            //Obtiene el ultimo post que coincida con la url y le sumauno, para tner la nueva URL
            $tempo = static::latest()->where('url', $url)->first();
            $url = "{$url}-".++$tempo->id;
        }
        $this->attributes['url'] = strtolower($url);

    }

}
