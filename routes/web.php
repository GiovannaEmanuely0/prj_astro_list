<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authenticate;
use App\Http\Controllers\userController;
use App\Http\Controllers\tarefaController;
use App\Http\Controllers\AuthController;
// use App\Http\Controllers\CadastroController;
// use App\Http\Controllers\adminController;
use App\Http\Controllers\GraficoController;

Route::middleware('auth')->group(function () {
    //Tela inicial do site: boas vindas.
    Route::get('/', function () {return view('welcome');})->name('home');
    
    // Route::get('/', [TarefaController::class, 'index'])->name('home');

    Route::get('/dashboard', [TarefaController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

    Route::get('/tarefas', [TarefaController::class, 'index'])->name('tarefas.index');
    Route::post('/tarefa', [TarefaController::class, 'store'])->name('tarefas.store');
    Route::delete('/tarefa/{id}', [TarefaController::class, 'destroy'])->name('tarefas.destroy');
    Route::get('/download-csv-tarefa', [TarefaController::class, 'download'])->name('tarefas.csv');

    Route::get('/usuario/{id}', [userController::class, 'show'])->name('usuario.show');

    Route::get('/graficos', [GraficoController::class, 'index'])->name('graficos.index');
});

//Rotas de Login e Logout.
// Rotas de Login e Logout
Route::get('/login', function () {return view('nivelLogin.login');})->name('login');
Route::post('/fazerLogin', 'App\Http\Controllers\UserController@fazerLogin');
Route::post('/logout', 'App\Http\Controllers\UserController@fazerLogOut')->name('logout');

Route::get('/admin', 'App\Http\Controllers\adminController@index');
Route::get('/cadastrarAdmin', 'App\Http\Controllers\adminController@create');
Route::post('/cadastrarAdmin', 'App\Http\Controllers\adminController@store');

Route::get('/cadastrar', 'App\Http\Controllers\userController@create');
Route::post('/cadastrar', 'App\Http\Controllers\userController@store')->name('cadastrar');

Route::get('/download-csv-usuario', 'App\Http\Controllers\adminController@download')->name('usuarios.csv');

// Route::get('/login', [userController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [userController::class, 'login'])->name('login.submit');

//Rotas dos gráficos
Route::get('/graficos/prioridade', [GraficoController::class, 'tarefasPorPrioridade']);
Route::get('/graficos/categoria', [GraficoController::class, 'tarefasPorCategoria']);
Route::get('/graficos/status', [GraficoController::class, 'tarefasPorStatus']);
Route::get('/graficos/data', [GraficoController::class, 'tarefasPorData']);