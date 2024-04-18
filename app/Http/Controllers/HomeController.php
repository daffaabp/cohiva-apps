<?php

namespace App\Http\Controllers;

use App\Models\Konselor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        return view('home_new');
    }

    public function info()
    {
        return view('pasien.info_hiv');
    }

    public function daftar_konselor()
    {
        $konselors = Konselor::where('is_aktif','=', 1)->get();
        return view('pasien.daftar_konselor', compact('konselors'));
    }

    public function jadwalkan_konseling()
    {
        return view('pasien.jadwalkan_konseling');
    }
}