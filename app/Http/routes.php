<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
| POST, GET, PUT, DELETE
 */

Route::get('/', 'FrontController@index');
Route::get('contacto', 'FrontController@contacto');
Route::get('reviews', 'FrontController@reviews');
Route::get('admin', 'FrontController@admin');
Route::post('ActualizarMedico', 'ClienteController@ActualizarMedico');
Route::post('eliminarCliente', 'ClienteController@eliminarCliente');
Route::resource('usuario', 'UsuarioController');
Route::resource('categoria', 'CategoriaController');
Route::resource('item', 'ItemController');
Route::resource('cliente', 'ClienteController');
Route::resource('pedido', 'PedidoController');

Route::resource('genero', 'GeneroController');

Route::resource('log', 'LogController');
Route::get('logout', 'LogController@logout');

Route::group(['middleware' => 'cors'], function () {

		Route::get('get_items', 'ItemController@get_items');
		Route::get('listarClientes', 'ServiciosController@listarClientes');
		Route::get('obtenerIdCliente', 'ServiciosController@obtenerIdCliente');
	});
