<?php

use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Http;
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
});

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/page/{page}', [UserController::class, 'index'])->where('page', '[0-9]+');
Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::delete('/users/destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::put('/users/update/{id}', [UserController::class,'update'])->name('users.update');