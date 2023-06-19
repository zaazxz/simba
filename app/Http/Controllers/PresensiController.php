<?php

namespace App\Http\Controllers;

use App\Models\Hadir;
use App\Models\Konfirmasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PresensiController extends Controller
{
    // Kehadiran Hari Ini
    public function hadir()
    {
        return view('backend.presensi.index', [
            'title'         => 'Data Hadir Hari Ini',
            'hadir_count'   => Hadir::count(),
            'hadirs'        => Hadir::all()
        ]);
    }

        // Konfirmasi Hari Ini
        public function konfirmasi()
        {

            $hadir = Hadir::where('uid', '!=', 'NULL')->select('uid')->get()->toArray();

            return view('backend.presensi.konfirmasi', [
                'title'         => 'Konfirmasi',
                'confirm'       => Konfirmasi::wherenotin('uid', $hadir)->get(),
            ]);
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
