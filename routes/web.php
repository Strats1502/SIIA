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
    return view('index');
});

Route::get('/bienvenida', 'BienvenidaController@index');
Route::post('/getMenuItems', 'BienvenidaController@getMenuItems');

//Usuarios
Route::post('usuario/login', 'UsuarioController@login');

Route::get('usuario/', 'UsuarioController@index');

Route::get('usuario/nuevo', 'UsuarioController@nuevo');

Route::post('usuario/crear', 'UsuarioController@crear');

// Route::group(['prefix' => 'escuela', 'middleware'=>'auth'], function() {
Route::group(['prefix' => 'escuelas'], function() {
    Route::get('/', 'EscuelaController@index');
    Route::get('nuevo', 'EscuelaController@nuevo');
    Route::post('crear', 'EscuelaController@crear');
    Route::get('editar/{id}', 'EscuelaController@vistaEditar');
    Route::post('editar', 'EscuelaController@editar');
    Route::get('eliminar/{id}', 'EscuelaController@eliminar');
    Route::get('carrera/{id}', 'EscuelaController@detalleCarrera');
    Route::post('campus/crear', 'EscuelaController@crearCampus');
    Route::get('campus/nuevo', 'EscuelaController@nuevoCampus');
    Route::get('detalle/{id}', 'EscuelaController@detalleEscuela');
});


Route::group(['prefix' => 'carreras'], function() {
    Route::get('/', 'CarreraController@index');
    Route::get('nuevo', 'CarreraController@nuevo');
    Route::post('crear', 'CarreraController@crear');
    Route::get('eliminar/{id}', 'CarreraController@eliminar');
    Route::get('editar/{$id}', 'CarreraController@vistaEditar');
});

Route::group(['prefix' => 'materias'], function() {
    Route::get('/', 'MateriaController@index');

});