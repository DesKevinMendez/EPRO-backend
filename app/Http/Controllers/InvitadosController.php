<?php

namespace App\Http\Controllers;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;
use App\Invitados;
use Carbon\Carbon;
use Validator;
use App\Events\SeendQR;
use PDF;

class InvitadosController extends Controller
{

    public function index(){
        return Invitados::latest()->get();
    }

    public function create(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $image =  QrCode::size(250)->generate($request->email);

        $user = Invitados::create([
            'nombre'=>$request->nombre,
            'apellido'=> $request->apellido,
            'email'=>$request->email,
            'fecha_registro'=>Carbon::now(),
            'qr'=> $image,
        ]);

        SeendQR::dispatch($user);
        return 1;
    }

    public function reporte(){
        $invitados = Invitados::latest()->get();
        $pdf = PDF::loadView('reportes.invitados', ['invitados'=>$invitados]);

        return $pdf->download('invoice.pdf');
    }
}
