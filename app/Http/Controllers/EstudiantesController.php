<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class EstudiantesController extends Controller
{
    public function index(){
    	return User::with('UltimoIngresoParqueo', 'Arancel')->get();
    }

    public function findEstudent($url){
    	return User::where('url', $url)->first();
    }
}
