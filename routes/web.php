<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Rutas para el modulo de Contribuyentes
Route::get('contribuyentes', 'ContribuyenteController@index')->name('contribuyentes.index')->middleware('permission:contribuyentes.index');
Route::get('contribuyentes/create', 'ContribuyenteController@create')->name('contribuyentes.create')->middleware('permission:contribuyentes.create');
Route::post('contribuyentes/store', 'ContribuyenteController@store')->name('contribuyentes.store')->middleware('permission:contribuyentes.create');
Route::get('contribuyentes/{contribuyente}/edit', 'ContribuyenteController@edit')->name('contribuyentes.edit')->middleware('permission:contribuyentes.edit');
Route::put('contribuyentes/{contribuyente}', 'ContribuyenteController@update')->name('contribuyentes.update')->middleware('permission:contribuyentes.edit');
Route::delete('contribuyentes/{contribuyente}/delete', 'ContribuyenteController@destroy')->name('contribuyentes.destroy')->middleware('permission:contribuyentes.destroy');

// Rutas para el modulo de areas
Route::get('areas', 'AreaController@index')->name('areas.index')->middleware('permission:areas.index');
Route::get('areas/create', 'AreaController@create')->name('areas.create')->middleware('permission:areas.create');
Route::post('areas/store', 'AreaController@store')->name('areas.store')->middleware('permission:areas.create');
Route::get('areas/{area}/edit', 'AreaController@edit')->name('areas.edit')->middleware('permission:areas.edit');
Route::put('areas/{area}', 'AreaController@update')->name('areas.update')->middleware('permission:areas.edit');
Route::delete('areas/{area}/delete', 'AreaController@destroy')->name('areas.destroy')->middleware('permission:areas.destroy');

// Rutas para el modulo de tramites
Route::get('tramites', 'TramiteController@index')->name('tramites.index')->middleware('permission:tramites.index');
Route::get('tramites/create', 'TramiteController@create')->name('tramites.create')->middleware('permission:tramites.create');
Route::post('tramites/store', 'TramiteController@store')->name('tramites.store')->middleware('permission:tramites.create');
Route::get('tramites/{tramite}/edit', 'TramiteController@edit')->name('tramites.edit')->middleware('permission:tramites.edit');
Route::put('tramites/{tramite}', 'TramiteController@update')->name('tramites.update')->middleware('permission:tramites.edit');
Route::delete('tramites/{tramite}/delete', 'TramiteController@destroy')->name('tramites.destroy')->middleware('permission:tramites.destroy');

// Rutas para el modulo de Historial
Route::get('historials', 'TramiteController@historial')->name('historials.index')->middleware('permission:historials.index');

// Rutas para el modulo de derivacions
Route::get('derivacions', 'DerivacionController@index')->name('derivacions.index')->middleware('permission:derivacions.index');
Route::get('derivacions/create', 'DerivacionController@create')->name('derivacions.create')->middleware('permission:derivacions.create');
Route::post('derivacions/store', 'DerivacionController@store')->name('derivacions.store')->middleware('permission:derivacions.create');
Route::get('derivacions/{derivacion}/edit', 'DerivacionController@edit')->name('derivacions.edit')->middleware('permission:derivacions.edit');
Route::put('derivacions/{derivacion}', 'DerivacionController@update')->name('derivacions.update')->middleware('permission:derivacions.edit');
Route::delete('derivacions/{derivacion}/delete', 'DerivacionController@destroy')->name('derivacions.destroy')->middleware('permission:derivacions.destroy');
Route::put('derivacions/{derivacion}/recibir', 'DerivacionController@recibir')->name('derivacions.recibir')->middleware('permission:derivacions.recibir');
Route::get('derivacions/{derivacion}/entregar', 'DerivacionController@entregar')->name('derivacions.entregar')->middleware('permission:derivacions.entregar');
Route::get('derivacions/{derivacion}/entregar', 'DerivacionController@entregar')->name('derivacions.entregar')->middleware('permission:derivacions.entregar');
Route::put('derivacions/{derivacion}/observar', 'DerivacionController@observar')->name('derivacions.observar')->middleware('permission:derivacions.observar');
Route::post('tramites', 'DerivacionController@addTramiteDerivacion')->name('derivacions.addTramiteDerivacion')->middleware('permission:derivacions.addTramiteDerivacion');
Route::post('derivacions', 'DerivacionController@addDerivacion')->name('derivacions.addDerivacion')->middleware('permission:derivacions.addDerivacion');

Route::group(['prefix'=> 'configuracion'], function(){
	// Rutas para el modulo de empresa
	Route::get('empresas', 'EmpresaController@index')->name('empresas.index')->middleware('permission:empresas.index');
	Route::post('empresas/store', 'EmpresaController@store')->name('empresas.store')->middleware('permission:empresas.index');
  	Route::post('empresas/{empresa}/upload','EmpresaController@upload')->name('empresas.upload')->middleware('permission:empresas.index');
});

Route::group(['prefix' => 'administracion'], function(){
	// Rutas para el modulo de usuarios
	Route::get('users', 'UserController@index')->name('users.index')->middleware('permission:users.index');
	Route::get('users/create', 'UserController@create')->name('users.create')->middleware('permission:users.create');
	Route::post('users/store', 'UserController@store')->name('users.store')->middleware('permission:users.create');
	Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')->middleware('permission:users.edit');
	Route::put('users/{user}', 'UserController@update')->name('users.update')->middleware('permission:users.edit');
	Route::delete('users/{user}/delete', 'UserController@destroy')->name('users.destroy')->middleware('permission:users.destroy');

	// Rutas para el modulo de roles
	Route::get('roles', 'RoleController@index')->name('roles.index')->middleware('permission:roles.index');
	Route::get('roles/create', 'RoleController@create')->name('roles.create')->middleware('permission:roles.create');
	Route::post('roles/store', 'RoleController@store')->name('roles.store')->middleware('permission:roles.create');
	Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')->middleware('permission:roles.edit');
	Route::put('roles/{role}', 'RoleController@update')->name('roles.update')->middleware('permission:roles.edit');
	Route::delete('roles/{role}/delete', 'RoleController@destroy')->name('roles.destroy')->middleware('permission:roles.destroy');
});

// Rutas para cambiar el password del usuario
Route::get('/perfil','UserController@perfil')->name('users.perfil')->middleware('permission:users.perfil');
Route::put('users/{user}/password','UserController@updatepassword')->name('users.updatepassword')->middleware('permission:users.perfil');

// Rutas para las api para los datatables
Route::get('api/users','UserController@apiUsers')->name('users.apiUsers')->middleware('permission:users.index');
Route::get('api/roles','RoleController@apiRoles')->name('roles.apiRoles')->middleware('permission:roles.index');

Route::get('api/contribuyentes','ContribuyenteController@apiContribuyentes')->name('contribuyentes.apiContribuyentes')->middleware('permission:contribuyentes.index');
Route::get('api/areas','AreaController@apiAreas')->name('areas.apiAreas')->middleware('permission:areas.index');
Route::get('api/tramites','TramiteController@apiTramites')->name('tramites.apiTramites')->middleware('permission:tramites.index');
Route::get('api/derivacions','DerivacionController@apiDerivacions')->name('derivacions.apiDerivacions')->middleware('permission:derivacions.index');

Route::get('api/tramites/{nro_tramite}/historials','TramiteController@apiHistorials')->name('tramites.apiHistorials')->middleware('permission:tramites.index');
