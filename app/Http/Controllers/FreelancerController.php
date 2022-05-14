<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pekerjaan;
use App\Models\Freelancer;
use App\Models\myJob;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FreelancerController extends Controller
{
    function check_login(Request $request)
    {
        $request->validate([
            'email'=>'required|email|exists:freelancers,email',
            'password'=>'required|min:5|max:30',
        ],[
            'email.exists'=>'This email is not exists in freelancers table',
        ]);

        $creds = $request->only('email', 'password');

        if( Auth::guard('web')->attempt($creds) ){
            return redirect()->route('home');
        }else{
            return redirect()->route('freelancer.login')->with('fail','Incorrect credentials');
        }
        
    }

    function applied($id, Request $request){
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
        if($cvName != ""){
            if($f->cv != '' && $f->cv != null){
                $path = public_path('dokumen/cv/');
                $fileCv = $path.$f->cv;
                unlink($fileCv);
            }
            $cvName = $cvName->getClientOriginalName();
            $f->cv = $cvName;
            $request->cvfile->move(public_path('dokumen/cv'), $cvName);
            $save = $f->save();
        }

        if($portoName != ""){
            if($f->portofolio != '' && $f->portofolio != null){
                $path = public_path('dokumen/portofolio/');
                $filePorto = $path.$f->portofolio;
                unlink($filePorto);
            }
            $portoName = $portoName->getClientOriginalName();
            $f->portofolio = $portoName;
            $request->portofile->move(public_path('dokumen/portofolio'), $portoName);
            $save = $f->save();
        }

        if($sertifName != ""){
            if($f->sertifikat != '' && $f->sertifikat != null){
                $path = public_path('dokumen/sertifikat/');
                $fileSertif = $path.$f->sertifikat;
                unlink($fileSertif);
            }
            $sertifName = $sertifName->getClientOriginalName();
            $f->sertifikat = $sertifName;
            $request->sertifikatfile->move(public_path('dokumen/sertifikat'), $sertifName);
            $save = $f->save();
        }

        
        if( $saveJob ){
            return redirect()->route('cari_kerja')->with('success', 'Lamaran kerja berhasil dibuat!');
        }else {
            return redirect()->back()->with('fail', 'Gagal melamar kerja');
        }
        

        
        
        if($cvName == ""){
            $f->save();
            
        }
        if($portoName == ""){
            $f->save();
            
        }
        if($sertifName == ""){
            $f->save();
            
        }

    }
    public function profil()
    {
        return view('freelancer.profil');
    }
    public function edit_profil()
    {
        return view('freelancer.edit_profil');
    }

    public function lamar_kerja($id){
        $pekerjaan = Pekerjaan::find($id); 
        return view('freelancer.lamar_kerja', compact('pekerjaan'));
    }
    function logout(){
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
