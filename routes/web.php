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