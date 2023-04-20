<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\SocialController;
use \App\Http\Controllers\AuthController;

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


Route::get('/', [AuthController::class, 'viewLogin'])->name('login');
Route::get('/auth/redirect/{provider}', [SocialController::class, 'redirect'])->name('login_social');
Route::get('/callback/{provider}', [SocialController::class, 'callback']);
