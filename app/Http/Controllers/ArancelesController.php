<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aranceles;
use App\User;

class ArancelesController extends Controller
{
    public function index()
    {
        return Aranceles::with('User')->get();
    }

    public function aranceles()
    {
        return User::with('Aranceles')->get();
    }
}
