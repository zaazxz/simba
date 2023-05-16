<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

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
    public function create(Request $request)
    {
        $wakel = $request->unit;
        $data = [
            'title'     => 'Tambah Kelas',
            'kelas'     => Kelas::all(),
            'teachers'  => User::where('role', '=', 'Guru')->get(),
        ];
        return view('backend.kelas.create', $data);
    }

    // Insert Data
    public function store(Request $request)
    {
        $kelas                  = new Kelas();
        $kelas->code            = Str::random(10);
        $kelas->walikelas_id    = $request->walikelas_id;
        $kelas->nama            = $request->nama;
        $kelas->unit            = $request->unit;
        $kelas->km              = $request->km;
        $kelas->telp_km         = $request->telp_km;
        $kelas->status          = 0;
        $kelas->save();
        return redirect()->route('kelas.index')->with('message', 'Input Data GTK baru berhasil dibuat');
    }

    // Halaman Ubah Data Kelas
    public function edit($code)
    {
        $edit_kelas=[
            'title'         => 'Update Kelas',
            'route'         => route('kelas.update', $code),
            'method'        => 'PUT',
            'classrooms'    => Kelas::where('code', $code)->first()
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

    // Function
    public function wakel(Request $request)
    {
        $wakel = DB::table('kelas')->select('walikelas_id');
        $unit = $request->unit;
        $teachers = User::where('role', 'Guru')->where('unit', $unit)->whereNotIn('id', $wakel)
                        ->orWhere('role', 'Guru')->where('unit2', $unit)->whereNotIn('id', $wakel)->get();
        $option = '<option>Pilih asw...</option>';
        foreach ($teachers as $teacher) {
            $option.= "<option value='$teacher->id'>$teacher->name</option>";
        }
        echo $option;
    }

    public function wakelUpdate(Request $request)
    {
        $wakel = DB::table('kelas')->select('walikelas_id');
        $unit = $request->unit;
        $walas = $request->walas;
        $teachers = User::where('role', 'Guru')->where('unit', $unit)->whereNotIn('id', $wakel)
                        ->orWhere('role', 'Guru')->where('unit2', $unit)->whereNotIn('id', $wakel)
                        ->orWhere('role', 'Guru')->where('unit', $unit)->where('id', $walas)
                        ->orWhere('role', 'Guru')->where('unit2', $unit)->where('id', $walas)->get();
        $option = '<option>Pilih asw...</option>';
        foreach ($teachers as $teacher) {
            $option.= "<option value='$teacher->id'>$teacher->name</option>";
        }
        echo $option;
    }

}
