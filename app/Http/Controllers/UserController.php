<?php
namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\User;
use App\Models\Village;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=[
            'title'     => 'Daftar Staff Pendidik',
            'teachers'  => User::where('role', '!=', 'Admin')->where('role', '!=', 'Tata usaha')->get(),
            'teachers_all' => User::where('role', '!=', 'Admin')->where('role', '!=', 'Tata Usaha')->count(),
            'teachers_ak'  => User::where('role', '!=', 'Admin')->where('role', '!=', 'Tata Usaha')->where('status', '=', '1')->count(),
            'teachers_pe'  => User::where('role', '!=', 'Admin')->where('role', '!=', 'Tata Usaha')->where('status', '=', '0')->count(),
        ];
        return view('backend.users.guru', $data);
    }

    public function aktif()
    {
        $data=[
            'title'=>'Daftar Staff Pendidik Status Aktif',
            'teachers'  => User::where('role', '!=', 'Admin')->where('role', '!=', 'Tata usaha')->where('status', '=', '1')->get(),
            'teachers_all' => User::where('role', '!=', 'Admin')->where('role', '!=', 'Tata Usaha')->count(),
            'teachers_ak'  => User::where('role', '!=', 'Admin')->where('role', '!=', 'Tata Usaha')->where('status', '=', '1')->count(),
            'teachers_pe'  => User::where('role', '!=', 'Admin')->where('role', '!=', 'Tata Usaha')->where('status', '=', '0')->count(),
        ];
        return view('backend.users.guru', $data);
    }

    public function nonaktif()
    {
        $data=[
            'title'=>'Daftar Staff Pendidik Status Pending',
            'teachers'  => User::where('role', '!=', 'Admin')->where('role', '!=', 'Tata usaha')->where('status', '=', '0')->get(),
            'teachers_all' => User::where('role', '!=', 'Admin')->where('role', '!=', 'Tata Usaha')->count(),
            'teachers_ak'  => User::where('role', '!=', 'Admin')->where('role', '!=', 'Tata Usaha')->where('status', '=', '1')->count(),
            'teachers_pe'  => User::where('role', '!=', 'Admin')->where('role', '!=', 'Tata Usaha')->where('status', '=', '0')->count(),
        ];
        return view('backend.users.guru', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=[
            'title'=>'Input GTK Baru',
            'method'=>'POST',
            'route' => route('guru.store'),
            //14 Juli 2005
        ];
        return view('backend.users.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gtk = new User();
        $gtk->name = $request->name;
        $gtk->email = $request->email;
        $gtk->role = $request->role;
        $gtk->unit = $request->unit;

        if ($request->role == 'Guru') {
            $gtk->password = bcrypt('Guru123');
        } elseif ($request->role == 'Tata Usaha') {
            $gtk->password = bcrypt('Tatausaha123');
        } else {
            $gtk->password = bcrypt('Hrd123');
        }


        $gtk->save();
        if ($request->role == 'Guru') {
            return redirect()->route('guru.index')->with('message', 'Input Data GTK baru berhasil dibuat');
        } elseif ($request->role == 'Tata Usaha') {
            return redirect()->route('tatausaha.index')->with('message', 'Input Data GTK baru berhasil dibuat');
        } else {
            return redirect()->route('pengaturan.user.index')->with('message', 'Input Data GTK baru berhasil dibuat');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($code)
    {
        $data=[
            'title'     => 'Update Biodata',
            'teacher'   => User::where('code', $code)->first(),
            'provinces' => Province::where('id', $code)->first(),
            'kabupatens'=> Regency::all(),
            'kecamatans'=> District::all(),
            'kelurahans'=> Village::all(),
        ];
        return view('backend.users.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($code)
    {
        $edguru=[
            'title'     => 'Update Biodata',
            'route'     => route('guru.update', $code),
            'method'    => 'PUT',
            'teacher'   => User::where('code', $code)->first(),
            'provinces' => Province::all(),
            'kabupatens'=> Regency::all(),
            'kecamatans'=> District::all(),
            'kelurahans'=> Village::all(),
        ];
        return view('backend.users.editor', $edguru);
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
        $pro = User::where('code', $id)->first();
        // dd($id);
        if ($request->hasFile('picture')) {
            $picture = $request->file('picture');
            // if (file_exists(public_path('images/users/'.$pro->photo))) {
            //     unlink(public_path('images/users/'.$pro->photo));
            // }
            $name = $pro->name . '-' . $pro->id . '.' . $picture->getClientOriginalExtension();
            $picture->move('images/users/', $name);
            $pro->photo = $name;
        }
        $pro->name = $request->name;
        $pro->role = $request->role;
        $pro->uid = $request->uid;
        $pro->unit = $request->unit;
        $pro->unit2 = $request->unit2;
        $pro->nirg = $request->nirg;
        $pro->nuptk = $request->nuptk;
        $pro->jk = $request->jk;
        $pro->pob = $request->pob;
        $pro->dob = $request->dob;
        $pro->alamat = $request->alamat;
        $pro->provinsi = $request->provinsi;
        $pro->kabkota = $request->kabkota;
        $pro->kecamatan = $request->kecamatan;
        $pro->kelurahan = $request->kelurahan;
        $pro->notelp = $request->notelp;

        if ($request->email) {
            $pro->email = $request->email;
        }

        if ($request->password) {
            $pro->password = bcrypt($request->password);
        }
        // dd($request);
        $pro->save();
        return redirect()->route('guru.index')->with('message', 'Biodata guru berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($code)
    {
        $teacher = User::where('code', $code);
        $teacher->delete();
        return back()->with('message', 'Pengguna berhasil dihapus');
    }

    public function status($code)
    {
        $teacher = User::where('code', $code)->first();
        $teacher->status = $teacher->status == '0' ? '1' : $teacher->status = '0';
        $teacher->save();
        return redirect()->route('guru.index')->withSuccess('Status berhasil diubah');
    }

    public function tatausaha()
    {
        $dtu=[
            'title'     => 'Daftar Staff Tata Usaha',
            'stafftus'  => User::where('role', '=', 'Tata Usaha')->get(),
            'stafftu_all' => User::where('role', '=', 'Tata Usaha')->count(),
            'stafftu_ak'  => User::where('role', '=', 'Tata Usaha')->where('status', '=', '1')->count(),
            'stafftu_pe'  => User::where('role', '=', 'Tata Usaha')->where('status', '=', '0')->count(),
        ];
        return view('backend.tatausaha.tatausaha', $dtu);
    }

    public function tu_aktif()
    {
        $data=[
            'title'=>'Daftar Guru Aktif',
            'stafftus'  => User::where('role', '=', 'Tata Usaha')->where('status', '=', '1')->get(),
            'stafftu_all'=> User::where('role', '=', 'Tata Usaha')->count(),
            'stafftu_ak'=> User::where('role', '=', 'Tata Usaha')->where('status', '=', '1')->count(),
            'stafftu_pe'=> User::where('role', '=', 'Tata Usaha')->where('status', '=', '0')->count(),
        ];
        return view('backend.tatausaha.tatausaha', $data);
    }

    public function tu_nonaktif()
    {
        $data=[
            'title'=>'Daftar Tata Usaha Non Aktif',
            'stafftus'  => User::where('role', '=', 'Tata Usaha')->where('status', '=', '0')->get(),
            'stafftu_all'=> User::where('role', '=', 'Tata Usaha')->count(),
            'stafftu_ak'=> User::where('role', '=', 'Tata Usaha')->where('status', '=', '1')->count(),
            'stafftu_pe'=> User::where('role', '=', 'Tata Usaha')->where('status', '=', '0')->count(),
        ];
        return view('backend.tatausaha.tatausaha', $data);
    }

    public function stu_edit($code)
    {
        $edtu=[
            'title'     => 'Update Biodata',
            'route'     => route('tatausaha.update', $code),
            'method'    => 'PUT',
            'stafftu'   => User::where('code', $code)->first(),
            'provinces' => Province::all(),
            'kabupatens'=> Regency::all(),
            'kecamatans'=> District::all(),
            'kelurahans'=> Village::all(),
        ];
        return view('backend.tatausaha.editor', $edtu);
    }

    public function stu_update(Request $request, $id)
    {
        $tu = User::where('code', $id)->first();
        if ($request->hasFile('picture')) {
            $picture = $request->file('picture');
            $name = $tu->name . '-' . $tu->id . '.' . $picture->getClientOriginalExtension();
            $picture->move('images/users/', $name);
            $tu->photo = $name;
        }
        $tu->name = $request->name;
        $tu->uid = $request->uid;
        $tu->unit = $request->unit;
        $tu->unit2 = $request->unit2;
        $tu->nirg = $request->nirg;
        $tu->nuptk = $request->nuptk;
        $tu->jk = $request->jk;
        $tu->pob = $request->pob;
        $tu->dob = $request->dob;
        $tu->alamat = $request->alamat;
        $tu->provinsi = $request->provinsi;
        $tu->kabkota = $request->kabkota;
        $tu->kecamatan = $request->kecamatan;
        $tu->kelurahan = $request->kelurahan;
        $tu->notelp = $request->notelp;

        if ($request->email) {
            $tu->email = $request->email;
        }

        if ($request->password) {
            $tu->password = bcrypt($request->password);
        }
        $tu->save();
        return redirect()->route('tatausaha.index')->with('message', 'Biodata tatausaha berhasil diperbarui');
    }

    public function stu_destroy($code)
    {
        $tu = User::where('code', $code);
        $tu->delete();
        return back()->with('message', 'GTK berhasil dihapus');
    }

    public function stu_status($code)
    {
        $tu = User::where('code', $code)->first();
        $tu->status = $tu->status == '0' ? '1' : $tu->status = '0';
        $tu->save();
        return redirect()->route('tatausaha.index')->withSuccess('Status berhasil diubah');
    }

    public function kabkota(Request $request)
    {
        $id_provinsi = $request->id_provinsi;
        $kabupatens = Regency::where('province_id', $id_provinsi)->get();
        $option = '<option>Pilih Kabupaten...</option>';
        foreach ($kabupatens as $kabupaten) {
            $option.= "<option value='$kabupaten->id'>$kabupaten->name</option>";
        }
        echo $option;
    }

    public function kecamatan(Request $request)
    {
        $id_kabupaten = $request->id_kabupaten;
        $kecamatans = District::where('regency_id', $id_kabupaten)->get();
        $option = '<option>Pilih Kecamatan...</option>';
        foreach ($kecamatans as $kecamatan) {
            $option.= "<option value='$kecamatan->id'>$kecamatan->name</option>";
        }
        echo $option;
    }

    public function kelurahan(Request $request)
    {
        $id_kecamatan = $request->id_kecamatan;
        $kelurahans = Village::where('district_id', $id_kecamatan)->get();
        $option = '<option>Pilih Kelurahan...</option>';
        foreach ($kelurahans as $kelurahan) {
            $option.= "<option value='$kelurahan->id'>$kelurahan->name</option>";
        }
        echo $option;
    }
}
