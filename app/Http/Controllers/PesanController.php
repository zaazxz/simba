<?php

namespace App\Http\Controllers;

use App\Models\Hadir;
use App\Models\Konfirmasi;
use App\Models\TidakHadir;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Outbox;

class PesanController extends Controller
{

    // Inbox
    public function inbox() {

        $hadir = Hadir::where('uid', '!=', 'NULL')->select('uid')->get()->toArray();
        $tdkhadir = TidakHadir::where('tgl', '=', Carbon::today())->where('uid', '!=', 'NULL')->select('uid')->get()->toArray();

        return view('backend.pesan.inbox', [
            'title'         => 'Pesan Inbox',
            'confirm'       => Konfirmasi::wherenotin('uid', $hadir)->wherenotin('uid', $tdkhadir)->get(),
        ]);
    }

    // Outbox
    public function outbox() {
        return view('backend.pesan.outbox', [
            'title'         => 'Pesan Outbox',
            'outboxes'      => Outbox::all(),
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
