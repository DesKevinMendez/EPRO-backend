<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\User;
use App\IngresoParqueo;
use Carbon\Carbon;

class IngresoParqueoController extends Controller
{

    public function create(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'string|email|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        if(User::where('email', $request->email)->exists()){

            $user = User::select('id')->where('email', $request->email)->first();
            $verificaIngreso = IngresoParqueo::latest()->where('id_usuario', $user->id)->first();
            // Verifica que el ultimo registro tenga una hora de salida registrada
            if($verificaIngreso->hora_salida === null){
                $verificaIngreso->hora_salida = Carbon::now()->toTimeString();
                $verificaIngreso->update();
            }else{
                // En caso de que el ultimo registro del usuario tenga una hora de salida registrada
                $ingreso = new IngresoParqueo();
                $ingreso->id_usuario = $user->id;
                $ingreso->hora_entrada = Carbon::now()->toTimeString();
                $ingreso->fecha_registro = Carbon::now();
                $ingreso->id_parqueo = 3;
                $ingreso->save();
            }
            // Retorna 1 si hubo interaccion con la base de datos
            return 1;
        }
        // Retorna 0 si no existe un usuario con ese email
        return 0;
    }

}
