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

Route::get('/', 'ContactoController@index')->name('contacto.index');
Route::get('/nuevo', 'ContactoController@create')->name('contacto.create');
Route::post('/crear', 'ContactoController@store')->name('contacto.store');
Route::post('/buscar', 'ContactoController@search')->name('contacto.search');
Route::get('/editar/{id}', 'ContactoController@edit')->name('contacto.edit');
Route::post('/modificar/{id}', 'ContactoController@update')->name('contacto.update');
Route::get('/eliminar/{id}', 'ContactoController@destroy')->name('contacto.delete');
