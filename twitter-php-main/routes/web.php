<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ValidateLoginController;
use App\Http\Controllers\ValidateRegisterController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, "home"])->name('home');
Route::get('/login', [LoginController::class, "login"])->name('login');
Route::get('/register', [RegisterController::class, "register"])->name('register');
Route::any('/validate-register', [ValidateRegisterController::class, "validateRegister"])->name('validate-register');
Route::any('/validate-login', [ValidateLoginController::class, "validateLogin"])->name('validate-login');
Route::any('/logout', [LogoutController::class, "logout"])->name('logout');
Route::post('/submit-post', [PostController::class, 'submitPost'])->name('submit-post');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts-destroy');
