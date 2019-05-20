<?php

namespace App\Http\Controllers;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;
use App\Invitados;
use Carbon\Carbon;
use Validator;
use App\Events\SeendQR;

class InvitadosController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'name' => 'required|string|max:255',
            'apell' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $image =  QrCode::size(250)->generate($request->email);

        $user = Invitados::create([
            'nombre'=>$request->name,
            'apellido'=> $request->apell,
            'email'=>$request->email,
            'fecha_registro'=>Carbon::now(),
            'qr'=> $image,
        ]);

        SeendQR::dispatch($user);
        return 1;
    }
}
