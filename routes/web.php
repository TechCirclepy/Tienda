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
Route::get('/prueba', function () {
    return view('prueba');
});
Route::post('prueba', 'ReporteProductoController@sendEmail');
Route::get('mail', 'MailController@index');//contactos
Route::post('postmail', 'MailController@post');//contactos
Route::post('postreporte', 'ReporteProductoController@store');//reporte de productos
Route::resource('user/empresa/index','CargaEmpresaController');
Route::resource('user/producto/index','CargaProductoController');
Route::resource('user/producto/favoritos','CargaFavoritosController'); //carga de favoritos
Route::resource('tienda/categoria','CategoriaController');
Route::resource('tienda/empresa','EmpresaController');
Route::resource('info-empresa','EmpresaInfoController');
Route::resource('tienda/producto','ProductoController');
Route::resource('tienda/subcategoria','SubCategoriaController');
Route::resource('tienda/detalle','CatDetalleController');
Route::resource('tienda/ciudad','CiudadController');
Route::resource('tienda/estadisticas','EstadisticaController');
Route::resource('tienda/mensaje','MensajeController');
//
Route::resource('comprar', 'CompraProductoController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/{slug?}', 'HomeController@index');
