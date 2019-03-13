<?php

namespace App\Http\Controllers;

use App\User;
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
        return IngresoParqueo::with('User')->get();
    }
}
