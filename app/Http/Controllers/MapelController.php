<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Mapel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class MapelController extends Controller
{
    public function index()
    {
        $data=[
            'title'                 => 'Mata Pelajaran',
            'teks'                  => 'Daftar Mata Pelajaran yang diampu Guru',
            'mapels'                => Mapel::all(),
            'mapel_all'             => Mapel::count(),
            'mapel_active'          => Mapel::where('status', '=', '1')->count(),
            'mapel_nonactive'       => Mapel::where('status', '=', '0')->count(),
        ];

        return view('backend.mapel.index', $data);
    }
    public function create()
    {

        $data=[
            'title'     =>'BUAT MATA PELAJARAN BARU',
            'teks'      =>'Dihalaman ini anda dapat menambahkan mata pelajaran',
            'method'    =>'POST',
            'guru'      => User::where('role', 'guru')->where('status', 1)->get(),
            'kelas'     => Kelas::where('status', 1)->get(),
            'route'     => route('mapel.store'),
        ];

        return view('backend.mapel.create', $data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'code'          => Str::random(10),
            'code_mapel'    => 'required',
            'nama'          => 'required',
            'guru_id'       => 'required',
            'kelas_id'      => 'required',
            'keterangan'    => '',
            'status'        => ''
        ]);

        Mapel::create($data);
        if ($data) {
        return redirect()->route('mapel.index')->with('message', 'Mata Pelajaran baru berhasil dibuat');
        } else {
            return redirect()->route('mapel.index')->with('message', 'Mata Pelajaran baru gagal dibuat');
        }

    }

    public function edit()
    {
        $data=[
            'title'     =>'BUAT MATA PELAJARAN BARU',
            'teks'      =>'Dihalaman ini anda dapat menambahkan mata pelajaran',
            'method'    =>'POST',
            'guru'      => User::where('role', 'guru')->where('status', 1)->get(),
            'kelas'     => Kelas::where('status', 1)->get(),
            'route'     => route('mapel.update'),
        ];
        return view('backend.mapel.edit', $data);
    }

    public function status($code)
    {
        $mapel = Mapel::where('code', $code)->first();
        $mapel->status = $mapel->status == '0' ? '1' : $mapel->status = '0';
        $mapel->save();
        return redirect()->route('mapel.index')->withSuccess('Status berhasil diubah');
    }

    public function destroy($code)
    {
        $mapel = Mapel::where('code', $code);
        $mapel->delete();
        return back()->with('message', 'Mata Pelajaran berhasil dihapus');
    }
}
