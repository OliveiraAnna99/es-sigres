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

Route::get('/', function () {
    return view('auth.login');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');




Route::middleware('auth')->group(function () {
    /*Funcionarios Routes*/
    Route::resource('funcionarios', App\Http\Controllers\FuncionarioController::class);
    /* Estoques Routes*/
    Route::resource('estoques', App\Http\Controllers\EstoqueController::class);
    /*Cardapios Routes*/
    Route::resource('cardapios', App\Http\Controllers\CardapioController::class);
});

require_once __DIR__ . '/auth.php';
