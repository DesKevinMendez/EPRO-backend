<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use App\Aranceles;
use App\User;

class ArancelesController extends Controller
{
    public function index()
    {
    	$user = JWTAuth::toUser();
        return Aranceles::where('id_usuario', $user->id)->get();
    }

    public function aranceles()
    {
    	$user = JWTAuth::toUser();
    	return $user;
        return User::with('Aranceles')->where('id_usuario', $user->id)->get();
    }
}
