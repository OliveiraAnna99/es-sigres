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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home');
});

/*
 * Funcionarios Routes
 */
Route::resource('funcionarios', App\Http\Controllers\FuncionarioController::class)->except('store'); // Remova a rota padrão de criação

Route::post('funcionarios', [App\Http\Controllers\FuncionarioController::class, 'store'])->name('funcionarios.store'); // Adicione uma nova rota personalizada para o método store

/*
 * Estoques Routes
 */
Route::resource('estoques', App\Http\Controllers\EstoqueController::class);

/*
 * Cardapios Routes
 */
Route::resource('cardapios', App\Http\Controllers\CardapioController::class);

/*
 * Página de Error Routes
 */
Route::get('/error', function () {
    return view('error');
})->name('error');
