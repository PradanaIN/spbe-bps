<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\User;
use App\Models\Usulan;
use App\Models\Beranda;
use App\Models\Progress;
use App\Models\Pengelolaan;
use App\Models\Pengelolaan_Kabkota;
use App\Models\Perencanaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $JumlahUsulan = Usulan::count();
        $jumlahPerencanaan = Perencanaan::count();
        $jumlahBerjalan = Perencanaan::where("status_kegiatan", "=", "0")->count();
        $jumlahSelesai = Perencanaan::where("status_kegiatan", "=", "1")->count();

        $usulanApproved = Usulan::where("status_usulan", "=", "1")->count();
        $usulanDeclined= Usulan::where("status_usulan", "=", "2")->count();
        $perencanaanApproved_kabkot = Pengelolaan_Kabkota::where("status_persetujuan", "=", "2")->count();
        $perencanaanApproved = Pengelolaan::where("status_persetujuan", "=", "2")->count();
        $perencanaanApproved_total = $perencanaanApproved + $perencanaanApproved_kabkot;
        $perencanaanDeclined_kabkot= Pengelolaan_Kabkota::where("status_persetujuan", "=", "3")->count();
        $perencanaanDeclined= Pengelolaan::where("status_persetujuan", "=", "3")->count();
        $perencanaanDeclined_total = $perencanaanDeclined + $perencanaanDeclined_kabkot;

        $rata1 = Progress::where('area_id', "=", "1")->avg('realisasi_kegiatan');
        if ( $rata1 != null) {
            $rata1 = $rata1;
        } else {
            $rata1 = 0;
        }

        $rata2 = Progress::where('area_id', "=", "2")->avg('realisasi_kegiatan');
        if ( $rata2 != null) {
            $rata2 = $rata2;
        } else {
            $rata2 = 0;
        }

        $rata3 = Progress::where('area_id', "=", "3")->avg('realisasi_kegiatan');
        if ( $rata3 != null) {
            $rata3 = $rata3;
        } else {
            $rata3 = 0;
        }

        $rata4 = Progress::where('area_id', "=", "4")->avg('realisasi_kegiatan');
        if ( $rata4 != null) {
            $rata4 = $rata4;
        } else {
            $rata4 = 0;
        }

        $rata5 = Progress::where('area_id', "=", "5")->avg('realisasi_kegiatan');
        if ( $rata5 != null) {
            $rata5 = $rata5;
        } else {
            $rata5 = 0;
        }

        $rata6 = Progress::where('area_id', "=", "6")->avg('realisasi_kegiatan');
        if ( $rata6 != null) {
            $rata6 = $rata6;
        } else {
            $rata6 = 0;
        }

        $rata7 = Progress::where('area_id', "=", "7")->avg('realisasi_kegiatan');
        if ( $rata7 != null) {
            $rata7 = $rata7;
        } else {
            $rata7 = 0;
        }

        $rata8 = Progress::where('area_id', "=", "8")->avg('realisasi_kegiatan');
        if ( $rata8 != null) {
            $rata8 = $rata8;
        } else {
            $rata8 = 0;
        }

        $user = Auth::user();
        $loginby = User::where('id', $user->id)->with('provinsi', 'kabkota', 'pic', 'area')->first();
        return view('beranda.index', [
            'title' => 'Beranda',
            'active' => 'beranda',
            'area' => Area::all(),
            'loginby' => $loginby,
            'jumlah_usulan' => $JumlahUsulan,
            'jumlah_perencanaan' => $jumlahPerencanaan,
            'jumlah_berjalan' => $jumlahBerjalan,
            'jumlah_selesai' => $jumlahSelesai,
            'usulan_approved' => $usulanApproved,
            'usulan_declined' => $usulanDeclined,
            'perencanaan_approved' => $perencanaanApproved_total,
            'perencanaan_declined' => $perencanaanDeclined_total,
            'rata1' => $rata1,
            'rata2' => $rata2,
            'rata3' => $rata3,
            'rata4' => $rata4,
            'rata5' => $rata5,
            'rata6' => $rata6,
            'rata7' => $rata7,
            'rata8' => $rata8,
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
     * @param  \App\Models\Beranda  $beranda
     * @return \Illuminate\Http\Response
     */
    public function show(Beranda $beranda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Beranda  $beranda
     * @return \Illuminate\Http\Response
     */
    public function edit(Beranda $beranda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Beranda  $beranda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Beranda $beranda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Beranda  $beranda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Beranda $beranda)
    {
        //
    }
}
