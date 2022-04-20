<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Pekerjaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function cari_kerja()
    {
        $pekerjaan = Pekerjaan::all(); 
        return view('cari_kerja', compact('pekerjaan'));
    } 
    public function hasil_cari_kerja(Request $request)
    {
        // menangkap data pencarian
		$cari = $request->pencarian;
 
        // mengambil data dari table pegawai sesuai pencarian data
        $pekerjaan = DB::table('pekerjaans')
        ->where('nama_pekerjaan','like',"%".$cari."%")
        ->paginate();

            // mengirim data pegawai ke view index
        // return view('index',['pegawai' => $pegawai]);
        // $pekerjaan = Pekerjaan::all(); 
        return view('hasil_cari_kerja', compact('pekerjaan'));
    } 
    public function dashboard()
    {
        $pekerjaan = Pekerjaan::all(); 
        return view('dashboard', compact('pekerjaan'));
    }
    public function profile()
    {
        return view('profile');
    }
    public function edit_profile()
    {
        return view('edit_profile');
    }
    public function registrasi()
    {
        return view('registrasi');
    }
    public function login()
    {
        return view('login');
    }
}
