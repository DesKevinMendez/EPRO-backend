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

        $qrAdmin =  QrCode::size(250)->generate("kevin@gmail.com");
        $Admin = new User;
        $Admin->nombre = "Kevin";
        $Admin->apellido = "Mendez";
        $Admin->carnet = "25-3992-2015";
        $Admin->email = "kevin@gmail.com";
        $Admin->password = "secret";
        $Admin->qr = $qrAdmin;
        $Admin->save();
        $Admin->assignRole($roleAdmin);

        $qrAlumno =  QrCode::size(250)->generate("maria@gmail.com");

        $Alumno = new User;
        $Alumno->nombre = "Maria";
        $Alumno->apellido = "Valladares";
        $Alumno->carnet = "17-3992-2017";
        $Alumno->email = "maria@gmail.com";
        $Alumno->password = "secret";
        $Alumno->qr = $qrAlumno;
        $Alumno->save();
        $Alumno->assignRole($roleEstudiante);


        $qrMaestro =  QrCode::size(250)->generate("maria2@gmail.com");

        $Alumno = new User;
        $Alumno->nombre = "Jorge";
        $Alumno->apellido = "Mancia";
        $Alumno->carnet = "17-3992-2017";
        $Alumno->email = "maestro@gmail.com";
        $Alumno->password = "secret";
        $Alumno->qr = $qrMaestro;
        $Alumno->save();
        $Alumno->assignRole($roleMaestro);

        $qrMaestro =  QrCode::size(250)->generate("jorge@mancia.com");

        $Alumno = new User;
        $Alumno->nombre = "Jorge";
        $Alumno->apellido = "Mancia";
        $Alumno->carnet = "17-3992-2017";
        $Alumno->email = "maestro2@gmail.com";
        $Alumno->password = "secret";
        $Alumno->qr = $qrMaestro;
        $Alumno->save();
        $Alumno->assignRole($roleMaestro);


        $qrMaestro =  QrCode::size(250)->generate("jorge.mancia@gmail.com");
    }
}
