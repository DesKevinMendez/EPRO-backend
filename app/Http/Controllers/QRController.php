<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;

class QRController extends Controller
{
	public function index(Request $request)
	{

		$user = JWTAuth::toUser();

		return $user;
	}
}
