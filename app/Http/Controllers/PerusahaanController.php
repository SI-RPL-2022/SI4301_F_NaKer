<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pemberiKerja;
use Illuminate\Support\Facades\Auth;

class PerusahaanController extends Controller
{
    public function profil()
    {
        return view('pemberi_kerja.profil');
    }
    public function edit_profil()
    {
        return view('pemberi_kerja.edit_profil');
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
            return redirect()->route('pemberi_kerja.dashboard');
        }else{
            return redirect()->route('pemberi_kerja.login')->with('fail','Incorrect credentials');
        }
        
    }
    function logout(){
        Auth::guard('pemberi_kerja')->logout();
        return redirect()->route('pemberi_kerja.login');
    }
}
