<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FreelancerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PerusahaanController;

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
Route::get('/video-training', [HomeController::class, 'video_training'])->name('video_training');

Route::prefix('freelancer')->name('freelancer.')->group(function(){

    Route::middleware(['guest:web'])->group(function(){
        // Route::get('/', [FreelancerController::class,'dashboard'])->name('f_dashboard');
        Route::post('/login', [FreelancerController::class, 'check_login'])->name('login');
        Route::view('/login', 'freelancer.login')->name('login');
        Route::view('/register', 'freelancer.register')->name('register');
    });

    Route::middleware(['auth:web'])->group(function(){
        
        Route::get('/profil', [FreelancerController::class, 'profil'])->name('profil');
        Route::get('/edit-profil', [FreelancerController::class, 'edit_profil'])->name('edit_profil');
        Route::patch('/update_profil', [FreelancerController::class, 'update_profil'])->name('update_profil');
        Route::get('/pembayaran', [FreelancerController::class, 'pembayaran'])->name('pembayaran');
        Route::get('/check-pembayaran/{id}', [FreelancerController::class, 'check_pembayaran'])->name('check_pembayaran');
        Route::get('/selesai-bayar/{id}', [FreelancerController::class, 'selesai_bayar'])->name('selesai_bayar');
        Route::get('/lamar-kerja/{id}', [FreelancerController::class, 'lamar_kerja'])->name('lamar_kerja');
        Route::post('/lamar-kerja/applied/{id}', [FreelancerController::class, 'applied'])->name('applied');
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
        Route::get('/video-training', [AdminController::class, 'video_training'])->name('video_training');
        Route::view('/upload-video', 'admin.upload_video')->name('upload_video');
        Route::get('/report', [AdminController::class, 'report'])->name('report');
        Route::post('/video-training/create', [AdminController::class, 'create_video'])->name('create_video');
        Route::get('/video-training/delete/{id}', [AdminController::class, 'delete_video'])->name('delete_video');
        Route::post('/video-training/edit/{id}', [AdminController::class, 'edit_video'])->name('edit_video');
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    });

});

Route::prefix('pemberi_kerja')->name('pemberi_kerja.')->group(function(){

    Route::middleware(['guest:pemberi_kerja'])->group(function(){
        Route::view('/login', 'pemberi_kerja.login')->name('login');
        Route::view('/register', 'pemberi_kerja.register')->name('register');
        Route::post('/create', [PerusahaanController::class, 'create'])->name('create');
        Route::post('/check', [PerusahaanController::class, 'check_login'])->name('check');
    });

    Route::middleware(['auth:pemberi_kerja'])->group(function(){
        Route::view('/dashboard', 'pemberi_kerja.dashboard')->name('dashboard');
        Route::post('/logout', [PerusahaanController::class, 'logout'])->name('logout');
        Route::get('/profil', [PerusahaanController::class, 'profil'])->name('profil');
        Route::get('/edit-profil', [PerusahaanController::class, 'edit_profil'])->name('edit_profil');
        Route::get('/memberi_pembayaran', [PerusahaanController::class, 'memberi_pembayaran'])->name('memberi_pembayaran');
        Route::patch('/update_profil', [PerusahaanController::class, 'update_profil'])->name('update_profil');
        Route::view('/tambah-pekerjaan', 'pemberi_kerja.tambah_kerja')->name('tambah_kerja');
        Route::get('/pekerjaan', [PerusahaanController::class, 'pekerjaan'])->name('pekerjaan');
        Route::get('/pekerjaan/cari', [PerusahaanController::class, 'hasil_pekerjaan'])->name('hasil_pekerjaan');
        Route::get('/pekerjaan-kategori/{index}', [PerusahaanController::class, 'pekerjaan_kategori'])->name('pekerjaan_kategori');
        Route::get('/pekerjaan/delete/{id}', [PerusahaanController::class, 'delete_pekerjaan'])->name('delete_pekerjaan');
        Route::post('/pekerjaan/edit/{id}', [PerusahaanController::class, 'edit_pekerjaan'])->name('edit_pekerjaan');
        Route::post('/create-kerja', [PerusahaanController::class, 'create_kerja'])->name('create_kerja');
    });

});