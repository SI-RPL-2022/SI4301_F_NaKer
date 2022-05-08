<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FreelancerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

    Route::middleware(['guest:web'])->group(function(){
        // Route::get('/', [FreelancerController::class,'dashboard'])->name('f_dashboard');
        Route::view('/login', 'freelancer.login')->name('login');
        Route::view('/register', 'freelancer.register')->name('register');
    });

    Route::middleware(['auth:web'])->group(function(){
        
        Route::get('/profil', [FreelancerController::class, 'profil'])->name('profil');
        Route::get('/edit-profil', [FreelancerController::class, 'edit_profil'])->name('edit_profil');
        Route::post('/logout', [FreelancerController::class, 'logout'])->name('logout');
    });
});

Route::prefix('admin')->name('admin.')->group(function(){

    Route::middleware(['guest:admin'])->group(function(){
        Route::view('/login', 'admin.login')->name('login');
        Route::post('/check', [AdminController::class, 'check_login'])->name('check');
    });

    Route::middleware(['auth:admin'])->group(function(){
        Route::view('/dashboard', 'admin.dashboard')->name('dashboard');
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    });

});