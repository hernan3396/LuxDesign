<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/',                 'pageController@showHome');
Route::get('/sobre-nosotros',   'pageController@showAboutUs');
Route::get('/trabajos',         'pageController@showCategorias' );
Route::get('/trabajos/{id}',    'pageController@showTrabajos');

// ADMIN

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/logout',                     '\App\Http\Controllers\Auth\LoginController@logout');

    Route::get('/admin/trabajos',                   'trabajoController@showTrabajos');

    Route::get('/admin/trabajos/crear',             'trabajoController@showCreateTrabajo');
    Route::post('/admin/trabajos/crear',            'trabajoController@store');
    
    Route::get('/admin/trabajos/editar/{id}',       'trabajoController@showEditTrabajo');
    Route::post('/admin/trabajos/editar/{id}',      'trabajoController@updateTrabajo');
    Route::get('/admin/trabajos/{id}/eliminar',     'trabajoController@deleteTrabajo');
    
    Route::get('/admin/categorias',                 'categoryController@showCategoria'); 

    Route::get('/admin/categorias/crear',           'categoryController@showCreateCategoria'); 
    Route::post('/admin/categorias/crear',          'categoryController@store'); 

    Route::get('/admin/categorias/editar/{id}',     'categoryController@showEditCategoria'); 
    Route::post('/admin/categorias/editar/{id}',    'categoryController@updateCategoria'); 
    Route::get('/admin/categorias/{id}/eliminar',   'categoryController@deleteCategory');

    Route::get('/admin/carrusel',                   'carruselController@changeOrderView');
    Route::post('/admin/carrusel',             'carruselController@changeOrderForm');
});

Auth::routes();

