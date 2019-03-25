<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use App\Aranceles;
use App\IngresoParqueo;

class HomeController extends Controller
{
    
    public function index()
    {
        $user = JWTAuth::toUser();
        $data = [
        	'user'=>$user,
        	'home'=>[
        		[
        			'titulo'=>"Último pago hecho",
        			'contenido'=>Aranceles::latest()->where('id_usuario', $user->id)->first()
        		],
        		[
        			'titulo'=> "Horarios parqueo",
        			'contenido'=>[
        				'hora_inicio'=>'6:00 AM',
	    				'hora_final'=>'8:00 PM'	
        			]
	    			
	    		],
	        	[
	        		'titulo'=> "Ingreso del parqueo",
	        		'contenido'=>IngresoParqueo::latest()->with('Parqueo.Edificio')->where('id_usuario', $user->id)->first()
	        	]
        	]
        	
        ];
        if($user->hasRole('Admin')){
            $data['role'] = [
                'role'=>'Admin'
            ];
        }else if($user->hasRole('Estudiante')){
            $data['role'] = [
                'role'=>'Estudiante'
            ];
        }

        return $data;
    }
}
