<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Hadir;
use App\Models\Konfirmasi;
use App\Models\TidakHadir;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PresensiController extends Controller
{
    // Kehadiran Hari Ini
    public function hadir()
    {
        return view('backend.presensi.index', [
            'title'             => 'Data Hadir Hari Ini',
            'hadir_count'       => Hadir::count(),
            'tdkhadir_count'    => TidakHadir::where('tgl', Carbon::today())->count(),
            'hadirs'            => Hadir::all()
        ]);
    }

    // Konfirmasi Hari Ini
    public function konfirmasi()
    {

        $hadir = Hadir::where('uid', '!=', 'NULL')->select('uid')->get()->toArray();
        $tdkhadir = TidakHadir::where('uid', '!=', 'NULL')->select('uid')->get()->toArray();

        return view('backend.presensi.konfirmasi', [
            'title'         => 'Konfirmasi',
            'confirm'       => Konfirmasi::wherenotin('uid', $hadir)->wherenotin('uid', $tdkhadir)->get(),
        ]);
    }

    // Tidak Hadir Hari Ini
    public function tdkhadir()
    {

        return view('backend.presensi.index', [
            'title'         => 'Data Tidak Hadir Hari Ini',
            'hadir_count'   => Hadir::count(),
            'hadirs'        => Hadir::all()
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

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
