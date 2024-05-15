<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

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

Route::get('/SignUpp',[UserController::class,'signupShow']);
Route::post('/Register',[UserController::class,'SignUp'])->name("register");

Route::get('/LogIn',[UserController::class,'loginShow']);
Route::post('/Logging',[UserController::class,'LogIn'])->name("LogIn");

Route::get('/showCode',[UserController::class,'showCode']);
Route::post('/codeVerify',[UserController::class,'codeVerify'])->name("codeVerify");
