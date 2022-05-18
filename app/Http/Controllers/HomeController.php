<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pekerjaan;
use App\Models\videoTraining;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
    function video_training()
    {
        $vid = videoTraining::all();
        return view('video_training', compact('vid'));
    }
    public function cari_kerja()
    {

        if(Auth::guard('web')->check()){
            $kategori = DB::table('pekerjaans')
                ->select('kategori')->whereNotIn('id_pekerjaan',function($query) {
                    $query->select('id_pekerjaan')->from('my_jobs')->where('id_freelancer',Auth::guard('web')->user()->id_freelancer);
                 })->groupBy('kategori')->get();
                
            $pekerjaan = DB::table("pekerjaans")->select('*')->whereNotIn('id_pekerjaan',function($query) {
                $query->select('id_pekerjaan')
                        ->from('my_jobs')
                        ->where('id_freelancer',Auth::guard('web')->user()->id_freelancer);
             })->join('pemberi_kerjas', 'pekerjaans.id_pemberikerja', '=', 'pemberi_kerjas.id_pemberikerja')->get();

             return view('cari_kerja', compact('pekerjaan', 'kategori'));
            // DB::table('pekerjaans')
            // ->join('my_jobs', 'pekerjaans.id_freelancer', '=', 'my_jobs.id_freelancer')
            // ->get();
        }

        if(!Auth::guard('web')->check()){
            $kategori = DB::table('pekerjaans')
                    ->select('kategori')
                    ->groupBy('kategori')
                    ->get();

            $pekerjaan = DB::table("pekerjaans")->select('*')
                    ->join('pemberi_kerjas', 'pekerjaans.id_pemberikerja', '=', 'pemberi_kerjas.id_pemberikerja')
                    ->get();
            return view('cari_kerja', compact('pekerjaan', 'kategori'));
        }

    } 

    public function pekerjaan_kategori($index)
    {

        if(Auth::guard('web')->check()){
            $kategori = DB::table('pekerjaans')
                ->select('kategori')->whereNotIn('id_pekerjaan',function($query) {
                    $query->select('id_pekerjaan')->from('my_jobs')->where('id_freelancer',Auth::guard('web')->user()->id_freelancer);
                 })->groupBy('kategori')->get();
                
            $pekerjaan = DB::table("pekerjaans")->select('*')->whereNotIn('id_pekerjaan',function($query) {
                $query->select('id_pekerjaan')->from('my_jobs')->where('id_freelancer',Auth::guard('web')->user()->id_freelancer);
             })->join('pemberi_kerjas', 'pekerjaans.id_pemberikerja', '=', 'pemberi_kerjas.id_pemberikerja')->where('kategori','like',"%".$index."%")->get();

             return view('hasil_cari_kerja', compact('pekerjaan', 'kategori'));
        }
        
        if(!Auth::guard('web')->check()){
            $kategori = DB::table('pekerjaans')
                    ->select('kategori')
                    ->groupBy('kategori')
                    ->get();

            $pekerjaan = DB::table('pekerjaans')
                    ->where('kategori','like',"%".$index."%")
                    ->join('pemberi_kerjas', 'pekerjaans.id_pemberikerja', '=', 'pemberi_kerjas.id_pemberikerja')
                    ->paginate();
            return view('hasil_cari_kerja', compact('pekerjaan', 'kategori'));
        }

    } 

    public function hasil_cari_kerja(Request $request)
    {
		$cari = $request->pencarian;
        
        if(Auth::guard('web')->check()){
            $kategori = DB::table('pekerjaans')
                ->select('kategori')->whereNotIn('id_pekerjaan',function($query) {
                    $query->select('id_pekerjaan')->from('my_jobs')->where('id_freelancer',Auth::guard('web')->user()->id_freelancer);
                 })->groupBy('kategori')->get();
                
            $pekerjaan = DB::table("pekerjaans")->select('*')->whereNotIn('id_pekerjaan',function($query) {
                $query->select('id_pekerjaan')->from('my_jobs')->where('id_freelancer',Auth::guard('web')->user()->id_freelancer);
             })->where('nama_pekerjaan','like',"%".$cari."%")
             ->join('pemberi_kerjas', 'pekerjaans.id_pemberikerja', '=', 'pemberi_kerjas.id_pemberikerja')->get();

             return view('hasil_cari_kerja', compact('pekerjaan', 'kategori'));
        }
        
        if(!Auth::guard('web')->check()){
            $kategori = DB::table('pekerjaans')
                    ->select('kategori')
                    ->groupBy('kategori')
                    ->get();

            $pekerjaan = DB::table('pekerjaans')
                    ->where('nama_pekerjaan','like',"%".$cari."%")
                    ->join('pemberi_kerjas', 'pekerjaans.id_pemberikerja', '=', 'pemberi_kerjas.id_pemberikerja')
                    ->paginate();
            return view('hasil_cari_kerja', compact('pekerjaan', 'kategori'));
        }

    } 
}
