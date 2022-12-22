<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Usulan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PersetujuanUsulanController extends Controller
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
        return view('persetujuan.usulan.index',  [
            "usulans" => Usulan::latest()->get(),
            'loginby' => $loginby
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
    public function show(Usulan $persetujuan_usulan)
    {
        $user = Auth::user();
        $loginby = User::where('id', $user->id)->with('provinsi', 'kabkota', 'pic', 'area')->first();
        return view('persetujuan.usulan.create', [
            'usulans' => $persetujuan_usulan,
            'loginby' => $loginby,
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
        $usulan = Usulan::find($request->id);
        $usulan->status_usulan = $request->status_usulan;
        $usulan->save();
        if ($request->status_usulan == 1) {
            return redirect('/usulan-perencanaan/'.$usulan->slug_usulan)->with('setuju', 'Success');
        } else {
            return redirect('/persetujuan-usulan')->with('tolak', 'Success');
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
