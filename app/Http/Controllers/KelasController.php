<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KelasController extends Controller
{
    
    // Halaman Kelas
    public function index()
    {
        $data=[
            'title'                 => 'Daftar Kelas',
            'classrooms'            => Kelas::all(), 
            'classrooms_all'        => Kelas::count(), 
            'classrooms_active'     => Kelas::where('status', '=', '1')->count(),
            'classrooms_deactive'   => Kelas::where('status', '=', '0')->count(),
        ];
        return view('backend.kelas.index', $data);
    }
    
    // Halaman Kelas Aktif
    public function aktif()
    {
        $data=[
            'title'                 => 'Daftar Kelas Aktif',
            'classrooms'            => Kelas::where('status', '=', '1')->get(), 
            'classrooms_all'        => Kelas::count(), 
            'classrooms_active'     => Kelas::where('status', '=', '1')->count(),
            'classrooms_deactive'   => Kelas::where('status', '=', '0')->count(),
        ];
        return view('backend.kelas.index', $data);
    }
    
    // Halaman Kelas Pending
    public function pending()
    {
        $data=[
            'title'                 => 'Daftar Kelas Pending',
            'classrooms'            => Kelas::where('status', '=', '0')->get(), 
            'classrooms_all'        => Kelas::count(), 
            'classrooms_active'     => Kelas::where('status', '=', '1')->count(),
            'classrooms_deactive'   => Kelas::where('status', '=', '0')->count(),
        ];
        return view('backend.kelas.index', $data);
    }

    // Ubah Status
    public function status($code)
    {
        $kelas = Kelas::where('code', $code)->first();
        $kelas->status = $kelas->status == '0' ? '1' : $kelas->status = '0';
        $kelas->save();
        return redirect()->route('kelas.index')->withSuccess('Status berhasil diubah');
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
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $kelas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelas $kelas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $kelas)
    {
        //
    }
}
