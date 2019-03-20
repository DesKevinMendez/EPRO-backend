<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;

class HomeController extends Controller
{
    
    public function index()
    {
        $user = JWTAuth::toUser();
        
        return $user;
    }
}
