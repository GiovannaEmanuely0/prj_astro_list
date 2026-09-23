<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rotas do usuário get - post - put
Route::get('/usuario','App\Http\Controllers\userController@indexApi');
Route::post('/usuario','App\Http\Controllers\userController@storeApi');
Route::put('/usuario/{id}','App\Http\Controllers\userController@updateApi');
Route::delete('/usuario/{id}','App\Http\Controllers\userController@destroyApi');
Route::get('/usuario/{id}','App\Http\Controllers\userController@countUsuario');
Route::get('/usuario/{id}', 'App\Http\Controllers\userController@listaPorIdAPI');

// Rotas com filtros - usuario
Route::get('/usuario/id/{id}', 'App\Http\Controllers\userController@listaPorIdAPI');
Route::get('/usuario/nome/{nome}', 'App\Http\Controllers\userController@listaPorNomeAPI');

// Rotas da tarefa
Route::get('/tarefa','App\Http\Controllers\tarefaController@indexApi');
Route::post('/tarefa','App\Http\Controllers\tarefaController@storeApi');
Route::put('/tarefa/{id}','App\Http\Controllers\tarefaController@updateApi');
Route::delete('/tarefa/{id}','App\Http\Controllers\tarefaController@destroyApi');
Route::get('/tarefa/{id}','App\Http\Controllers\tarefaController@countTarefa');
Route::get('/tarefa/{id}', 'App\Http\Controllers\tarefaController@listaPorIdAPI');

// Rotas com filtros - tarefa
Route::get('/tarefa/id/{id}', 'App\Http\Controllers\tarefaController@listaPorIdAPI');

//Rotas do Adm
Route::get('/admin','App\Http\Controllers\adminController@indexApi');
Route::post('/admin','App\Http\Controllers\adminController@storeApi');
Route::put('/admin/{id}','App\Http\Controllers\adminController@updateApi');
Route::delete('/admin/{id}','App\Http\Controllers\adminController@destroyApi');
Route::get('/admin/{id}','App\Http\Controllers\adminController@countAdmin');
