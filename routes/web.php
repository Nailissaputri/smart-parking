
<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/parking', function () {
    return view('parking');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/login', function () {
    return view('login');
});

// Dashboard Admin
Route::get('/admin/dashboard', function () {
    return view('dashboard.admin');
});

// Menu Admin
Route::get('/admin/slots', function () {
    return view('admin.slots');
});

Route::get('/admin/reservasi', function () {
    return view('admin.reservasi');
});

Route::get('/admin/pengguna', function () {
    return view('admin.pengguna');
});

Route::get('/admin/riwayat', function () {
    return view('admin.riwayat');
});

Route::get('/admin/scan-qr', function () {
    return view('admin.scan-qr');
});

// Dashboard User
Route::get('/user/dashboard', function () {
    return view('dashboard.user');
});
