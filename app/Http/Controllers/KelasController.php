<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KelasController extends Controller
{
    public function index()
    {
        return view('backend.kelas.index', [
            'title'             => 'Daftar Kelas',
            'kelas'             => Kelas::all(),
            'kelas_all'         => Kelas::count(),
            'kelas_aktif'       => Kelas::where('status', 1)->count(),
            'kelas_nonaktif'    => Kelas::where('status', 0)->count(),
        ]);
    }

    public function aktif()
    {
        return view('backend.kelas.index', [
            'title'             => 'Daftar Kelas Aktif',
            'kelas'             => Kelas::where('status', 1)->get(),
            'kelas_all'         => Kelas::count(),
            'kelas_aktif'       => Kelas::where('status', 1)->count(),
            'kelas_nonaktif'    => Kelas::where('status', 0)->count(),
        ]);
    }

    public function nonaktif()
    {
        return view('backend.kelas.index', [
            'title'             => 'Daftar Kelas Nonaktif',
            'kelas'             => Kelas::where('status', 0)->get(),
            'kelas_all'         => Kelas::count(),
            'kelas_aktif'       => Kelas::where('status', 1)->count(),
            'kelas_nonaktif'    => Kelas::where('status', 0)->count(),
        ]);
    }

    public function create()
    {
        return view('backend.kelas.create', [
            'method'            => 'POST',
            'route'             => route('kelas.store'),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kelas'             => 'required',
            'unit'              => 'required',
            'km'                => '',
            'telp_km'           => '',
            'remember_token'    => Str::random(10)
        ]);

        Kelas::create($data);

        if ($data) {
            return redirect()->route('kelas.index')->with('message', 'Input Data Kelas berhasil ditambahkan');
        } else {
            return redirect()->route('kelas.index')->with('message', 'Input Data Kelas gagal ditambahkan');
        }

    }

    public function edit($id)
    {
        return view('backend.kelas.edit', [
            'title'     => 'Update Data Kelas',
            'route'     => route('kelas.update', $id),
            'method'    => 'PUT',
            'kelas'     => Kelas::where('id', $id)->first(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'kelas'             => 'required',
            'unit'              => 'required',
            'km'                => '',
            'telp_km'           => '',
            'remember_token'    => Str::random(10)
        ]);

        Kelas::where('id', $id)
            ->update($data);

        if ($data) {
            return redirect()->route('kelas.index')->with('message', 'Data Kelas berhasil diupdate');
        } else {
            return redirect()->route('kelas.index')->with('message', 'Data Kelas gagal diupdate');
        }
    }

    public function destroy($id)
    {
        $kelas = Kelas::where('id', $id);
        $kelas->delete();
        if ($kelas) {
            return redirect()->route('kelas.index')->with('message', 'Data Kelas berhasil dihapus');
        } else {
            return redirect()->route('kelas.index')->with('message', 'Data Kelas gagal dihapus');
        }
    }

    public function status($id)
    {
        $kelas = Kelas::where('id', $id)->first();
        $kelas->status = $kelas->status == '0' ? '1' : $kelas->status = '0';
        $kelas->save();
        return redirect()->route('kelas.index')->withSuccess('Status berhasil diubah');
    }
}
