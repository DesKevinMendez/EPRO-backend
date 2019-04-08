<?php

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = Role::create(['name' => 'Admin']);
        $roleEstudiante = Role::create(['name' => 'Estudiante']);
        $roleMaestro = Role::create(['name' => 'Maestro']);



        $userAdminQR = [
            'nombre'=>"Kevin",
            'apellido'=>"Mendez",
            'carnet'=>"25-3992-2015",
            'email' => "kevin@gmail.com",
        ];

        $qrAdmin =  QrCode::size(250)->generate(implode(',', $userAdminQR));
        $Admin = new User;
        $Admin->nombre = "Kevin";
        $Admin->apellido = "Mendez";
        $Admin->carnet = "25-3992-2015";
        $Admin->email = "kevin@gmail.com";
        $Admin->password = "secret";
        $Admin->qr = $qrAdmin;
        $Admin->save();
        $Admin->assignRole($roleAdmin);



        $userAlumnoQR = [
            'nombre'=>"Maria",
            'apellido'=>"Valladares",
            'carnet'=>"17-3992-2017",
            'email' => "maria@gmail.com",
        ];

        $qrAlumno =  QrCode::size(250)->generate(implode(',', $userAlumnoQR));

        $Alumno = new User;
        $Alumno->nombre = "Maria";
        $Alumno->apellido = "Valladares";
        $Alumno->carnet = "17-3992-2017";
        $Alumno->email = "maria@gmail.com";
        $Alumno->password = "secret";
        $Alumno->qr = $qrAlumno;
        $Alumno->save();
        $Alumno->assignRole($roleEstudiante);


        $userMaestroQR = [
            'nombre'=>"Maria",
            'apellido'=>"Valladares",
            'carnet'=>"17-3992-2017",
            'email' => "maria2@gmail.com",
        ];

        $qrMaestro =  QrCode::size(250)->generate(implode(',', $userMaestroQR));

        $Alumno = new User;
        $Alumno->nombre = "Jorge";
        $Alumno->apellido = "Mancia";
        $Alumno->carnet = "17-3992-2017";
        $Alumno->email = "maestro@gmail.com";
        $Alumno->password = "secret";
        $Alumno->qr = $qrMaestro;
        $Alumno->save();
        $Alumno->assignRole($roleMaestro);

        $userMaestroQR = [
            'nombre'=>"Maria",
            'apellido'=>"Valladares",
            'carnet'=>"17-3992-2017",
            'email' => "maria@gmail.com",
        ];

        $qrMaestro =  QrCode::size(250)->generate(implode(',', $userMaestroQR));

        $Alumno = new User;
        $Alumno->nombre = "Jorge";
        $Alumno->apellido = "Mancia";
        $Alumno->carnet = "17-3992-2017";
        $Alumno->email = "maestro2@gmail.com";
        $Alumno->password = "secret";
        $Alumno->qr = $qrMaestro;
        $Alumno->save();
        $Alumno->assignRole($roleMaestro);
    }
}
