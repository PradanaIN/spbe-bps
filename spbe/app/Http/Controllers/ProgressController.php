<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Progress;
use App\Models\Pengelolaan;
use App\Models\Pengelolaan_Kabkota;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
     * @param  \App\Models\Progress  $progress
     * @return \Illuminate\Http\Response
     */
    public function show(Progress $progress_kegiatan)
    {
        $user = Auth::user();
        $loginby = User::where('id', $user->id)->with('provinsi', 'kabkota', 'pic', 'area')->first();
        if ($loginby->role_id == 3){
            return view('pengelolaan.detail', [
                'progress' => Progress::where('id', $progress_kegiatan->id)->get(),
                'pengelolaan' => Pengelolaan_Kabkota::where('kabkota_id', $user->kabkota_id)->with('perencanaan')->first(),
                'loginby' => $loginby,
                ]);
        }else{
            return view('pengelolaan.detail', [
                'progress' => Progress::where('id', $progress_kegiatan->id)->get(),
                'pengelolaan' => Pengelolaan::where('provinsi_id', $user->provinsi_id)->with('perencanaan')->first(),
                'loginby' => $loginby,
                ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Progress  $progress
     * @return \Illuminate\Http\Response
     */
    public function edit(Progress $progress_kegiatan)
    {
        $user = Auth::user();
        $loginby = User::where('id', $user->id)->with('provinsi', 'kabkota', 'pic', 'area')->first();
         return view('pengelolaan.edit', [
            'progress' => Progress::where('id', $progress_kegiatan->id)->get(),
            'pengelolaan' => Pengelolaan::where('provinsi_id', $user->provinsi_id)->with('perencanaan')->first(),
            'loginby' => $loginby,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Progress  $progress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Progress $progress_kegiatan)
    {
        if ($progress_kegiatan->realisasi_kegiatan <= 100){
            $request->validate([
                'rincian_perkembangan' => 'required',
                'peserta' => 'required|numeric|min:0',
                'realisasi_kegiatan' => 'required|numeric|min:0|max:100',
            ]);
            $progress = Progress::find($progress_kegiatan->id);
            $progress->update([
                'rincian_perkembangan' => $request->rincian_perkembangan,
                'peserta' => $request->peserta,
                'realisasi_kegiatan' => $request->realisasi_kegiatan,
            ]);
        }else{
            $request->validate([
                'rincian_perkembangan' => 'required',
                'file' => 'required|mimes:pdf|max:10000',
            ]);
            $doc_path = $request->file('file')->store('file', 'public');
            $progress = Progress::find($progress_kegiatan->id);
            $progress->update([
                'rincian_perkembangan' => $request->rincian_perkembangan,
                'file' => $doc_path,
            ]);
        };
        return redirect('/pengelolaan-kegiatan/'.$progress_kegiatan->pengelolaan_id)->with('update', 'Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Progress  $progress
     * @return \Illuminate\Http\Response
     */
    public function destroy(Progress $progress_kegiatan)
    {
        Progress::destroy($progress_kegiatan->id);
        return redirect('/pengelolaan-kegiatan/'.$progress_kegiatan->pengelolaan_id)->with('hapus', 'Success');
    }
}
