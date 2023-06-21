<?php

namespace App\Http\Controllers;

use App\Models\mapel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MapelController extends Controller
{
    public function index()
    {
        return view('backend.mapel.index', [
            'title'             => 'Daftar Mapel',
            'mapels'            => Mapel::all(),
            'mapel_all'         => Mapel::count(),
            'mapel_aktif'       => Mapel::where('status', 1)->count(),
            'mapel_nonaktif'    => Mapel::where('status', 0)->count(),
        ]);
    }

    public function aktif()
    {
        return view('backend.mapel.index', [
            'title'             => 'Daftar Mapel Aktif',
            'mapels'            => Mapel::where('status', 1)->get(),
            'mapel_all'         => Mapel::count(),
            'mapel_aktif'       => Mapel::where('status', 1)->count(),
            'mapel_nonaktif'    => Mapel::where('status', 0)->count(),
        ]);
    }

    public function nonaktif()
    {
        return view('backend.mapel.index', [
            'title'             => 'Daftar Mapel Nonaktif',
            'mapels'            => Mapel::where('status', 0)->get(),
            'mapel_all'         => Mapel::count(),
            'mapel_aktif'       => Mapel::where('status', 1)->count(),
            'mapel_nonaktif'    => Mapel::where('status', 0)->count(),
        ]);
    }

    public function create()
    {
        return view('backend.mapel.create', [
            'method'            => 'POST',
            'route'             => route('mapel.store'),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kode'              => 'required|unique:tb_mapel,kode|max:2',
            'mapel'             => 'required',
            'beban'             => 'required',
            'remember_token'    => Str::random(10)
        ]);

        Mapel::create($data);

        if ($data) {
            return redirect()->route('mapel.index')->with('message', 'Input Data Mapel berhasil ditambahkan');
        } else {
            return redirect()->route('mapel.index')->with('message', 'Input Data Mapel gagal ditambahkan');
        }
    }

    public function edit($id)
    {
        return view('backend.mapel.edit', [
            'title'     => 'Update Data Mapel',
            'route'     => route('mapel.update', $id),
            'method'    => 'PUT',
            'mapel'     => Mapel::where('id', $id)->first(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'kode'              => 'required',
            'mapel'             => 'required',
            'beban'             => 'required',
            'remember_token'    => Str::random(10)
        ]);

        Mapel::where('id', $id)
            ->update($data);

        if ($data) {
            return redirect()->route('mapel.index')->with('message', 'Input Data Mapel berhasil ditambahkan');
        } else {
            return redirect()->route('mapel.index')->with('message', 'Input Data Mapel gagal ditambahkan');
        }
    }

    public function destroy($id)
    {
        $mapel = Mapel::where('id', $id);
        $mapel->delete();
        if ($mapel) {
            return redirect()->route('mapel.index')->with('message', 'Data Mapel berhasil dihapus');
        } else {
            return redirect()->route('mapel.index')->with('message', 'Data Mapel gagal dihapus');
        }
    }

    public function status($id)
    {
        $mapel = Mapel::where('id', $id)->first();
        $mapel->status = $mapel->status == '0' ? '1' : $mapel->status = '0';
        $mapel->save();
        return redirect()->route('mapel.index')->withSuccess('Status berhasil diubah');
    }
}
