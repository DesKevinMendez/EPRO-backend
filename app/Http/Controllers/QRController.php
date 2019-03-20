<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
use JWTAuth;
use App\User;

class QRController extends Controller
{
	public function index(Request $request)
	{

		$user = JWTAuth::toUser();
		
		return $user;
	}
}
