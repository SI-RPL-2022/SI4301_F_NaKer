<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pemberiKerja;
use App\Models\Pekerjaan;
use App\Models\log;
use App\Models\Pembayaran;
use App\Models\myJob;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PerusahaanController extends Controller
{
    public function profil()
    {
        // return view('pemberi_kerja.profil');
        $user = Auth()->user();
        return view('pemberi_kerja.profil');
    }
    public function edit_profil()
    {
        return view('pemberi_kerja.edit_profil');
    }
    public function update_profil(Request $request)
    {
        $validatedData = $request->validate([
            "id" => "required",
            'email' => "required",
        ]);
        $user = pemberiKerja::find($request->id);
        $user->email = $request->email;
        $user->date_of_birth = $request->date_of_birth;
        $user->alamat = $request->alamat;
        $user->no_telepon = $request->no_telepon;

        $picName = $request->pic;
        if ($picName != "") {
            if ($user->pic != '' && $user->pic != null) {
                $path = public_path('gambar/userprofile/');
                $filePic = $path . $user->pic;
                unlink($filePic);
            }
            $picName = $picName->getClientOriginalName();
            $user->pic = $picName;
            $request->pic->move(public_path('gambar/userprofile'), $picName);
            $save = $user->save();
        }
        $user->save();

        $request->session()->flash("success", 'Profil Anda sudah berhasil di-edit!');
        return redirect()->back()->with("success", 'Profil Anda sudah berhasil di-edit!');
    }
    //Halaman Pembayaran
    function memberi_pembayaran()
    {
        $pekerjaan_onboard = DB::table("my_jobs")->select('*')
            ->join('pekerjaans', 'my_jobs.id_pekerjaan', '=', 'pekerjaans.id_pekerjaan')
            ->join('freelancers','my_jobs.id_freelancer', '=', 'freelancers.id_freelancer')
            ->where('pekerjaans.id_pemberikerja', auth::guard('pemberi_kerja')->user()->id_pemberikerja)
            ->where('my_jobs.status', 'Terpilih')
            ->get();
        return view('pemberi_kerja.memberi_pembayaran', compact('pekerjaan_onboard'));
    }
    //Memilih pembayaran
    function detail_pembayaran($id)
    {
        $pekerjaan_onboard = DB::table("my_jobs")->select('*')
            ->join('pekerjaans', 'my_jobs.id_pekerjaan', '=', 'pekerjaans.id_pekerjaan')
            ->join('freelancers','my_jobs.id_freelancer', '=', 'freelancers.id_freelancer')
            ->where('pekerjaans.id_pemberikerja', auth::guard('pemberi_kerja')->user()->id_pemberikerja)
            ->where('my_jobs.status', 'Terpilih')
            ->get();
        $detail_bayar = DB::table("my_jobs")->select('*')
            ->join('pekerjaans', 'my_jobs.id_pekerjaan', '=', 'pekerjaans.id_pekerjaan')
            ->join('freelancers','my_jobs.id_freelancer', '=', 'freelancers.id_freelancer')
            ->where('pekerjaans.id_pemberikerja', auth::guard('pemberi_kerja')->user()->id_pemberikerja)
            ->where('my_jobs.id_myjob', $id)
            ->where('my_jobs.status', 'Terpilih')
            ->get();
        return view('pemberi_kerja.memberi_pembayaran', compact('pekerjaan_onboard', 'detail_bayar'));
    }
    //Upload Pembayaran
    function create_pembayaran(Request $request){
        $request->validate([
            'id_myjob'=>'required',
            'bukti_pembayaran'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $myjob = myJob::find($request->id_myjob);
        $myjob->status = "Selesai";
        $myjob->save();

        $pembayaran = new Pembayaran();
        $pembayaran->id_myjob = $request->id_myjob;
        $pembayaran->jumlah_pembayaran = $request->jumlah_pembayaran;
        $pembayaran->status_pembayaran = "Belum Bayar";

        $buktiPembayaran = $request->bukti_pembayaran;
        if ($buktiPembayaran != "") {
            if ($pembayaran->puc != '' && $pembayaran->bukti_pembayaran != null) {
                $path = public_path('dokumen/bukti_bayar');
                $filePic = $path . $pembayaran->bukti_pembayaran;
                unlink($filePic);
            }
            $buktiPembayaran = $buktiPembayaran->getClientOriginalName();
            $pembayaran->bukti_pembayaran = $buktiPembayaran;
            $request->bukti_pembayaran->move(public_path('dokumen/bukti_bayar'), $buktiPembayaran);
            $save = $pembayaran->save();
        }
        $save = $pembayaran->save();
        if( $save ){
            return redirect()->back()->with('success', 'Berhasil melakukan pembayaran');
       }else {
            return redirect()->back()->with('fail', 'Gagal melakukan pembayaran');
       }
    }
    //Riwayat Pembayaran
    function riwayat_pembayaran(){
        $riwayat_onboard = DB::table("pembayarans")->select('*')
            ->join('my_jobs','pembayarans.id_myjob', '=', 'my_jobs.id_myjob')
            ->join('pekerjaans', 'my_jobs.id_pekerjaan', '=', 'pekerjaans.id_pekerjaan')
            ->where('pekerjaans.id_pemberikerja', auth::guard('pemberi_kerja')->user()->id_pemberikerja)
            ->where('my_jobs.status', 'Selesai')
            ->get();
        return view('pemberi_kerja.riwayat_pembayaran', compact('riwayat_onboard'));
    }
    //Detail Riwayat Pembayaran
    function detail_riwayat($id){
        $riwayat_onboard = DB::table("pembayarans")->select('*')
            ->join('my_jobs','pembayarans.id_myjob', '=', 'my_jobs.id_myjob')
            ->join('pekerjaans', 'my_jobs.id_pekerjaan', '=', 'pekerjaans.id_pekerjaan')
            ->where('pekerjaans.id_pemberikerja', auth::guard('pemberi_kerja')->user()->id_pemberikerja)
            ->where('my_jobs.status', 'Selesai')
            ->get();
        $detailRiwayat_onboard = DB::table("pembayarans")->select('*')
            ->join('my_jobs','pembayarans.id_myjob', '=', 'my_jobs.id_myjob')
            ->join('pekerjaans', 'my_jobs.id_pekerjaan', '=', 'pekerjaans.id_pekerjaan')
            ->join('freelancers','my_jobs.id_freelancer', '=', 'freelancers.id_freelancer')
            ->where('pekerjaans.id_pemberikerja', auth::guard('pemberi_kerja')->user()->id_pemberikerja)
            ->where('pembayarans.id', $id)
            ->where('my_jobs.status', 'Selesai')
            ->get();
        return view('pemberi_kerja.riwayat_pembayaran', compact('riwayat_onboard','detailRiwayat_onboard'));
    }
    //Status Seleksi
    function status_seleksi(){
        $status_onboard = DB::table("my_jobs")->select('*')
            ->join('pekerjaans', 'my_jobs.id_pekerjaan', '=', 'pekerjaans.id_pekerjaan')
            ->join('freelancers','my_jobs.id_freelancer', '=', 'freelancers.id_freelancer')
            ->where('pekerjaans.id_pemberikerja', auth::guard('pemberi_kerja')->user()->id_pemberikerja)
            ->whereNot('my_jobs.status', 'Selesai')
            ->get();
        return view('pemberi_kerja.status_seleksi', compact('status_onboard'));
    }
    //detail status Seleksi
    function detail_seleksi($id){
        $status_onboard = DB::table("my_jobs")->select('*')
            ->join('pekerjaans', 'my_jobs.id_pekerjaan', '=', 'pekerjaans.id_pekerjaan')
            ->join('freelancers','my_jobs.id_freelancer', '=', 'freelancers.id_freelancer')
            ->where('pekerjaans.id_pemberikerja', auth::guard('pemberi_kerja')->user()->id_pemberikerja)
            ->whereNot('my_jobs.status', 'Selesai')
            ->get();
        $detailSeleksi_onboard = DB::table("my_jobs")->select('*')
            ->join('pekerjaans', 'my_jobs.id_pekerjaan', '=', 'pekerjaans.id_pekerjaan')
            ->join('freelancers','my_jobs.id_freelancer', '=', 'freelancers.id_freelancer')
            ->where('pekerjaans.id_pemberikerja', auth::guard('pemberi_kerja')->user()->id_pemberikerja)
            ->where('my_jobs.id_myjob', $id)
            ->whereNot('my_jobs.status', 'Selesai')
            ->get();
        return view('pemberi_kerja.status_seleksi', compact('status_onboard','detailSeleksi_onboard'));
    }
    //change status seleksi (my_jobs)
    Function create_seleksi(Request $request){
        $request->validate([
            'id_myjob'=>'required',
        ]);

        $myjob = myJob::find($request->id_myjob);
        $myjob->status = $request->status ;
        $save = $myjob->save();
        if( $save ){
            return redirect()->back()->with('success', 'Berhasil mengubah status freelancer');
       }else {
            return redirect()->back()->with('fail', 'Gagal mengubah status freelancer');
       }
    }
    function create(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:pemberi_kerjas,email',
            'password'=>'required|min:5|max:30',
            'confirm_password'=>'required|min:5|max:30|same:password',
        ]);

        $perusahaan = new pemberiKerja();
        $perusahaan->name = $request->name;
        $perusahaan->email = $request->email;
        $perusahaan->password = \Hash::make($request->password);
        $save = $perusahaan->save();

        if( $save ){
             return redirect()->back()->with('success', 'You are now registered as Pemberi Kerja');
        }else {
             return redirect()->back()->with('fail', 'Failed to register');
        }
    }

    function check_login(Request $request)
    {
        $request->validate([
            'email'=>'required|email|exists:pemberi_kerjas,email',
            'password'=>'required|min:5|max:30',
        ],[
            'email.exists'=>'This email is not exists in pemberi kerja table',
        ]);

        $creds = $request->only('email', 'password');

        if( Auth::guard('pemberi_kerja')->attempt($creds) ){
            $index = Auth::guard('pemberi_kerja')->user()->id_pemberikerja;
            $log = new log();
            $log->user_id = $index;
            $log->user_type = "Pemberi Kerja";
            $log->type = "Berhasil";
            $log->activity = "Login";
            $log->page = "Login Page";
            $log->save();
            return redirect()->route('pemberi_kerja.dashboard');
        }else{
            return redirect()->route('pemberi_kerja.login')->with('fail','Incorrect credentials');
        }
        
    }

    function create_kerja(Request $request){
        $request->validate([
            'judul_pekerjaan'=>'required',
            'deskripsi_pekerjaan'=>'required|max:100',
            'gaji'=>'required|integer',
            'kategori'=>'required',
            'deadline_daftar'=>'required|date|after:tomorrow',
        ],[
            'deskripsi_pekerjaan.max'=>'Maksimal 100 karakter!',
            'gaji.integer'=>'Isi dengan angka!',
            'deadline_daftar.after'=>'Minimal deadline 1 hari dari hari ini!',
        ]);
        $pekerjaan = new Pekerjaan();
        $pekerjaan->nama_pekerjaan = $request->judul_pekerjaan;
        $pekerjaan->deskripsi_pekerjaan = $request->deskripsi_pekerjaan;
        $pekerjaan->fee_pekerjaan = $request->gaji;
        $pekerjaan->kategori = $request->kategori;
        $pekerjaan->deadline = date("Y-m-d H:i:s", strtotime($request->deadline_daftar));
        $pekerjaan->id_pemberikerja = Auth::guard('pemberi_kerja')->user()->id_pemberikerja;
        $save = $pekerjaan->save();
        if( $save ){
            $index = Auth::guard('pemberi_kerja')->user()->id_pemberikerja;
            $log = new log();
            $log->user_id = $index;
            $log->user_type = "Pemberi Kerja";
            $log->type = "Berhasil";
            $log->activity = "Tambah Pekerjaan";
            $log->page = "Tambah Pekerjaan Page";
            $log->save();
            return redirect()->back()->with('success', 'Berhasil tambah pekerjaan');
       }else {
            $index = Auth::guard('pemberi_kerja')->user()->id_pemberikerja;
            $log = new log();
            $log->user_id = $index;
            $log->user_type = "Pemberi Kerja";
            $log->type = "Gagal";
            $log->activity = "Tambah Pekerjaan";
            $log->page = "Tambah Pekerjaan Page";
            $log->save();
            return redirect()->back()->with('fail', 'Gagal tambah pekerjaan');
       }
    }

    public function pekerjaan()
    {

        if(Auth::guard('pemberi_kerja')->check()){
            $kategori = DB::table("pekerjaans")
                        ->select('kategori')
                        ->join('pemberi_kerjas', 'pekerjaans.id_pemberikerja', '=', 'pemberi_kerjas.id_pemberikerja')
                        ->groupby('kategori')
                        ->where('pemberi_kerjas.id_pemberikerja',Auth::guard('pemberi_kerja')->user()->id_pemberikerja)
                        ->get();
                
            $pekerjaan = DB::table("pekerjaans")->select('*')
                        ->join('pemberi_kerjas', 'pekerjaans.id_pemberikerja', '=', 'pemberi_kerjas.id_pemberikerja')
                        ->where('pemberi_kerjas.id_pemberikerja',Auth::guard('pemberi_kerja')->user()->id_pemberikerja)
                        ->get();

             return view('pemberi_kerja.pekerjaan', compact('pekerjaan', 'kategori'));
        }

        
    } 

    public function pekerjaan_kategori($index)
    {

        if(Auth::guard('pemberi_kerja')->check()){

            $kategori = DB::table("pekerjaans")
                        ->select('kategori')
                        ->join('pemberi_kerjas', 'pekerjaans.id_pemberikerja', '=', 'pemberi_kerjas.id_pemberikerja')
                        ->groupby('kategori')
                        ->where('pemberi_kerjas.id_pemberikerja',Auth::guard('pemberi_kerja')->user()->id_pemberikerja)
                        ->get();
                
            $pekerjaan = DB::table("pekerjaans")->select('*')
                        ->join('pemberi_kerjas', 'pekerjaans.id_pemberikerja', '=', 'pemberi_kerjas.id_pemberikerja')
                        ->where('pemberi_kerjas.id_pemberikerja',Auth::guard('pemberi_kerja')->user()->id_pemberikerja)
                        ->where('kategori','like',"%".$index."%")
                        ->get();
            
             return view('pemberi_kerja.hasil_pekerjaan', compact('pekerjaan', 'kategori'));
        }
        
    } 

    public function hasil_pekerjaan(Request $request)
    {
		$cari = $request->pencarian;
        
        if(Auth::guard('pemberi_kerja')->check()){

            $kategori = DB::table("pekerjaans")
                        ->select('kategori')
                        ->join('pemberi_kerjas', 'pekerjaans.id_pemberikerja', '=', 'pemberi_kerjas.id_pemberikerja')
                        ->groupby('kategori')
                        ->where('pemberi_kerjas.id_pemberikerja',Auth::guard('pemberi_kerja')->user()->id_pemberikerja)
                        ->get();
                
            $pekerjaan = DB::table("pekerjaans")->select('*')
                        ->join('pemberi_kerjas', 'pekerjaans.id_pemberikerja', '=', 'pemberi_kerjas.id_pemberikerja')
                        ->where('pemberi_kerjas.id_pemberikerja',Auth::guard('pemberi_kerja')->user()->id_pemberikerja)
                        ->where('nama_pekerjaan','like',"%".$cari."%")
                        ->get();
            

             return view('pemberi_kerja.hasil_pekerjaan', compact('pekerjaan', 'kategori'));
        }
        
    } 
    function delete_pekerjaan($id)
    {
        $kerja=Pekerjaan::find($id);
        $delete=$kerja->delete();
        if( $delete ){
            $index = Auth::guard('pemberi_kerja')->user()->id_pemberikerja;
            $log = new log();
            $log->user_id = $index;
            $log->user_type = "Pemberi Kerja";
            $log->type = "Berhasil";
            $log->activity = "Hapus Pekerjaan";
            $log->page = "Pekerjaan Page";
            $log->save();
            return redirect()->back()->with('success', 'Berhasil hapus pekerjaan');
       }else {
            return redirect()->back()->with('fail', 'Gagal hapus pekerjaan');
       }

    }

    function edit_pekerjaan($id, Request $request)
    {
        $request->validate([
            'judul_pekerjaan'=>'required',
            'deskripsi_pekerjaan'=>'required|max:100',
            'gaji'=>'required|integer',
            'kategori'=>'required',
        ],[
            'deskripsi_pekerjaan.max'=>'Deksripsi pekerjaan maksimal 100 karakter!',
            'gaji.integer'=>'Isi gaji dengan angka!',
        ]);
        $pekerjaan = Pekerjaan::find($id);
        $pekerjaan->nama_pekerjaan = $request->judul_pekerjaan;
        $pekerjaan->deskripsi_pekerjaan = $request->deskripsi_pekerjaan;
        $pekerjaan->fee_pekerjaan = $request->gaji;
        $pekerjaan->kategori = $request->kategori;
        if($pekerjaan->deadline != date('Y-m-d H:i:s', strtotime($request->deadline_daftar))){
            $request->validate([
                'deadline_daftar'=>'required|date|after:tomorrow',
            ],[
                'deadline_daftar.after'=>'Minimal deadline 1 hari dari hari ini!',
            ]);
            $pekerjaan->deadline = date("Y-m-d H:i:s", strtotime($request->deadline_daftar));
        }
        
        $save = $pekerjaan->save();
        if( $save ){
            return redirect()->back()->with('success', 'Berhasil edit pekerjaan');
       }else {
            return redirect()->back()->with('fail', 'Gagal edit pekerjaan');
       }
    }

    function logout(){
        Auth::guard('pemberi_kerja')->logout();
        return redirect()->route('pemberi_kerja.login');
    }
}
