<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Usulan;
use App\Models\Progress;
use App\Models\Pengelolaan;
use App\Models\Pengelolaan_Kabkota;
use App\Models\Perencanaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersetujuanLaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $loginby = User::where('id', $user->id)->with('provinsi', 'kabkota', 'pic', 'area', 'role')->first();
        $laporan = Pengelolaan::all();
        $laporan_kabkot = Pengelolaan_Kabkota::all();
        return view('persetujuan.laporan.index',  [
            // "laporan" => Laporan::with('pengelolaan')->latest()->get(),
            "laporan" => $laporan,
            "laporan_kabkot" => $laporan_kabkot,
            'loginby' => $loginby,
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
     * @param  \App\Models\Usulan  $usulan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengelolaan $persetujuan_laporan)
    {
        // dd($persetujuan_laporan);
        $user = Auth::user();
        $loginby = User::where('id', $user->id)->with('provinsi', 'kabkota', 'pic', 'area')->first();
        $pengelolaan = Pengelolaan::find($persetujuan_laporan->id);
        // dd($progress);
        // dd($pengelolaan);
        return view('persetujuan.laporan.create', [
            'laporan' => $persetujuan_laporan,
            'loginby' => $loginby,
            'pengelolaan' => $pengelolaan,
        ]);
    }

    public function showKabkota(Pengelolaan_Kabkota $persetujuan_laporan)
    {
        // dd($persetujuan_laporan);
        $user = Auth::user();
        $loginby = User::where('id', $user->id)->with('provinsi', 'kabkota', 'pic', 'area')->first();
        $pengelolaan = Pengelolaan_Kabkota::find($persetujuan_laporan->id);
        // dd($progress);
        // dd($pengelolaan);
        return view('persetujuan.laporan.create', [
            'laporan' => $persetujuan_laporan,
            'loginby' => $loginby,
            'pengelolaan' => $pengelolaan,
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usulan  $usulan
     * @return \Illuminate\Http\Response
     */
    public function edit(Usulan $usulan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usulan  $usulan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request->all());
        if ($request->pengelolaan_id == null){
            $pengelolaan = Pengelolaan_Kabkota::find($request->pengelolaan_kabkota_id);
        } else {
            $pengelolaan = Pengelolaan::find($request->pengelolaan_id);
        }
        // dd($pengelolaan);
        $pengelolaan->status_persetujuan = $request->status_persetujuan;

        if ($request->status_persetujuan == 2) {
            $pengelolaan->save();
            return redirect('/persetujuan-laporan')->with('setuju', 'Success');
        } else {
            if ($request->pengelolaan_id == null){
                $progress = Progress::create([
                    'realisasi_kegiatan' => $request->realisasi_kegiatan,
                    'pengelolaan_kabkota_id' => $request->pengelolaan_kabkota_id,
                    'deskripsi_tolak' => $request->deskripsi_tolak,
                ]);
            } else {
                $progress = Progress::create([
                    'realisasi_kegiatan' => $request->realisasi_kegiatan,
                    'pengelolaan_id' => $request->pengelolaan_id,
                    'deskripsi_tolak' => $request->deskripsi_tolak,
                ]);
            }
            $pengelolaan->save();
            return redirect('/persetujuan-laporan')->with('tolak', 'Success');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usulan  $usulan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usulan $usulan)
    {
        //
    }
}
