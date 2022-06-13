<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return redirect('/home');
})->middleware(App\Http\Middleware\Autenticador::class);
Route::get('/home', 'App\Http\Controllers\AssembleiaController@index');
Route::get('/criar', 'App\Http\Controllers\AssembleiaController@create');
Route::get('/assembleia/detalhes/{id}', 'App\Http\Controllers\AssembleiaController@detalhes');
Route::get('/assembleia/{id}/editar', 'App\Http\Controllers\AssembleiaController@editar');
Route::get('/assembleia/{id}/votar', 'App\Http\Controllers\AssembleiaController@votar');
Route::post('/assembleia/atualziar/{id}', 'App\Http\Controllers\AssembleiaController@update');
Route::post('/assembleia/salvar', 'App\Http\Controllers\AssembleiaController@store');
Route::delete('/assembleia/remover/{id}', 'App\Http\Controllers\AssembleiaController@remover');


Route::get('/officio/index', 'App\Http\Controllers\OfficioController@index');


Route::get('/login', 'App\Http\Controllers\LoginController@index')->name('login');
Route::post('/login', 'App\Http\Controllers\LoginController@login');
Route::get('/logout', 'App\Http\Controllers\LoginController@logout');
Route::get('/registrar', 'App\Http\Controllers\UsuarioController@index');
Route::post('/store', 'App\Http\Controllers\UsuarioController@store');

Route::get('/votos/{id_pauta}/index', 'App\Http\Controllers\VotosController@index')->name('index');
Route::post('/votos/salvar', 'App\Http\Controllers\VotosController@store');
Route::get('/votos/{id}/edit', 'App\Http\Controllers\VotosController@edit');
Route::post('/votos/update/{id}', 'App\Http\Controllers\VotosController@update');
Route::delete('/votos/destroy/{id}', 'App\Http\Controllers\VotosController@destroy');


