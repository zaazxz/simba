<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Hadir;
use App\Models\Konfirmasi;
use App\Models\TidakHadir;
use Illuminate\Http\Request;
use App\Models\PersentaseAbsensi;
use App\Models\PersentaseBulanan;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PresensiController extends Controller
{

    // Presensi Bulanan
    public function bulanan()
    {

        return view('backend.presensi.presensi', [
            'title'             => 'Persentase Data Presensi Bulanan',
            'datas'             => PersentaseBulanan::all(),
            'count_bulan'       => PersentaseAbsensi::count(),
            'count_keseluruhan' => PersentaseAbsensi::count()
        ]);
    }

    // Presensi Keseluruhan
    public function keseluruhan()
    {
        return view('backend.presensi.presensi', [
            'title'             => 'Persentase Data Presensi Keseluruhan',
            'datas'             => PersentaseAbsensi::all(),
            'count_bulan'       => PersentaseAbsensi::count(),
            'count_keseluruhan' => PersentaseAbsensi::count()
        ]);
    }

    // Presensi Keseluruhan Reset
    public function reset()
    {
        DB::table('persentase_absen')
            ->update([
                'jadwal_keseluruhan'    => DB::raw("0"),
                'terlaksana'            => DB::raw("0"),
                'hadir'                 => DB::raw("0"),
                'tidak_hadir'           => DB::raw("0"),
            ]);

        return redirect()->route('presensi.keseluruhan')->with('message', 'Reset Data Kehadiran Berhasil');
    }

    // Kehadiran Hari Ini
    public function hadir()
    {
        return view('backend.presensi.index', [
            'title'                 => 'Data Hadir Hari Ini',
            'hadir_count'           => Hadir::count(),
            'tidakhadir_count'      => TidakHadir::where('tgl', Carbon::today())->count(),
            'hadirs'                => Hadir::all()
        ]);
    }

    // Konfirmasi Hari Ini
    public function konfirmasi()
    {

        $hadir = Hadir::where('uid', '!=', 'NULL')->select('uid')->get()->toArray();
        $tdkhadir = TidakHadir::where('tgl', '=', Carbon::today())->where('uid', '!=', 'NULL')->select('uid')->get()->toArray();

        return view('backend.presensi.konfirmasi', [
            'title'         => 'Konfirmasi',
            'confirm'       => Konfirmasi::wherenotin('uid', $hadir)->wherenotin('uid', $tdkhadir)->get(),
        ]);
    }

    // Tidak Hadir Hari Ini
    public function tidak()
    {

        return view('backend.presensi.tdkhadir', [
            'title'                 => 'Data Tidak Hadir Hari Ini',
            'hadir_count'           => Hadir::count(),
            'tidakhadir_count'      => TidakHadir::where('tgl', Carbon::today())->count(),
            'hadirs'                => Hadir::all(),
            'tidakhadirs'           => TidakHadir::where('tgl', Carbon::today())->get()
        ]);
    }

    // Presensi Tidak Hadir
    public function store(Request $request)
    {
        $data = $request->validate([
            'uid'           => 'required',
            'nama'          => 'required',
            'hari'          => 'required',
            'bulan'         => 'required',
            'status'        => 'required',
            'tahun'         => 'required',
            'unit'          => 'required',
            'keterangan'    => '',
        ]);

        TidakHadir::create([
            'uid'           => $request->uid,
            'nama'          => $request->nama,
            'hari'          => $request->hari,
            'unit'          => $request->unit,
            'bulan'         => $request->bulan,
            'status'        => $request->status,
            'tahun'         => $request->tahun,
            'keterangan'    => $request->keterangan,
            'tgl'           => Carbon::today(),
            'update_oleh'   => Auth::user()->name,
            'waktu_update'  => Carbon::now()
        ]);

        if ($data) {
            return redirect()->route('presensi.konfirmasi')->with('message', 'Ubah Data Kehadiran Berhasil');
        } else {
            return redirect()->route('presensi.konfirmasi')->with('message', 'Ubah Data Kehadiran Gagal');
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'status'        => '',
            'keterangan'    => '',
        ]);

        TidakHadir::where('id', $id)
            ->update($data);

        if ($data) {
            return redirect()->route('presensi.tidak')->with('message', 'Ubah Data Kehadiran Berhasil');
        } else {
            return redirect()->route('presensi.tidak')->with('message', 'Ubah Data Kehadiran Gagal');
        }
    }

    public function destroy($id)
    {
        $konfirmasi = TidakHadir::where('id', $id);
        $konfirmasi->delete();
        return back()->with('message', 'Data presensi berhasil dihapus');
    }
}
