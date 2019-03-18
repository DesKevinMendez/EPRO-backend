<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
use App\User;

class QRController extends Controller
{
	public function index()
	{
		$user = User::find(1);
		$image =  QrCode::size(250)->generate("hola");
		return strlen($image);
	}
}
