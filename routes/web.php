<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FreelancerController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', [Controller::class, 'dashboard'])->name('dashboard');

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/cari-kerja', [HomeController::class, 'cari_kerja'])->name('cari_kerja');
Route::get('/cari-kerja/cari', [HomeController::class, 'hasil_cari_kerja'])->name('hasil_cari_kerja');
Route::get('/pekerjaan-kategori/{index}', [HomeController::class, 'pekerjaan_kategori'])->name('pekerjaan_kategori');

Route::prefix('freelancer')->name('freelancer.')->group(function(){

    Route::middleware(['guest'])->group(function(){
        // Route::get('/', [FreelancerController::class,'dashboard'])->name('f_dashboard');
        Route::view('/login', 'freelancer.login')->name('login');
        Route::view('/register', 'freelancer.register')->name('register');
    });

    Route::middleware(['auth'])->group(function(){
        
        Route::get('/profil', [FreelancerController::class, 'profil'])->name('profil');
        Route::get('/edit-profil', [FreelancerController::class, 'edit_profil'])->name('edit_profil');
    });
});