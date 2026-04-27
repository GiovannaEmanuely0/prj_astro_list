<?php

use Brick\Math\Exception\RoundingNecessaryException;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CadastroController;

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
    return view('Dashboard');
});

Route::get('/admin','App\Http\Controllers\adminController@index');
Route::get('/cadastrar','App\Http\Controllers\cadastroController@create');
Route::post('/cadastrar','App\Http\Controllers\cadastroController@store');

Route::get('/usuario/{id}', [CadastroController::class, 'show']);
