<?php
namespace App\Http\Controllers;

use App\Models\vjadwal;
use Illuminate\Http\Request;
use App\Imports\ImportJadwals;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class JadwalController extends Controller
{
    // Index
    public function index()
    {
        $data = [
            'title' => 'Jadwal KBM Guru',
            'vjadwals' => vjadwal::all(),
        ];
        // dd($data);
        return view('backend.jadwal.vjadwal', $data);
    }

    // Hari Ini
    public function today()
    {
        $data = [
            'title' => 'Jadwal Hari ini',
            'hari'  => Carbon::today()->isoFormat('dddd'),
            'vjadwals' => vjadwal::where('hari', Carbon::today()->isoFormat('dddd'))->get(),
        ];
        return view('backend.jadwal.vjadwal', $data);
    }

    // Besok
    public function besok()
    {
        $data = [
            'title' => 'Jadwal Esok Hari',
            'vjadwals' => vjadwal::where('hari', Carbon::tomorrow()->isoFormat('dddd'))->get(),
        ];
        return view('backend.jadwal.vjadwal', $data);
    }

    // Khusus Pribadi
    public function khusus()
    {
        $data = [
            'title' => 'Jadwal ' . Auth::user()->name,
            'hari'  => Carbon::today()->isoFormat('dddd'),
            'vjadwals' => vjadwal::where('nama_lengkap', Auth::user()->name)->get(),
        ];
        return view('backend.jadwal.vjadwal', $data);
    }

    // Import
    public function import(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
        $file = $request->file('file');
        $nama_file = rand().$file->getClientOriginalName();
        $file->move('idocs', $nama_file);
        Excel::import(new ImportJadwals, public_path('/idocs/'.$nama_file));
        return redirect()->route('jadwal.index')->withSuccess('Status berhasil diubah');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
