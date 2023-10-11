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
    $api = Http::get('https://run.mocky.io/v3/ce47ee53-6531-4821-a6f6-71a188eaaee0');
    $apiArray = $api->json();
    return view('userList', ['apiArray' => $apiArray]);
});
