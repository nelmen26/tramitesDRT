<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Users
        Permission::create([
        	'name' => 'Listado de usuarios',
        	'slug' => 'users.index',
        	'description' => 'Lista y navega todos los usuarios del sistema',
        ]);
        Permission::create([
        	'name' => 'Creacion de usuario',
        	'slug' => 'users.create',
        	'description' => 'Crear un usuario al sistema',
        ]);
        Permission::create([
        	'name' => 'Edicion de usuario',
        	'slug' => 'users.edit',
        	'description' => 'Editar cualquier dato de un usuario del sistema',
        ]);
        Permission::create([
        	'name' => 'Eliminar usuario',
        	'slug' => 'users.destroy',
        	'description' => 'Eliminar cualquier usuario del sistema',
        ]);
        Permission::create([
        	'name' => 'Perfil de usuario',
        	'slug' => 'users.perfil',
        	'description' => 'Visualizar perfil de usuario del sistema y poder cambiar password',
        ]);

        //Roles
        Permission::create([
        	'name' => 'Listado de roles',
        	'slug' => 'roles.index',
        	'description' => 'Lista y navega todos los roles del sistema',
        ]);
        Permission::create([
        	'name' => 'Creacion de rol',
        	'slug' => 'roles.create',
        	'description' => 'Crear un rol al sistema',
        ]);
        Permission::create([
        	'name' => 'Edicion de rol',
        	'slug' => 'roles.edit',
        	'description' => 'Editar cualquier dato de un rol del sistema',
        ]);
        Permission::create([
        	'name' => 'Eliminar rol',
        	'slug' => 'roles.destroy',
        	'description' => 'Eliminar cualquier rol del sistema',
        ]);

        //Empresa
		Permission::create([
			'name' => 'Configuracion Empresa',
			'slug' => 'empresas.index',
			'description' => 'Configurar Datos del perfil de la empresa',
        ]);
    }
}
