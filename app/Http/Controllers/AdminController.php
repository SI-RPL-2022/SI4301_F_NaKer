<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\videoTraining;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function check_login(Request $request)
    {
        $request->validate([
            'email'=>'required|email|exists:admins,email',
            'password'=>'required|min:5|max:30',
        ],[
            'email.exists'=>'This email is not exists in admins table',
        ]);

        $creds = $request->only('email', 'password');

        if( Auth::guard('admin')->attempt($creds) ){
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->route('admin.login')->with('fail','Incorrect credentials');
        }
        $pekerjaan = Pekerjaan::all(); 
        return view('freelancer.dashboard', compact('pekerjaan'));
        
    }
    function video_training()
    {
        $vid = videoTraining::all();
        return view('admin.video_training', compact('vid'));
    }

    function create_video(Request $request)
    {
        $request->validate([
            'judul_video'=>'required',
            'deskripsi_video'=>'required|max:100',
            'link_video'=>'required',
            'durasi'=>'required',
        ],[
            'deskripsi_video.max'=>'Maksimal 100 karakter!',
        ]);
        $vid = new videoTraining();
        $vid->nama_videotraining = $request->judul_video;
        $vid->deskripsi_videotraining = $request->deskripsi_video;
        $vid->link_video = preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","//www.youtube.com/embed/$1",$request->link_video);
        $vid->durasi = date("H:i:s", strtotime($request->durasi));
        $vid->id_admin = Auth::guard('admin')->user()->id_admin;
        $save = $vid->save();
        if( $save ){
            return redirect()->back()->with('success', 'Berhasil tambah video');
       }else {
            return redirect()->back()->with('fail', 'Gagal tambah video');
       }
    }

    function delete_video($id)
    {
        $vid=videoTraining::find($id);
        $delete=$vid->delete();
        if( $delete ){
            return redirect()->back()->with('success', 'Berhasil hapus video');
       }else {
            return redirect()->back()->with('fail', 'Gagal hapus video');
       }

    }
    function edit_video($id, Request $request)
    {
        $request->validate([
            'judul_video'=>'required',
            'deskripsi_video'=>'required|max:100',
            'link_video'=>'required',
            'durasi'=>'required',
        ],[
            'deskripsi_video.max'=>'Maksimal 100 karakter!',
        ]);
        $vid = videoTraining::find($id);
        $vid->nama_videotraining = $request->judul_video;
        $vid->deskripsi_videotraining = $request->deskripsi_video;
        if($request->link_video != $vid->link_video){
            $vid->link_video = preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","//www.youtube.com/embed/$1",$request->link_video);
        }
        $vid->durasi = date("H:i:s", strtotime($request->durasi));
        $vid->id_admin = Auth::guard('admin')->user()->id_admin;
        $save = $vid->save();
        if( $save ){
            return redirect()->back()->with('success', 'Berhasil edit video');
       }else {
            return redirect()->back()->with('fail', 'Gagal edit video');
       }
    }
    function logout(){
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
