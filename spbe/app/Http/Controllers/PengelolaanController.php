<?php

namespace App\Http\Controllers;

use App\Models\Pic;
use App\Models\Area;
use App\Models\User;
use App\Models\Angket;
use App\Models\Kabkota;
use App\Models\Progress;
use App\Models\Provinsi;
use App\Models\Pengelolaan;
use App\Models\Pengelolaan_Kabkota;
use App\Models\Perencanaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengelolaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $loginby = User::where('id', $user->id)->with('provinsi', 'kabkota', 'pic', 'area')->first();
        $progress = Progress::latest()->get();
        if($loginby->role_id == 2){
            $pengelolaan = Pengelolaan::where('provinsi_id', $loginby->provinsi_id )->with('perencanaan')->get();
        }elseif($loginby->role_id == 3){
            $pengelolaan = Pengelolaan_Kabkota::where('kabkota_id', $loginby->kabkota_id)->with('perencanaan')->get();
        }else{
            $pengelolaan = Pengelolaan::where('area_id', $loginby->area_id )->with('perencanaan')->get();
        }
        // if($progress->pengelolaan_id == $pengelolaan->id){
        //     $progress = Progress::where('pengelolaan_id', $pengelolaan->id)->latest()->get();
        // };
        // dd($progress);
        return view('pengelolaan.index', [
                'pengelolaan' => $pengelolaan,
                // 'persentase' => Progress::where('pengelolaan_id', $pengelolaan->id)->latest()->get(),
                'loginby' => $loginby,
                'progress' => $progress
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $link = Angket::all();
        $user = Auth::user();
        $loginby = User::where('id', $user->id)->with('provinsi', 'kabkota', 'pic', 'area')->first();
        if($loginby->role_id == 3){
            if($request->realisasi_kegiatan == 100){
                return view('pengelolaan.laporan', [
                    'pengelolaan' => Pengelolaan_Kabkota::where('id', $request->pengelolaan_kabkota_id)->with('perencanaan')->first(),
                    'loginby' => $loginby,
                    'area' => Area::all(),
                    'pic' => Pic::all(),
                    'provinsi' => Provinsi::all(),
                    'link' => $link,
                ]);
            }elseif ($request->realisasi_kegiatan >= 101){
                return view('pengelolaan.revisi', [
                    'pengelolaan' => Pengelolaan_Kabkota::where('id', $request->pengelolaan_kabkota_id)->with('perencanaan')->first(),
                    'progress' => Progress::where('pengelolaan_kabkota_id', $request->pengelolaan_kabkota_id)->latest()->first(),
                    'loginby' => $loginby,
                    'area' => Area::all(),
                    'pic' => Pic::all(),
                    'provinsi' => Provinsi::all(),
                    'link' => $link,
                ]);
            }else{
                return view('pengelolaan.create', [
                    'pengelolaan' => Pengelolaan_Kabkota::where('id', $request->pengelolaan_kabkota_id)->with('perencanaan')->first(),
                    'loginby' => $loginby,
                    'area' => Area::all(),
                    'pic' => Pic::all(),
                    'provinsi' => Provinsi::all(),
                ]);
            }
        }else{
            if($request->realisasi_kegiatan == 100){
                return view('pengelolaan.laporan', [
                    'pengelolaan' => Pengelolaan::where('id', $request->pengelolaan_id)->with('perencanaan')->first(),
                    'loginby' => $loginby,
                    'area' => Area::all(),
                    'pic' => Pic::all(),
                    'provinsi' => Provinsi::all(),
                    'link' => $link,
                ]);
            }elseif ($request->realisasi_kegiatan >= 101){
                return view('pengelolaan.revisi', [
                    'pengelolaan' => Pengelolaan::where('id', $request->pengelolaan_id)->with('perencanaan')->first(),
                    'progress' => Progress::where('pengelolaan_id', $request->pengelolaan_id)->latest()->first(),
                    'loginby' => $loginby,
                    'area' => Area::all(),
                    'pic' => Pic::all(),
                    'provinsi' => Provinsi::all(),
                    'link' => $link,
                ]);
            }else{
                return view('pengelolaan.create', [
                    'pengelolaan' => Pengelolaan::where('id', $request->pengelolaan_id)->with('perencanaan')->first(),
                    'loginby' => $loginby,
                    'area' => Area::all(),
                    'pic' => Pic::all(),
                    'provinsi' => Provinsi::all(),
                ]);
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $loginby = User::where('id', $user->id)->with('provinsi', 'kabkota', 'pic', 'area')->first();
        if ($loginby->role_id == 3){
            $validatedData = $this->validate($request, [
                'rincian_perkembangan' => 'required|min:5',
                'peserta' => 'required',
                'realisasi_kegiatan' => 'required',
                'pengelolaan_kabkota_id' => 'required',
                'area_id' => 'required'
            ]);
            $progress = Progress::create($validatedData);
            return redirect('/pengelolaan-kegiatan/kabkota/'.$request->pengelolaan_kabkota_id)->with('tambahProgress', 'Success');
        }
        $validatedData = $this->validate($request, [
            'rincian_perkembangan' => 'required|min:5',
            'peserta' => 'required',
            'realisasi_kegiatan' => 'required',
            'pengelolaan_id' => 'required',
            'area_id' => 'required'
        ]);
        $progress = Progress::create($validatedData);
        return redirect('/pengelolaan-kegiatan/'.$request->pengelolaan_id)->with('tambahProgress', 'Success');
    }

    public function storeLaporan(Request $request)
    {
        // dd($request->all());
        $user = Auth::user();
        $loginby = User::where('id', $user->id)->with('provinsi', 'kabkota', 'pic', 'area')->first();
        $validatedData = $this->validate($request, [
            'rincian_perkembangan' => 'required|min:5',
            'file' => 'required|mimes:pdf|max:10000',
            'realisasi_kegiatan' => 'required',
        ]);
        $doc_path = $request->file('file')->store('file', 'public');
        if ($loginby->role_id == 3){
            $lastprogress = Progress::where('realisasi_kegiatan', $request->realisasi_kegiatan - 1)->where('pengelolaan_kabkota_id', $request->pengelolaan_kabkota_id)->latest()->first();
            $progress = Progress::create([
                'rincian_perkembangan' => $request->rincian_perkembangan,
                'file' => $doc_path,
                'realisasi_kegiatan' => $request->realisasi_kegiatan,
                'pengelolaan_kabkota_id' => $request->pengelolaan_kabkota_id,
                'peserta' => $lastprogress->peserta,
                'area_id' => $lastprogress->area_id,
            ]);
        }else{
            $lastprogress = Progress::where('realisasi_kegiatan', $request->realisasi_kegiatan - 1)->where('pengelolaan_id', $request->pengelolaan_id)->latest()->first();
            $progress = Progress::create([
                'rincian_perkembangan' => $request->rincian_perkembangan,
                'file' => $doc_path,
                'realisasi_kegiatan' => $request->realisasi_kegiatan,
                'pengelolaan_id' => $request->pengelolaan_id,
                'peserta' => $lastprogress->peserta,
                'area_id' => $lastprogress->area_id,
            ]);
        }
        
        if ($loginby->role_id == 3){
            $pengelolaan = Pengelolaan_Kabkota::find($request->pengelolaan_kabkota_id);
            $pengelolaan->persentase_akhir = $request->realisasi_kegiatan;
            $pengelolaan->role_id = $request->role_id;
            $pengelolaan->status_persetujuan = $request->status_persetujuan;
            $pengelolaan->save();
            $perencanaan = Perencanaan::find($pengelolaan->perencanaan_id);
            $perencanaan->status_kegiatan = 1;
            $perencanaan->save();
        return redirect('/pengelolaan-kegiatan/kabkota/'.$request->pengelolaan_kabkota_id)->with('tambahLaporan', 'Success');
        } else {
            $pengelolaan = Pengelolaan::find($request->pengelolaan_id);
            $pengelolaan->persentase_akhir = $request->realisasi_kegiatan;
            $pengelolaan->role_id = $request->role_id;
            $pengelolaan->status_persetujuan = $request->status_persetujuan;
            $pengelolaan->save();
            $perencanaan = Perencanaan::find($pengelolaan->perencanaan_id);
            $perencanaan->status_kegiatan = 1;
            $perencanaan->save();
        return redirect('/pengelolaan-kegiatan/'.$request->pengelolaan_id)->with('tambahLaporan', 'Success');
        }
    }

    public function storeRevisi(Request $request)
    {
        dd($request->all());
        $user = Auth::user();
        $loginby = User::where('id', $user->id)->with('provinsi', 'kabkota', 'pic', 'area')->first();
        $validatedData = $this->validate($request, [
            'rincian_perkembangan' => 'required|min:5',
            'file' => 'required|mimes:pdf|max:10000',
            'realisasi_kegiatan' => 'required',
        ]);
        $doc_path = $request->file('file')->store('file', 'public');
        if ($loginby->role_id == 3){
            $lastprogress = Progress::where('realisasi_kegiatan', $request->realisasi_kegiatan - 1)->where('pengelolaan_kabkota_id', $request->pengelolaan_kabkota_id)->latest()->first();
            $progress = Progress::create([
                'rincian_perkembangan' => $request->rincian_perkembangan,
                'file' => $doc_path,
                'realisasi_kegiatan' => $request->realisasi_kegiatan + 1,
                'pengelolaan_kabkota_id' => $request->pengelolaan_kabkota_id,
                'peserta' => $lastprogress->peserta,
                'area_id' => $lastprogress->area_id,
            ]);
        } else {
            $lastprogress = Progress::where('realisasi_kegiatan', $request->realisasi_kegiatan - 1)->where('pengelolaan_id', $request->pengelolaan_id)->latest()->first();
            $progress = Progress::create([
                'rincian_perkembangan' => $request->rincian_perkembangan,
                'file' => $doc_path,
                'realisasi_kegiatan' => $request->realisasi_kegiatan + 1,
                'pengelolaan_id' => $request->pengelolaan_id,
                'peserta' => $lastprogress->peserta,
                'area_id' => $lastprogress->area_id,
            ]);
        }
        
        if ($loginby->role_id == 3){
            $pengelolaan = Pengelolaan_Kabkota::find($request->pengelolaan_kabkota_id);
            $pengelolaan->persentase_akhir = $request->realisasi_kegiatan + 1;
            $pengelolaan->status_persetujuan = $request->status_persetujuan;
            $pengelolaan->save();
        return redirect('/pengelolaan-kegiatan/kabkota/'.$request->pengelolaan_kabkota_id)->with('tambahLaporan', 'Success');
        } else {
            $pengelolaan = Pengelolaan::find($request->pengelolaan_id);
            $pengelolaan->persentase_akhir = $request->realisasi_kegiatan + 1;
            $pengelolaan->status_persetujuan = $request->status_persetujuan;
            $pengelolaan->save();
        return redirect('/pengelolaan-kegiatan/'.$request->pengelolaan_id)->with('tambahLaporan', 'Success');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengelolaan  $pengelolaan
     * @return \Illuminate\Http\Response
     */

    public function show(Pengelolaan $pengelolaan_kegiatan)
    {
        $user = Auth::user();
        $loginby = User::where('id', $user->id)->with('provinsi', 'kabkota', 'pic', 'area')->first();
        $pengelolaan = Pengelolaan::where('id', $pengelolaan_kegiatan->id)->with('perencanaan')->first();
        $persentase = Progress::where('pengelolaan_id', $pengelolaan_kegiatan->id)->latest()->first();
        $progress = Progress::where('pengelolaan_id', $pengelolaan_kegiatan->id)->orderBy('created_at')->get();
        return view('pengelolaan.show', [
            'id_pengelolaan' => $pengelolaan,
            'persentase' => $persentase,
            'progress' => $progress,
            'loginby' => $loginby,
            ]);
    }

    public function showKabkota(Pengelolaan_Kabkota $pengelolaan_kegiatan)
    {
        $user = Auth::user();
        $loginby = User::where('id', $user->id)->with('provinsi', 'kabkota', 'pic', 'area')->first();
        $pengelolaan = Pengelolaan_Kabkota::where('id', $pengelolaan_kegiatan->id)->with('perencanaan')->first();
        $persentase = Progress::where('pengelolaan_kabkota_id', $pengelolaan_kegiatan->id)->latest()->first();
        $progress = Progress::where('pengelolaan_kabkota_id', $pengelolaan_kegiatan->id)->orderBy('created_at')->get();
        return view('pengelolaan.show', [
            'id_pengelolaan' => $pengelolaan,
            'persentase' => $persentase,
            'progress' => $progress,
            'loginby' => $loginby,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengelolaan  $pengelolaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengelolaan $pengelolaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengelolaan  $pengelolaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengelolaan $pengelolaan)
    {
        //return redirect('/pengelolaan-kegiatan/'.$request->pengelolaan_id)->with('update', 'Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengelolaan  $pengelolaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengelolaan $pengelolaan)
    {
        //return redirect('/pengelolaan-kegiatan/'.$request->pengelolaan_id)->with('hapus', 'Success');
    }
}
