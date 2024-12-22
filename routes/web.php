<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DashboardLoginController;
use App\Http\Controllers\DashboardLoginControllerUser;
use App\Http\Controllers\transaksisController;
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
    return view('login'); // Menampilkan halaman login (GET)

});

// Rute untuk menampilkan halaman login (GET)
Route::get('/login', function () {
    return view('Login'); // Menampilkan halaman login
})->name('login');

// Rute untuk menangani login (POST)
Route::post('/login', [App\Http\Controllers\AkunController::class, 'login'])->name('login');

Route::post('/logout', [App\Http\Controllers\AkunController::class, 'logout'])->name('logout');

// Rute untuk SignUp (Action method di DashboardLoginController)
Route::get('/SignUp', [DashboardLoginController::class, 'SignUp'])->name('SignUp'); // Halaman Sign Up

Route::post('/SignUp', [AkunController::class, 'register'])->name('register'); // Proses Registrasi

// Rute untuk Services
Route::get('/Services', function () {
    return view('Services'); // Menampilkan halaman Services
});

Route::get('/Maps', function () {
    return view('Maps'); // Menampilkan halaman Services
});


// Rute untuk Dashboard, menggunakan middleware auth:admin
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/Dashboard', [DashboardLoginController::class, 'Dashboard'])->name('Dashboard');
    Route::get('/Services', [ServiceController::class, 'index'])->name('Services');
    Route::get('/Maps', [DashboardLoginController::class, 'Maps'])->name('Maps');

    Route::get('/transaksis', [transaksisController::class, 'index'])->name('transaksis');
    Route::post('/transaksis', [transaksisController::class, 'index'])->name('transaksis');
    Route::get('/transaksisCreate', [transaksisController::class, 'create_view'])->name('transaksis.create');
    Route::post('/transaksisCreate', [transaksisController::class, 'create'])->name('transaksis.create');
    Route::get('/transaksis/{id}/edit', [transaksisController::class, 'edit'])->name('transaksis.edit');
    Route::post('/transaksis/{transaksis}', [transaksisController::class, 'update'])->name('transaksis.update');
    Route::delete('/transaksis/{transaksi}', [transaksisController::class, 'destroy'])->name('transaksis.destroy');

    Route::get('/Servicescreate', [ServiceController::class, 'create'])->name('Service.create');
    Route::post('/Servicescreate', [ServiceController::class, 'store'])->name('Services.store');
    Route::get('/Services/{service}/edit', [ServiceController::class, 'edit'])->name('Service.edit');
    Route::put('/Services/{service}', [ServiceController::class, 'update'])->name('Service.update');
    Route::delete('/Services/{id}', [ServiceController::class, 'destroy'])->name('Service.destroy');
    Route::put('/transaksis/{id}/approve', [transaksisController::class, 'approve'])->name('transaksis.approve');
    Route::delete('/transaksis/{id}/reject', [transaksisController::class, 'reject'])->name('transaksis.reject');
});

Route::get('/DashboardUser', [DashboardLoginControllerUser::class, 'DashboardUser'])->name('DashboardUser');
Route::get('/SignUp', [DashboardLoginControllerUser::class, 'SignUp'])->name('SignUp');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/DashboardUser', function () {
        return view('User.DashboardUser');
    })->name('DashboardUser');
    Route::get('/DashboardUser', [DashboardLoginControllerUser::class, 'DashboardUser'])->name('DashboardUser');
    Route::get('/MapsUser', [DashboardLoginControllerUser::class, 'MapsUser'])->name('MapsUser');
    Route::get('/ServicesUser', [DashboardLoginControllerUser::class, 'ServicesUser'])->name('ServicesUser');
    Route::post('/services/order', [ServiceController::class, 'order'])->middleware('auth')->name('services.order');
    Route::post('/services/request', [ServiceController::class, 'requestService'])->name('services.request');
    Route::post('/services/order', [ServiceController::class, 'order'])->name('services.order');
    Route::post('/services/request', [ServiceController::class, 'requestService'])->name('services.request');
    Route::get('/riwayat-transaksi', [TransaksisController::class, 'riwayat'])->name('riwayat.transaksi');
    Route::post('/proses-pembayaran', [TransaksisController::class, 'prosesPembayaran'])->name('proses.pembayaran');
    Route::get('/get-pembayaran/{id}', [TransaksisController::class, 'getPembayaran'])->name('get.pembayaran');

});

Route::get('oauth/google', [\App\Http\Controllers\OauthController::class, 'redirectToProvider'])->name('oauth.google');
Route::get('oauth/google/callback', [\App\Http\Controllers\OauthController::class, 'handleProviderCallback'])->name('oauth.google.callback');
