<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\tarefaController;

Route::get('/', function () {
    return view('Dashboard');
});

Route::get('/admin','App\Http\Controllers\adminController@index');

Route::get('/cadastrar','App\Http\Controllers\cadastroController@create');
Route::post('/cadastrar','App\Http\Controllers\cadastroController@store');

// Rotas da tarefa 
Route::get('/tarefa','App\Http\Controllers\tarefaController@create');
Route::post('/tarefa','App\Http\Controllers\tarefaController@store');

// Usuário 
Route::get('/usuario/{id}', [CadastroController::class, 'show']);
