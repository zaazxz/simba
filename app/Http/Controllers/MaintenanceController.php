<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Maintenance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaintenanceController extends Controller
{

    // View Index
    public function index()
    {
        return view('backend.pengaturan.maintenance.index', [
            'title' => 'Maintenance Website',
            'datas'  => Maintenance::all()
        ]);
    }

    // Create View
    public function create()
    {
        return view('backend.pengaturan.maintenance.create', [
            'title'     => 'Update Versi Website',
            'waktu'     => Carbon::today()->toDateString()
        ]);
    }

    // Get Value Big Update
    public function bigUpdate() {
        $data = Maintenance::latest()->first();
        return response()->json($data);
    }

    // Store
    public function bigUpdateStore(Request $request)
    {

        $latestData = Maintenance::latest()->first();

        $maintain = new Maintenance();
        $maintain->updateFitur  = $request->updateFitur;

        // Update Besar
        if ($request->updateBesar > $latestData->updateBesar) {
            $maintain->updateBesar  = $request->updateBesar;
        } else {
            return redirect()->route('pengaturan.maintenance.index')->with('message', 'Update Versi gagal');
        }

        $maintain->updateKecil  = 00;
        $maintain->updateOleh   = Auth::user()->name;
        $maintain->updatePada   = Carbon::now();

        $maintain->save();

        if ($maintain) {
            return redirect()->route('pengaturan.maintenance.index')->with('message', 'Update Versi berhasil');
        } else {
            return redirect()->route('pengaturan.maintenance.index')->with('message', 'Update Versi gagal');
        }
    }

    public function smallUpdateStore(Request $request)
    {

        $latestData = Maintenance::latest()->first();

        $maintain = new Maintenance();
        $maintain->updateFitur  = $request->updateFiturKecil;
        $maintain->updateBesar  = $latestData->updateBesar;

        // Update Kecil
        if ($request->updateKecil > $latestData->updateKecil) {
            $maintain->updateKecil  = $request->updateKecil;
        } else {
            return redirect()->route('pengaturan.maintenance.index')->with('message', 'Update Versi gagal');
        }

        $maintain->updateOleh   = Auth::user()->name;
        $maintain->updatePada   = Carbon::now();

        $maintain->save();

        if ($maintain) {
            return redirect()->route('pengaturan.maintenance.index')->with('message', 'Update Versi berhasil');
        } else {
            return redirect()->route('pengaturan.maintenance.index')->with('message', 'Update Versi gagal');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function show(Maintenance $maintenance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function edit(Maintenance $maintenance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Maintenance $maintenance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maintenance $maintenance)
    {
        //
    }
}
