<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pekerjaan;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pekerjaan = Pekerjaan::all(); 
        return view('freelancer.dashboard', compact('pekerjaan'));
    }
    public function cari_kerja()
    {
        $kategori = DB::table('pekerjaans')
        ->select('kategori')
        ->groupBy('kategori')
        ->get();

        $pekerjaan = Pekerjaan::all(); 
        return view('cari_kerja', compact('pekerjaan', 'kategori'));
    } 

    public function pekerjaan_kategori($index)
    {
        $kategori = DB::table('pekerjaans')
        ->select('kategori')
        ->groupBy('kategori')
        ->get();

        $pekerjaan = DB::table('pekerjaans')
        ->where('kategori','like',"%".$index."%")
        ->paginate();

        return view('hasil_cari_kerja', compact('pekerjaan', 'kategori'));
    } 

    public function hasil_cari_kerja(Request $request)
    {
		$cari = $request->pencarian;
 
        $kategori = DB::table('pekerjaans')
        ->select('kategori')
        ->groupBy('kategori')
        ->get();

        $pekerjaan = DB::table('pekerjaans')
        ->where('nama_pekerjaan','like',"%".$cari."%")
        ->paginate();

        return view('hasil_cari_kerja', compact('pekerjaan', 'kategori'));
    } 
    // public function dashboard()
    // {
    //     $pekerjaan = Pekerjaan::all(); 
    //     return view('freelancer.dashboard', compact('pekerjaan'));
    // }
}
