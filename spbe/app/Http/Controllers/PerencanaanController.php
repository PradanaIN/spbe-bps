<?php

namespace App\Http\Controllers;

use App\Models\Pic;
use App\Models\Area;
use App\Models\User;
use App\Models\Kabkota;
use App\Models\Provinsi;
use App\Models\Pengelolaan;
use App\Models\Pengelolaan_Kabkota;
use App\Models\Perencanaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PerencanaanController extends Controller
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
        if($loginby->role_id == 1){
            return view('perencanaan.index',  [
                "perencanaan" => Perencanaan::where('pic_id', $loginby->pic_id)->latest()->get(),
                "area" => Area::all(),
                "pic" => Pic::all(),
                'loginby' => $loginby,
            ]);
        } elseif ($loginby->role_id == 2){
            return view('perencanaan.index',  [
                "perencanaan" => Pengelolaan::where('provinsi_id', $loginby->provinsi_id)->with('perencanaan')->latest()->get(),
                "area" => Area::all(),
                "pic" => Pic::all(),
                'loginby' => $loginby,
            ]);
        } elseif ($loginby->role_id == 3){
            return view('perencanaan.index',  [
                "perencanaan" => Pengelolaan_Kabkota::where('kabkota_id', $loginby->kabkota_id)->with('perencanaan')->latest()->get(),
                "area" => Area::all(),
                "pic" => Pic::all(),
                'loginby' => $loginby,
            ]);
        } else {
            return view('perencanaan.index',  [
                "perencanaan" => Perencanaan::latest()->get(),
                "area" => Area::all(),
                "pic" => Pic::all(),
                'loginby' => $loginby,
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $loginby = User::where('id', $user->id)->with('provinsi', 'kabkota', 'pic', 'area')->first();
        return view('perencanaan.create', [
            'loginby' => $loginby,
            'area' => Area::all(),
            'pic' => Pic::all(),
            'provinsi' => Provinsi::all(),
        ]);
    }

    public function assign(Perencanaan $perencanaan_kegiatan)
    {
        $user = Auth::user();
        $loginby = User::where('id', $user->id)->with('provinsi', 'kabkota', 'pic', 'area')->first();
        $kabkot = Kabkota::where('provinsi_id', $loginby->provinsi_id)->get();
        return view('perencanaan.assignkabkot', [
            'perencanaan' => $perencanaan_kegiatan,
            'loginby' => $loginby,
            'kabkot' => $kabkot,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slug = SlugService::createSlug(Perencanaan::class, 'slug_kegiatan', $request->nama_kegiatan);
        $request->request->add(['slug_kegiatan' => $slug]);
        $validatedData = $this->validate($request, [
            'nama_kegiatan' => 'required|min:5|max:255|unique:perencanaans',
            'slug_kegiatan' => 'required|min:5|max:255|unique:perencanaans',
            'area_id' => 'required',
            'pic_id' => 'required',
            'deskripsi' => 'required|min:10',
            'tujuan' => 'required|min:10',
            'peserta' => 'required|numeric',
            'lama' => 'required',
            'tanggalAwalPelaksanaan' => 'required',
            'tanggalAkhirPelaksanaan' => 'required',
            'status_kegiatan' => 'required',
            // 'status_persetujuan' => 'required',
        ]);
        $perencanaan = Perencanaan::create($validatedData);
        if ($request->pic_id == 2) {
            $perencanaan->provinsi()->attach($request->provinsi_id);
        } else{
            $pengelolaan = Pengelolaan::create([
                'perencanaan_id' => $perencanaan->id,
                'area_id' => $request->area_id,
            ]);
        }
        return redirect('/perencanaan-kegiatan')->with('create', 'Success');
    }

    public function assignStore(Request $request, Perencanaan $perencanaan_kegiatan)
    {
        $perencanaan_kegiatan->kabkota()->attach($request->kabkota_id);
        return redirect('/perencanaan-kegiatan')->with('create', 'Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perencanaan  $perencanaan
     * @return \Illuminate\Http\Response
     */
    public function show(Perencanaan $perencanaan_kegiatan)
    {
        $user = Auth::user();
        $loginby = User::where('id', $user->id)->with('provinsi', 'kabkota', 'pic', 'area')->first();
        return view('perencanaan.show', [
            'perencanaan' => $perencanaan_kegiatan,
            'loginby' => $loginby,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perencanaan  $perencanaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Perencanaan $perencanaan_kegiatan)
    {
        $user = Auth::user();
        $loginby = User::where('id', $user->id)->with('provinsi', 'kabkota', 'pic', 'area')->first();
        return view('perencanaan.edit', [
            'perencanaan' => $perencanaan_kegiatan,
            'loginby' => $loginby,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perencanaan  $perencanaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perencanaan $perencanaan_kegiatan)
    {
        $slug = SlugService::createSlug(Perencanaan::class, 'slug_kegiatan', $request->nama_kegiatan);
        $request->request->add(['slug_kegiatan' => $slug]);  
        $validatedData = $this->validate($request, [
            'nama_kegiatan' => 'required|min:5|max:255',
            'slug_kegiatan' => 'required|min:5|max:255',
            'deskripsi' => 'required|min:10',
            'tujuan' => 'required|min:10',
            'peserta' => 'required|numeric',
            'lama' => 'required',
            'tanggalAwalPelaksanaan' => 'required',
            'tanggalAkhirPelaksanaan' => 'required',
        ]);

        $perencanaan_kegiatan->update($validatedData);
        return redirect('/perencanaan-kegiatan')->with('update', 'Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perencanaan  $perencanaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perencanaan $perencanaan_kegiatan)
    {
        Perencanaan::destroy($perencanaan_kegiatan->id);
        return redirect('/perencanaan-kegiatan')->with('hapus', 'Success');
    }

    // menangani permintaan slug
    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(Perencanaan::class, 'slug_kegiatan', $request->nama_kegiatan);

        return response()->json(['slug_kegiatan' => $slug]);
    }
}
