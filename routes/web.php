<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\DashboardLoginController;
use Illuminate\Support\Facades\Route;

/*
|---------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
*/

Route::get('/', function () {
    return view('Login'); // Menampilkan halaman login (GET)
});

// Rute untuk menampilkan halaman login (GET)
Route::get('/login', function () {
    return view('Login'); // Menampilkan halaman login
})->name('login');

// Rute untuk menangani login (POST)
Route::post('/login', [App\Http\Controllers\AkunController::class, 'login'])->name('login');

Route::post('/logout', [App\Http\Controllers\AkunController::class,'logout']) ->name('logout');

// Rute untuk SignUp (Action method di DashboardLoginController)
Route::get('/SignUp', [DashboardLoginController::class, 'SignUp'])->name('SignUp'); // Halaman Sign Up

Route::post('/SignUp', [AkunController::class, 'register'])->name('register'); // Proses Registrasi

// Rute untuk Services
Route::get('/Services', function() {
    return view('Services'); // Menampilkan halaman Services
});

// Rute untuk Dashboard, menggunakan middleware auth:admin
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/Dashboard', [DashboardLoginController::class, 'Dashboard'])->name('Dashboard');
    Route::get('/Services', [DashboardLoginController::class, 'Services'])->name('Services');
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('oauth/google', [\App\Http\Controllers\OauthController::class, 'redirectToProvider'])->name('oauth.google');  
Route::get('oauth/google/callback', [\App\Http\Controllers\OauthController::class, 'handleProviderCallback'])->name('oauth.google.callback');