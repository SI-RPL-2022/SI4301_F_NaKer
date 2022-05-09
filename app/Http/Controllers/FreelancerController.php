<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pekerjaan;
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
    public function profil()
    {
        return view('freelancer.profil');
    }
    public function edit_profil()
    {
        return view('freelancer.edit_profil');
    }
    function logout(){
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
