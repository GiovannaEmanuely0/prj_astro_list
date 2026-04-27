<?php

use Brick\Math\Exception\RoundingNecessaryException;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/usuario','App\Http\Controllers\usuarioController@index');
Route::get('/tarefa','App\Http\Controllers\tarefaController@index');
<<<<<<< HEAD
Route::get('/criar-cadastro','App\Http\Controllers\CadastroController@create');
Route::post('/criar-cadastro','App\Http\Controllers\CadastroController@store');

//ainda não fizz
Route::get('/entrar-login','App\Http\Controllers\loginController@index');
Route::post('/entrar-login','App\Http\Controllers\loginController@store');

=======
>>>>>>> a95a488106fce3240fd2751b961807811dac51b4
