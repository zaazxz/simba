<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Regency;
use App\Models\Village;
use App\Models\District;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PengaturanController extends Controller
{

    // User All
    public function user()
    {
        return view('backend.pengaturan.user.index', [
            'title'         => 'Data Seluruh User',
            'user_all'      => User::count(),
            'user_active'   => User::where('status', 1)->count(),
            'user_deactive' => User::where('status', 0)->count(),
            'users'         => User::all()
        ]);
    }

    // User Active
    public function aktif()
    {
        return view('backend.pengaturan.user.index', [
            'title'         => 'Data Seluruh User Aktif',
            'user_all'      => User::count(),
            'user_active'   => User::where('status', 1)->count(),
            'user_deactive' => User::where('status', 0)->count(),
            'users'         => User::where('status', 1)->get()
        ]);
    }

    // User Active
    public function non()
    {
        return view('backend.pengaturan.user.index', [
            'title'         => 'Data Seluruh User Pending',
            'user_all'      => User::count(),
            'user_active'   => User::where('status', 1)->count(),
            'user_deactive' => User::where('status', 0)->count(),
            'users'         => User::where('status', 0)->get()
        ]);
    }

    // Create User
    public function create()
    {
        return view('backend.pengaturan.user.create', [
            'title'     => 'Input Data User Baru',
            'method'    => 'POST',
            'route'     => route('pengaturan.user.store'),
        ]);
    }

    public function store(Request $request)
    {
        $data = [
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
            'unit' => 'required',
        ];

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'unit' => $request->unit,
            'password' => bcrypt('gantisaya')
        ]);

        if ($data) {
            return redirect()->route('pengaturan.user')->with('message', 'Input Data User baru berhasil');
        } else {
            return redirect()->route('pengaturan.user')->with('message', 'Input Data User baru gagal');
        }
    }

    public function show($code)
    {
        return view('backend.pengaturan.user.show', [
            'title'         => 'Update Biodata',
            'user'          => User::where('code', $code)->first(),
            'provinces'     => Province::where('id', $code)->first(),
            'kabupatens'    => Regency::all(),
            'kecamatans'    => District::all(),
            'kelurahans'    => Village::all(),
        ]);
    }

    public function edit($code)
    {
        return view('backend.pengaturan.user.edit', [
            'title'     => 'Update Data User',
            'route'     => route('pengaturan.user.update', $code),
            'method'    => 'PUT',
            'user'      => User::where('code', $code)->first(),
            'provinces' => Province::all(),
            'kabupatens' => Regency::all(),
            'kecamatans' => District::all(),
            'kelurahans' => Village::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $pro = User::where('code', $id)->first();
        if ($request->hasFile('picture')) {
            $picture = $request->file('picture');
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

        $pro->save();

        return redirect()->route('pengaturan.user.index')->with('message', 'Biodata User berhasil diperbarui');
    }

    public function destroy($code)
    {
        $user = User::where('code', $code);
        $user->delete();
        return back()->with('message', 'Pengguna berhasil dihapus');
    }

    public function status($code)
    {
        $user = User::where('code', $code)->first();
        $user->status = $user->status == '0' ? '1' : $user->status = '0';
        $user->save();
        return redirect()->route('pengaturan.user.index')->withSuccess('Status berhasil diubah');
    }
}
