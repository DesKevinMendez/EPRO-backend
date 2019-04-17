<?php

namespace App\Http\Controllers;

use App\User;
use JWTAuth;
use App\IngresoParqueo;
use Illuminate\Http\Request;

class ParqueoController extends Controller
{

    public function index()
    {
        return User::with('IngresoParqueo')->find(1);
    }

    public function IngresoParqueo()
    {
    	$user = JWTAuth::toUser();
        return IngresoParqueo::latest()->with('Parqueo.Edificio')->where('id_usuario', $user->id)->get();
    }
}
