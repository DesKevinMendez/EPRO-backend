<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use JWTAuth;
use App\User;

class EstudiantesController extends Controller
{
    public function index()
    {
        return User::with('UltimoIngresoParqueo', 'Arancel')->get();
    }

    public function findEstudent($url)
    {
        return User::where('url', $url)->first();
    }

    public function ChangePass(Request $request)
    {

        // password    000000
        // password_nuevo    000000
        // password_confirmation    000000
        $validator = Validator::make($request->all(), [
            'password_actual' => 'min:6|required',
            'password' => 'confirmed|required',
            'password_confirmation' => 'min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $user = JWTAuth::toUser();

        if (password_verify($request->get('password_actual'), $user->password)) {
            $user->password = $request->get('password');
            $user->save();
            return [
                'error' => false,
                'mensaje' => "La contraseña ha sido cambiada exitosamente"
            ];
        } else {
            return [
                'error' => true,
                'mensaje' => "La contraseña actual, no coincide, inténtalo de nuevo"
            ];
        }
    }
}
