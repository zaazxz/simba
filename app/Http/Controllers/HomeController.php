<?php
namespace App\Http\Controllers;

use App\Models\User;

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
        $info=[
            'guru'      => User::where('role', '!=', 'Admin')->count(),
            'sd'      => User::where('unit', '=', 'SD Bakti Nusantara 666')->count(),
            'smp'      => User::where('unit', '=', 'SMP Bakti Nusantara 666')->count(),
            'smk'      => User::where('unit', '=', 'SMK Bakti Nusantara 666')->count(),
        ];
        return view('backend.home', $info);
    }
}
