<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/cari-kerja', [Controller::class, 'cari_kerja'])->name('cari_kerja');
Route::get('/dashboard', [Controller::class, 'dashboard'])->name('dashboard');
Route::get('/profile', [Controller::class, 'profile'])->name('profile');
Route::get('/registrasi', [Controller::class, 'registrasi'])->name('registrasi');
Route::get('/login', [Controller::class, 'login'])->name('login');