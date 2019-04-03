<?php

use Illuminate\Database\Seeder;

use Caffeinated\Shinobi\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Administrador',
            'slug' => 'admin',
            'description' => 'Rol para usuarios con acceso total al sistema',
            'special' => 'all-access'
        ]);

        Role::create([
            'name' => 'Inactivo',
            'slug' => 'no-access',
            'description' => 'Rol para usuarios no activo del sistema',
            'special' => 'no-access'
        ]);

        Role::create([
            'name' => 'Invitado',
            'slug' => 'guest',
            'description' => 'Rol para usuarios invitados al sistema',
        ]);

        SIS\User::find(1)->roles()->attach(1);

    }
}
