<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SIS\User::create([
        	'nombre' => 'Administrador',
        	'nickname' => 'admin',
        	'password' => 'S1st3m4s',
        	'remember_token' => str_random(10),
        ]);

        //Descomentar si se desea crear usuarios por defecto para realizar pruebas (Opcional)
        // factory(SIS\Users::class,5)->create();
    }
}
