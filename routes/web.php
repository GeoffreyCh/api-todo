<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\todosController;

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
    return view('welcome');
});

Route::get('api/todo', [todosController::class, 'list']);
Route::post('api/todo', [todosController::class, 'saveTodo']);
Route::post('api/todo/done/{id}', [todosController::class, 'markAsDone']);
Route::delete('api/todo/delete/{id}', [todosController::class, 'deleteTodo']);
