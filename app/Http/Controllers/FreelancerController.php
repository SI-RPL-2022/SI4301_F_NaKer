<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pekerjaan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FreelancerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function profil()
    {
        return view('profil');
    }
    public function edit_profil()
    {
        return view('edit_profil');
    }
    function logout(){
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
