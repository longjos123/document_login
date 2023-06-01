<?php

use Illuminate\Support\Facades\Route;
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
Route::get('/auth/redirect/{provider}', [AuthController::class, 'redirect'])->name('login_social');
Route::get('/callback/{provider}', [AuthController::class, 'callback']);
Route::post('login', [AuthController::class, 'login'])->name('login_post');
Route::get('register', [AuthController::class, 'viewRegister'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('register_post');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('home', [AuthController::class, 'index'])->name('homepage');
