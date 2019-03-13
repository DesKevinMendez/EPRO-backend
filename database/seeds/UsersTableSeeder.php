<?php

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

        $Admin = new User;
        $Admin->nombre = "Kevin";
        $Admin->apellido = "Mendez";
        $Admin->carnet = "25-3992-2015";
        $Admin->email = "kevin@gmail.com";
        $Admin->password = "secret";
        $Admin->save();
        $Admin->assignRole($roleAdmin);


        $Admin = new User;
        $Admin->nombre = "Sonia";
        $Admin->apellido = "Valladares";
        $Admin->carnet = "17-3992-2017";
        $Admin->email = "sonia@gmail.com";
        $Admin->password = "secret";
        $Admin->save();
        $Admin->assignRole($roleEstudiante);
    }
}
