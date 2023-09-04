<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\vabsenbulanan;
use App\Http\Controllers\Controller;

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
        return view('backend.home', [

            // Counting
            'guru'      => User::where('role', '!=', 'Admin')->count(),
            'sd'        => User::where('unit', '=', 'SD Bakti Nusantara 666')->count(),
            'smp'       => User::where('unit', '=', 'SMP Bakti Nusantara 666')->count(),
            'smk'       => User::where('unit', '=', 'SMK Bakti Nusantara 666')->count(),

            // GTK Percentage Bulanan
            'sd_percentage'     => vabsenbulanan::where('unit_users', 'SD Bakti Nusantara 666')->first(),
            'smp_percentage'    => vabsenbulanan::where('unit_users', 'SMP Bakti Nusantara 666')->first(),
            'smk_percentage'    => vabsenbulanan::where('unit_users', 'SMK Bakti Nusantara 666')->first(),

        ]);
    }
}
