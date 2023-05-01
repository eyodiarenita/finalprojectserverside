<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\projectController;
use App\Http\Controllers\SessionController;
use Illuminate\Contracts\Session\Session;

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

Route::resource('final', App\Http\Controllers\projectController::class);

Route::get('/final/edit/{nim}', [App\Http\Controllers\projectController::class, 'edit']);
Route::post('/final/edit/{nim}', [App\Http\Controllers\projectController::class, 'edit']);

Route::post('/final/{nim}', [App\Http\Controllers\projectController::class, 'update']);
Route::get('/final/{nim}', [App\Http\Controllers\projectController::class, 'update']);

Route::delete('project/{nim}', [App\Http\Controllers\projectController::class, 'destroy']);

Route::get('/sesi',[SessionController::class, 'index']);
Route::post('/sesi/login',[SessionController::class, 'login']);
Route::get('/sesi/logout',[SessionController::class, 'logout']);

Route::get('/sesi/register',[SessionController::class, 'register']);
Route::post('/sesi/create',[SessionController::class, 'create']);