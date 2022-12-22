<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Usulan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Cviebrock\EloquentSluggable\Services\SlugService;

class UsulanController extends Controller
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
        if ($user->role == '2') {
            return view('usulan.index',  [
                "usulans" => Usulan::latest()->get(),
                'loginby' => $loginby,
            ]);
        } else {
            return view('usulan.index',  [
                "usulans" => Usulan::where('user_id', $user->id)->latest()->get(),
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
        return view('usulan.create', [
            'loginby' => $loginby,
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
        $user = Auth::user();
        $slug = SlugService::createSlug(Usulan::class, 'slug_usulan', $request->nama_usulan);
        $request->request->add([
            'slug_usulan' => $slug,
            'user_id' => $user->id
        ]);

        $this->validate($request, [
            'nama_usulan' => 'required|min:5|max:255',
            'slug_usulan' => 'required|min:5|max:255|unique:usulans',
            'deskripsi' => 'required|min:5',
            'tujuan' => 'required|min:5',
            'peserta' => 'required',
            'lama' => 'required',
            'tanggalAwalPelaksanaan' => 'required',
            'tanggalAkhirPelaksanaan' => 'required',
            'status_usulan' => 'required',
            'satuankerja' => 'required',
            'user_id' => 'required'
        ]);

    Usulan::create([
            'nama_usulan' => $request->nama_usulan,
            'slug_usulan' => $request->slug_usulan,
            'deskripsi' => $request->deskripsi,
            'tujuan' => $request->tujuan,
            'peserta' => $request->peserta,
            'lama' => $request->lama,
            'tanggalAwalPelaksanaan' => $request->tanggalAwalPelaksanaan,
            'tanggalAkhirPelaksanaan' => $request->tanggalAkhirPelaksanaan,
            'status_usulan' => $request->status_usulan,
            'satuankerja' => $request->satuankerja,
            'user_id' => $request->user_id
        ]);

        // $usulan->provinsi()->attach($request->provinsi_id);
        // $usulan->kabkot()->attach($request->kabkot_id);

        return redirect('/usulan-kegiatan')->with('create', 'Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usulan  $usulan
     * @return \Illuminate\Http\Response
     */
    public function show(Usulan $usulan_kegiatan)
    {
        $user = Auth::user();
        $loginby = User::where('id', $user->id)->with('provinsi', 'kabkota', 'pic', 'area')->first();
        return view('usulan.show', [
            'usulans' => $usulan_kegiatan,
            'loginby' => $loginby,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usulan  $usulan
     * @return \Illuminate\Http\Response
     */
    public function edit(Usulan $usulan_kegiatan)
    {
        $user = Auth::user();
        $loginby = User::where('id', $user->id)->with('provinsi', 'kabkota', 'pic', 'area')->first();
        return view('usulan.edit', [
            'usulans' => $usulan_kegiatan,
            'loginby' => $loginby,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usulan  $usulan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usulan $usulan_kegiatan)
    {
        $user = Auth::user();
        $slug = SlugService::createSlug(Usulan::class, 'slug_usulan', $request->nama_usulan);
        $request->request->add([
            'slug_usulan' => $slug,
            'user_id' => $user->id
        ]);

        $rules = ([
            'nama_usulan' => 'required|min:5|max:255',
            'slug_usulan' => 'required|min:5|max:255|unique:usulans',
            'deskripsi' => 'required|min:5|max:255',
            'tujuan' => 'required|min:5|max:255',
            'peserta' => 'required',
            'lama' => 'required',
            'tanggalAwalPelaksanaan' => 'required',
            'tanggalAkhirPelaksanaan' => 'required',
            'status_usulan' => 'required',
            'user_id' => 'required'
        ]);

        // validasi slug
        if($request->slug_usulan != $usulan_kegiatan->slug_usulan) {
            $rules['slug_usulan'] = 'required|min:5|max:255|unique:usulans';
            }

        $validatedData = $request->validate($rules);

        Usulan::where('id', $usulan_kegiatan->id)->update($validatedData);

        return redirect('/usulan-kegiatan')->with('update', 'Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usulan  $usulan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usulan $usulan_kegiatan)
    {
        Usulan::destroy($usulan_kegiatan->id);
        return redirect('/usulan-kegiatan')->with('hapus', 'Success');
    }

    // menangani permintaan slug
    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(Usulan::class, 'slug_usulan', $request->nama_usulan);

        return response()->json(['slug_usulan' => $slug]);
    }
}

