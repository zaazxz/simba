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

    // Halaman Tambah Data Kelas
    public function create()
    {
        //
    }

    // Insert Data
    public function store(Request $request)
    {
        //
    }

    // Halaman Ubah Data Kelas
    public function edit($code)
    {
        $edit_kelas=[
            'title'         => 'Update Kelas',
            'route'         => route('kelas.update', $code),
            'method'        => 'PUT',
            'classrooms'    => User::where('code', $code)->first(),
        ];
        return view('backend.kelas.edit', $edit_kelas);
    }

    // Update Data
    public function update(Request $request, Kelas $kelas)
    {
        //
    }

    // Delete Data
    public function destroy($code)
    {
        $kelas = Kelas::where('code', $code);
        $kelas->delete();
        return back()->with('message', 'Kelas berhasil dihapus');
    }
}
