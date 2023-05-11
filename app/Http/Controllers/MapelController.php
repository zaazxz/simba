<?php

namespace App\Http\Controllers;

use App\Models\indonesia_cities;
use App\Models\indonesia_districts;
use App\Models\indonesia_province;
use App\Models\indonesia_villages;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MapelController extends Controller
{
    public function index()
    {
        $data=[
            'title'     => 'Mata Pelajaran',
            'teks'     => 'Daftar Mata Pelajaran yang diampu Guru',
            'mapel'  => User::where('role', '!=', 'Admin')->where('role', '!=', 'Tata usaha')->get(),
            'mapel_all' => User::where('role', '!=', 'Admin')->where('role', '!=', 'Tata Usaha')->count(),
            'mapel_ak'  => User::where('role', '!=', 'Admin')->where('role', '!=', 'Tata Usaha')->where('status', '=', '1')->count(),
            'mapel_pe'  => User::where('role', '!=', 'Admin')->where('role', '!=', 'Tata Usaha')->where('status', '=', '0')->count(),
        ];
        //Log::channel('slack')->info('Data Guru', $data);
        // Log::channel('slack')->error('Data Guru', $data);
        return view('backend.mapel.index', $data);
    }
    public function create()
    {
        $data=[
            'title' =>'BUAT MATA PELAJARAN BARU',
            'teks'  =>'Dihalaman ini anda dapat menambahkan mata pelajaran',
            'method'=>'POST',
            'route' => route('mapel.store'),
            //14 Juli 2005
        ];
        return view('backend.mapel.create', $data);
    }

    public function store(Request $request)
    {
        $gtk = new User();
        $gtk->name = $request->name;
        $gtk->email = $request->email;
        $gtk->role = $request->role;
        $gtk->unit = $request->unit;
        $gtk->password = bcrypt('GantiSaya!');
        $gtk->save();
        return redirect()->route('mapel.index')->with('message', 'Mata Pelajaran baru berhasil dibuat');
    }

    public function edit()
    {
        // $edguru=[
        //     'title'     => 'Update Biodata',
        //     'route'     => route('guru.update', $code),
        //     'method'    => 'PUT',
        //     'teacher'=> User::where('code', $code)->first(),
        //     'provinces'=>indonesia_province::all(),
        //     'kabupatens'=>indonesia_cities::all(),
        //     'kecamatans'=>indonesia_districts::all(),
        //     'kelurahans'=>indonesia_villages::all(),
        // ];
        return view('backend.mapel.editor');
    }

    public function status($code)
    {
        $mapel = User::where('code', $code)->first();
        $mapel->status = $mapel->status == '0' ? '1' : $mapel->status = '0';
        $mapel->save();
        return redirect()->route('mapel.index')->withSuccess('Status berhasil diubah');
    }
}
