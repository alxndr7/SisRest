<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});
Route::post('/logout', function(){
    \Illuminate\Support\Facades\Auth::logout();
});
Auth::routes();

Route::get('/login', function () {
    return view('auth/login');
});
Route::get('/home', 'HomeController@index');

Route::get('/comensales', 'ComensalController@index');
Route::get('/comensales/nuevo', 'ComensalController@nuevo');
Route::get('/comensales/editar', 'ComensalController@editar');
Route::get('/comensales/eliminar', 'ComensalController@eliminar');
Route::post('/comensalesadd', 'ComensalController@store');
Route::post('/comensalesdelete', 'ComensalController@deletecomensal');
Route::post('/comensalesupdate', 'ComensalController@updatecomensal');
Route::get('/pagos', 'PagoController@index');
Route::get('/buscarcomensal', 'PagoController@buscarcomensalpordni');
Route::get('/agregarpago', 'PagoController@agregarpago');
Route::get('/meditarpago', 'PagoController@mEditarPago');
Route::get('/editarpago', 'PagoController@editarPago');
Route::get('/meliminarpago', 'PagoController@mEliminarPago');
Route::get('/eliminarpago', 'PagoController@eliminarPago');
Route::get('/control', 'ControlController@index');
Route::get('/control/deshaceringreso', 'ControlController@mdeshacerIngreso');
Route::post('/controldeshaceringreso', 'ControlController@deshacerIngreso');
Route::get('/buscarcomensalcontrol', 'ControlController@buscarcomensalcontrol');
Route::get('/serviceObtenerConsumos', 'serviceAndroid@serviceObtenerConsumos');

//Routes from Web Service
Route::get('/servValidarLogin/{usu}/{passw}', 'serviceAndroid@validarLogin');
Route::get('/wsultimosConsumos/{dni}', 'serviceAndroid@ultimosConsumosPorDni');
Route::get('/wscrearusuario/{cNomUsu}/{cLoginUsu}/{cPasswUsu}/{cDni}', 'serviceAndroid@crearUsuario');