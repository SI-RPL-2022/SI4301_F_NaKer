<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Pekerjaan;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function cari_kerja()
    {
        $pekerjaan = Pekerjaan::all(); 
        return view('cari_kerja', compact('pekerjaan'));
    } 
    public function dashboard()
    {
        $pekerjaan = Pekerjaan::all(); 
        return view('dashboard', compact('pekerjaan'));
    }
}
