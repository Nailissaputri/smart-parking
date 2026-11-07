
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

Route::post('/register', [RegisterController::class, 'register'])
    ->name('register.process');

Route::middleware('auth')->group(function () {

    Route::get('/admin', function () {
        abort_unless(auth()->user()->role === 'admin', 403);

        return view('admin');
    })->name('admin.dashboard');

    Route::get('/user', function () {
        abort_unless(auth()->user()->role === 'user', 403);

        return view('user');
    })->name('user.dashboard');

    Route::get('/parking', function () {
        return view('parking');
    });

    Route::post('/logout', [LoginController::class, 'logout'])
        ->name('logout');
});