<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DestinasiWisataController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengelolaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PembayaranController;

use App\Http\Controllers\RegisterController;
use App\Models\kategori;
use App\Models\DestinasiWisata;
use App\Http\Controllers\DetailWisataController;





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


//   Route::get('/', function () {
//         return view('destinasi');
//     });

// Route::get('/', [HomepageController::class, 'index'])->name('homepage-index');








// Route::middleware(['auth'])->group(function() {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     });
//     Route::resource('/destinasi', DestinasiWisataController::class);
//     Route::resource('/kategori', KategoriController::class);
//     Route::resource('/pengelola', PengelolaController::class);
// });
// Route::get('detailwisata/{id}', [DetailWisataController::class, 'show'])->name('detailwisata.show');
// Route::get('login', [LoginController::class, 'index'])->name('login'); // Menampilkan formulir login
// Route::post('login-post', [LoginController::class, 'authenticate'])->name('login.post'); // Proses autentikasi
// Route::post('logout', [LoginController::class, 'logout'])->name('logout'); // Proses logout


Route::middleware(['auth', 'ceklevel:Admin'])->group(function () {
    Route::resource('/user', PengelolaController::class);
 });

 Route::middleware(['auth', 'ceklevel:Admin,Pengelola'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/kategori', KategoriController::class);
    Route::resource('/destinasi', DestinasiWisataController::class);
    Route::post('/admin/bookings/{id}/approve', [BookingController::class, 'approve'])->name('admin.bookings.approve');
 });

Route::get('/', [HomepageController::class, 'index']);

Route::get('homepage', [HomepageController::class, 'index'])->name('homepage');

 Route::middleware(['guest'])->group(function () {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login-post', [LoginController::class, 'authenticate'])->name('login.post');
    Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
 });

Route::middleware(['auth'])->group(function () {
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::post('logoutgues', [LoginController::class, 'logoutgues'])->name('logoutgues');
 });
Route::get('detailwisata/{id}', [DetailWisataController::class, 'show'])->name('detailwisata.show');







Route::get('/destinasi-wisata/{id}', [DetailWisataController::class, 'show'])->name('destinasi-wisata.show');
Route::post('/destinasi-wisata/{id}/review', [DetailWisataController::class, 'storeReview'])->name('destinasi-wisata.storeReview')->middleware('auth');






Route::post('/destinasi-wisata/{id}/book', [BookingController::class, 'book'])->name('destinasi-wisata.book')->middleware('auth');
Route::get('/booking', [BookingController::class, 'index'])->name('booking.index')->middleware('auth');


Route::get('/pembayaran/{id}/create', [PembayaranController::class, 'create'])->name('pembayaran.create')->middleware('auth');
Route::post('/pembayaran/{id}', [PembayaranController::class, 'store'])->name('pembayaran.store')->middleware('auth');
Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index')->middleware('auth');


use App\Http\Controllers\ProfilController;

Route::get('/profil-aktivitas', [ProfilController::class, 'index'])->name('profil.index');





