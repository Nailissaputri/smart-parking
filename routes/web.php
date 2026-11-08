
<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Halaman utama
Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

// Login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [LoginController::class, 'login'])
    ->name('login.process');

// Register
Route::post('/register', [RegisterController::class, 'register'])
    ->name('register.process');

// Halaman setelah login
Route::middleware('auth')->group(function () {

    // Dashboard Admin
    Route::get('/admin/dashboard', function () {
        abort_unless(Auth::user()->role === 'admin', 403);

        return view('dashboard.admin');
    })->name('admin.dashboard');

    // Menu Admin
    Route::get('/admin/slots', function () {
        abort_unless(Auth::user()->role === 'admin', 403);

        return view('admin.slots');
    });

    Route::get('/admin/reservasi', function () {
        abort_unless(Auth::user()->role === 'admin', 403);

        return view('admin.reservasi');
    });

    Route::get('/admin/pengguna', function () {
        abort_unless(Auth::user()->role === 'admin', 403);

        return view('admin.pengguna');
    });

    Route::get('/admin/riwayat', function () {
        abort_unless(Auth::user()->role === 'admin', 403);

        return view('admin.riwayat');
    });

    Route::get('/admin/scan-qr', function () {
        abort_unless(Auth::user()->role === 'admin', 403);

        return view('admin.scan-qr');
    });

    // Dashboard User
    Route::get('/user/dashboard', function () {
        abort_unless(Auth::user()->role === 'user', 403);

        return view('dashboard.user');
    })->name('user.dashboard');

    // Halaman Parkir
    Route::get('/parking', function () {
        return view('parking');
    });

    // Logout
    Route::post('/logout', [LoginController::class, 'logout'])
        ->name('logout');
});
