<?php

use Illuminate\Database\Seeder;

class EmpresasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SIS\Empresa::create([
			'nombre' => 'CODE-WEB',
			'sigla' => 'CODEWEB',
			'slogan' => 'Responsive Web Design',
			'logo' => 'code-web.png',
			'direccion' => 'Av. Julio Villa 326',
			'zona' => 'Alto Delicias',
			'telefono' => '64-55510',
			'email' => 'carlos.santesp@gmail.com'
		]);
    }
}
