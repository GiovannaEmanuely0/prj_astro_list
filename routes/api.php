<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rotas do usuário
Route::get('/usuario','App\Http\Controllers\userController@indexApi');
Route::post('/usuario','App\Http\Controllers\CadastroController@storeApi');
Route::put('/usuario/{id}','App\Http\Controllers\userController@updateApi');

// Rotas da tarefa
Route::get('/tarefa','App\Http\Controllers\tarefaController@indexApi');
Route::post('/tarefa','App\Http\Controllers\tarefaController@storeApi');
Route::put('/tarefa/{id}','App\Http\Controllers\tarefaController@updateApi');

// Rotas do Adm
Route::get('/admin','App\Http\Controllers\adminController@indexApi');
Route::post('/admin','App\Http\Controllers\adminController@storeApi');
Route::put('/admin/{id}','App\Http\Controllers\adminController@putApi');
Route::delete('/admin/{id}','App\Http\Controllers\adminController@destroyApi');
Route::get('/admin/{id}','App\Http\Controllers\adminController@countAdmin');
