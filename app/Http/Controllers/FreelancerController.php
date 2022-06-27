<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pekerjaan;
use App\Models\Freelancer;
use App\Models\myJob;
use App\Models\Pembayaran;
use App\Models\log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class FreelancerController extends Controller
{
    function check_login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:freelancers,email',
            'password' => 'required|min:5|max:30',
        ], [
            'email.exists' => 'This email is not exists in freelancers table',
        ]);

        $creds = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($creds)) {
            
            $index = Auth::guard('web')->user()->id_freelancer;
            $log = new log();
            $log->user_id = $index;
            $log->user_type = "Freelancer";
            $log->type = "Berhasil";
            $log->activity = "Login";
            $log->page = "Login Page";
            $log->save();
            
            return redirect()->route('home');
            
        } else {
            return redirect()->route('freelancer.login')->with('fail', 'Incorrect credentials');
        }
    }

    function applied($id, Request $request)
    {
        $index = Auth::guard('web')->user()->id_freelancer;

        $myjob = new myJob();
        $myjob->id_pekerjaan = $id;
        $myjob->id_freelancer = $index;
        $myjob->status = "Tahap Seleksi";
        $saveJob = $myjob->save();

        $f = Freelancer::find($index);
        $cvName = $request->cvfile;
        $portoName = $request->portofile;
        $sertifName = $request->sertifikatfile;


        //CV
        if ($cvName != "") {
            if ($f->cv != '' && $f->cv != null) {
                $path = public_path('dokumen/cv/');
                $fileCv = $path . $f->cv;
                unlink($fileCv);
            }
            $cvName = $cvName->getClientOriginalName();
            $f->cv = $cvName;
            $request->cvfile->move(public_path('dokumen/cv'), $cvName);
            $save = $f->save();
        }

        if ($portoName != "") {
            if ($f->portofolio != '' && $f->portofolio != null) {
                $path = public_path('dokumen/portofolio/');
                $filePorto = $path . $f->portofolio;
                unlink($filePorto);
            }
            $portoName = $portoName->getClientOriginalName();
            $f->portofolio = $portoName;
            $request->portofile->move(public_path('dokumen/portofolio'), $portoName);
            $save = $f->save();
        }

        if ($sertifName != "") {
            if ($f->sertifikat != '' && $f->sertifikat != null) {
                $path = public_path('dokumen/sertifikat/');
                $fileSertif = $path . $f->sertifikat;
                unlink($fileSertif);
            }
            $sertifName = $sertifName->getClientOriginalName();
            $f->sertifikat = $sertifName;
            $request->sertifikatfile->move(public_path('dokumen/sertifikat'), $sertifName);
            $save = $f->save();
        }


        if ($saveJob) {
            $log = new log();
            $log->user_id = $index;
            $log->user_type = "Freelancer";
            $log->type = "Berhasil";
            $log->activity = "Apply Pekerjaan";
            $log->page = "Pekerjaan Page";
            $log->save();
            return redirect()->route('cari_kerja')->with('success', 'Lamaran kerja berhasil dibuat!');
        } else {
            $log = new log();
            $log->user_id = $index;
            $log->user_type = "Freelancer";
            $log->type = "Gagal";
            $log->activity = "Apply Pekerjaan";
            $log->page = "Pekerjaan Page";
            $log->save();
            return redirect()->back()->with('fail', 'Gagal melamar kerja');
        }


        if ($cvName == "") {
            $f->save();
        }
        if ($portoName == "") {
            $f->save();
        }
        if ($sertifName == "") {
            $f->save();
        }
    }

    function pembayaran()
    {
        $pekerjaan_onboard = DB::table("pembayarans")->select('*')
            ->join('my_jobs', 'pembayarans.id_myjob', '=', 'my_jobs.id_myjob')
            ->join('pekerjaans', 'my_jobs.id_pekerjaan', '=', 'pekerjaans.id_pekerjaan')
            ->join('pemberi_kerjas', 'pekerjaans.id_pemberikerja', '=', 'pemberi_kerjas.id_pemberikerja')
            ->where('my_jobs.id_freelancer', Auth::guard('web')->user()->id_freelancer)
            ->where('my_jobs.status', 'Selesai')
            ->get();
        return view('freelancer.pembayaran', compact('pekerjaan_onboard'));
    }

    function check_pembayaran($id)
    {
        $pekerjaan_onboard = DB::table("pembayarans")->select('*')
            ->join('my_jobs', 'pembayarans.id_myjob', '=', 'my_jobs.id_myjob')
            ->join('pekerjaans', 'my_jobs.id_pekerjaan', '=', 'pekerjaans.id_pekerjaan')
            ->join('pemberi_kerjas', 'pekerjaans.id_pemberikerja', '=', 'pemberi_kerjas.id_pemberikerja')
            ->where('my_jobs.id_freelancer', Auth::guard('web')->user()->id_freelancer)
            ->where('my_jobs.status', 'Selesai')
            ->get();
        $detail_bayar = DB::table("pembayarans")->select('*')
            ->join('my_jobs', 'pembayarans.id_myjob', '=', 'my_jobs.id_myjob')
            ->join('pekerjaans', 'my_jobs.id_pekerjaan', '=', 'pekerjaans.id_pekerjaan')
            ->join('pemberi_kerjas', 'pekerjaans.id_pemberikerja', '=', 'pemberi_kerjas.id_pemberikerja')
            ->where('my_jobs.id_freelancer', Auth::guard('web')->user()->id_freelancer)
            ->where('pembayarans.id', $id)
            ->where('my_jobs.status', 'Selesai')
            ->get();
        return view('freelancer.pembayaran', compact('pekerjaan_onboard', 'detail_bayar'));
    }

    function selesai_bayar($id)
    {
        $index = Auth::guard('web')->user()->id_freelancer;
        $status_bayar = Pembayaran::find($id);
        $status_bayar->status_pembayaran = "Sudah Bayar";
        $save = $status_bayar->save();

        if ($save) {
            $log = new log();
            $log->user_id = $index;
            $log->user_type = "Freelancer";
            $log->type = "Berhasil";
            $log->activity = "Menyelesaikan pembayaran";
            $log->page = "Pembayaran Page";
            $log->save();
            return redirect()->route('freelancer.pembayaran')->with('success', 'Pembayaran selesai');
        } else {
            $log = new log();
            $log->user_id = $index;
            $log->user_type = "Freelancer";
            $log->type = "Gagal";
            $log->activity = "Menyelesaikan pembayaran";
            $log->page = "Pembayaran Page";
            $log->save();
            return redirect()->back()->with('fail', 'Gagal menyelesaikan pembayaran');
        }
    }

    public function profil()
    {
        // return view('freelancer.profil');
        $user = Auth()->user();
        return view('freelancer.profil', compact('user'));
    }
    public function edit_profil()
    {
        return view('freelancer.edit_profil');
    }

    public function update_profil(Request $request)
    {
        $validatedData = $request->validate([
            "id" => "required",
            'email' => "required",
            'pic'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $user = Freelancer::find($request->id);
        $user->email = $request->email;
        $user->date_of_birth = $request->date_of_birth;
        $user->alamat = $request->alamat;
        $user->LinkedinName = $request->LinkedinName;
        $user->no_telepon = $request->no_telepon;

        $cvName = $request->cvfile;
        $portoName = $request->portofile;
        $sertifName = $request->sertifikatfile;
        $picName = $request->pic;

        if ($picName != "") {
            if ($user->puc != '' && $user->pic != null) {
                $path = public_path('gambar/userprofile/');
                $filePic = $path . $user->pic;
                unlink($filePic);
            }
            $picName = $picName->getClientOriginalName();
            $user->pic = $picName;
            $request->pic->move(public_path('gambar/userprofile'), $picName);
            $save = $user->save();
        }
        if ($cvName != "") {
            if ($user->cv != '' && $user->cv != null) {
                $path = public_path('dokumen/cv/');
                $fileCv = $path . $user->cv;
                unlink($fileCv);
            }
            $cvName = $cvName->getClientOriginalName();
            $user->cv = $cvName;
            $request->cvfile->move(public_path('dokumen/cv'), $cvName);
            $save = $user->save();
        }

        if ($portoName != "") {
            if ($user->portofolio != '' && $user->portofolio != null) {
                $path = public_path('dokumen/portofolio/');
                $filePorto = $path . $user->portofolio;
                unlink($filePorto);
            }
            $portoName = $portoName->getClientOriginalName();
            $user->portofolio = $portoName;
            $request->portofile->move(public_path('dokumen/portofolio'), $portoName);
            $save = $user->save();
        }

        if ($sertifName != "") {
            if ($user->sertifikat != '' && $user->sertifikat != null) {
                $path = public_path('dokumen/sertifikat/');
                $fileSertif = $path . $user->sertifikat;
                unlink($fileSertif);
            }
            $sertifName = $sertifName->getClientOriginalName();
            $user->sertifikat = $sertifName;
            $request->sertifikatfile->move(public_path('dokumen/sertifikat'), $sertifName);
            $save = $user->save();
        }
        $user->save();

        $request->session()->flash("success", 'Profil Anda sudah berhasil di-edit!');
        return redirect()->back()->with("success", 'Profil Anda sudah berhasil di-edit!');
    }

    public function lamar_kerja($id)
    {
        $pekerjaan = Pekerjaan::find($id);
        return view('freelancer.lamar_kerja', compact('pekerjaan'));
    }
    function logout()
    {
        $index = Auth::guard('web')->user()->id_freelancer;
        $log = new log();
        $log->user_id = $index;
        $log->user_type = "Freelancer";
        $log->type = "Berhasil";
        $log->activity = "Logout";
        $log->page = "Dropdown";
        $log->save();
        Auth::guard('web')->logout();
        
        return redirect('/');
    }
}
