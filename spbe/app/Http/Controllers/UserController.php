<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Role;
use App\Models\User;
use App\Models\Kabkota;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cviebrock\EloquentSluggable\Services\SlugService;

class UserController extends Controller
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
        return view('auth.index',  [
            'loginby' => $loginby,
            'user' => User::all(),
        ]);
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
        return view('auth.registrasi',  [
            'loginby' => $loginby,
            'role' => Role::all(),
            'area' => Area::all(),
            'provinsi' => Provinsi::all(),
            'kabkota' => Kabkota::all(),
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
        $slug = SlugService::createSlug(User::class, 'slug_user', $request->nama_user);

        if($request->role_id == 1){
            $request->request->add([
                'provinsi_id' => null,
                'kabkota_id' => null,
                'pic_id' => $request->area_id,
            ]);
        }elseif($request->role_id == 2){
            $request->request->add([
                'area_id' => null,
                'kabkota_id' => null,
                'pic_id' => 9,
            ]);
        }elseif($request->role_id == 3){
            $request->request->add([
                'area_id' => null,
            ]);
        }else{
            $request->request->add([
                'provinsi_id' => null,
                'kabkota_id' => null,
                'area_id' => null,
            ]);
        };

        $validatePassword = $this->validate($request, [
            'password' =>'required|min:8',
        ]);

        $request->request->add([
            'slug_user' => $slug,
            'password' => bcrypt($request->password)
    ]);

        $validatedData = $this->validate($request, [
            'nama_user' => 'required|min:5|max:255|unique:users',
            'slug_user' => 'required|min:5|max:255|unique:users',
            'email' => 'required|unique:users',
            'role_id' => 'required',
            'area_id' => 'nullable',
            'provinsi_id' => 'nullable',
            'kabkota_id' => 'nullable',
            'pic_id' => 'nullable',
            'password' => 'required|min:8|max:255',
        ]);

        User::create($validatedData);

        return redirect('/role')->with('create', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $role)
    {
        $user = Auth::user();
        $loginby = User::where('id', $user->id)->with('provinsi', 'kabkota', 'pic', 'area')->first();

        return view('auth.edit',  [
            'loginby' => $loginby,
            'user' => $role,
            'role' => Role::all(),
            'area' => Area::all(),
            'provinsi' => Provinsi::all(),
            'kabkota' => Kabkota::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $role)
    {
        if($request->role_id == 1){
            $request->request->add([
                'provinsi_id' => null,
                'kabkota_id' => null,
                'pic_id' => $request->area_id,
            ]);
        }elseif($request->role_id == 2){
            $request->request->add([
                'area_id' => null,
                'kabkota_id' => null,
                'pic_id' => 9,
            ]);
        }elseif($request->role_id == 3){
            $request->request->add([
                'area_id' => null,
            ]);
        }else{
            $request->request->add([
                'provinsi_id' => null,
                'kabkota_id' => null,
                'area_id' => null,
            ]);
        };

        $validatePassword = $this->validate($request, [
            'password' =>'required|min:8',
        ]);

        $request->request->add([
            'password' => bcrypt($request->password),
        ]);

        $rules = ([
            'nama_user' => 'required|min:5|max:255',
            'slug_user' => 'required|min:5|max:255',
            'email' => 'required',
            'role_id' => 'required',
            'area_id' => 'nullable',
            'provinsi_id' => 'nullable',
            'kabkota_id' => 'nullable',
            'pic_id' => 'nullable',
            'password' => 'required',
        ]);

        $validatedData = $request->validate($rules);

        User::where('id', $role->id)->update($validatedData);

        return redirect('/role')->with('update', 'Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $role)
    {
        User::destroy($role->id);
        return redirect('/role')->with('hapus', 'Success');
    }

            // menangani permintaan slug
    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(User::class, 'slug_user', $request->nama_user);

        return response()->json(['slug_user' => $slug]);
    }
}
