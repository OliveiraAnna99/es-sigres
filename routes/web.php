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
Route::resource('funcionarios', App\Http\Controllers\FuncionarioController::class);

/*
 * Estoques Routes
 */
Route::resource('estoques', App\Http\Controllers\EstoqueController::class);
