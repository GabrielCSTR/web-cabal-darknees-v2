<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/login', function () {

//     if (Auth::user()){
//         return redirect()->route('home');
//     }

//     return view('auth.login');

// })->name('login');

/**
 * ROTAS AUTH
 */
Route::get('/login',            [AuthController::class, 'index'])->name('web.login');
Route::post('/login',           [AuthController::class, 'login'])->name('web.auth.login');
route::post('/register',        [AuthController::class, 'register'])->name('web.register');
Route::post('/logout',          [AuthController::class, 'logout'])->name('web.logout');
Route::post('/refresh',         [AuthController::class, 'refresh'])->name('web.refresh');
Route::post('/user-profile',    [AuthController::class, 'user-profile'])->name('web.user-profile');
