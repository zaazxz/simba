<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Hadir;
use App\Models\Konfirmasi;
use App\Models\TidakHadir;
use App\Models\vharitoday;
use App\Models\vguruterbaik;
use App\Models\vabsenbulanan;
use Illuminate\Support\Facades\DB;
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

        $hadir = Hadir::where('uid', '!=', 'NULL')->select('uid')->get()->toArray();
        $tdkhadir = TidakHadir::where('tgl', '=', Carbon::today())->where('uid', '!=', 'NULL')->select('uid')->get()->toArray();

        return view('backend.home', [

            // Counting
            'guru'      => User::where('role', '=', 'Guru')->count(),
            'sd'        => User::where('unit', '=', 'SD Bakti Nusantara 666')->count(),
            'smp'       => User::where('unit', '=', 'SMP Bakti Nusantara 666')->count(),
            'smk'       => User::where('unit', '=', 'SMK Bakti Nusantara 666')->count(),

            // GTK Percentage Bulanan
            'sd_percentage'     => vabsenbulanan::where('unit_users', 'SD Bakti Nusantara 666')->first(),
            'smp_percentage'    => vabsenbulanan::where('unit_users', 'SMP Bakti Nusantara 666')->first(),
            'smk_percentage'    => vabsenbulanan::where('unit_users', 'SMK Bakti Nusantara 666')->first(),

            // Kehadiran Guru
            'bestTeacherSMK'    => vguruterbaik::where('unit', 'SMK Bakti Nusantara 666')->get(),
            'bestTeacherSMP'    => vguruterbaik::where('unit', 'SMP Bakti Nusantara 666')->get(),
            'bestTeacherSD'     => vguruterbaik::where('unit', 'SD Bakti Nusantara 666')->get(),

            // Counting Hadir
            'hadirToday'        => Hadir::count(),
            'tidakHadirToday'   => TidakHadir::where('tgl', Carbon::today())->count(),

            // Data Presensi Hari Ini
            'confirmToday'      => Konfirmasi::wherenotin('uid', $hadir)->wherenotin('uid', $tdkhadir)->count(),

            // Tanggal
            'tgl' => Carbon::today()->format('d-m-Y'),

            // Hari
            'hari' => Carbon::today()->isoFormat('dddd'),

        ]);
    }
}
