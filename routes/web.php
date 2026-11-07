
<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('login.process');

Route::middleware('auth')->group(function () {
    Route::get('/parking', function () {
        return view('parking');
    });

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::post('/register', [RegisterController::class, 'register'])
    ->name('register.process');
    
});
