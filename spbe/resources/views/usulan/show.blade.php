@extends('layouts.template')
@section('title', 'Usulan')
@section('pages', 'Rincian Usulan Kegiatan')
@section('usulan', 'active')
@section('container')

<div class="app-wrapper">

    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">


            <form style="margin: 10px 30px;">
                <div class="mb-3" style="margin-top:20px;">
                    <label for="nama" class="form-label">Nama Kegiatan</label>
                    <input type="text" class="form-control" id="nama" name="nama" aria-describedby="namakegiatan"
                        disabled value="{{ $usulans['nama_usulan'] }}">
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi Kegiatan</label>
                    <textarea type="text" class="form-control" id="deskripsi" name="deskripsi" style="height:8em;"
                        disabled>{{  $usulans["deskripsi"] }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="tujuan" class="form-label">Tujuan Kegiatan</label>
                    <textarea type="text" class="form-control" id="tujuan" name="tujuan" style="height:5em;"
                        disabled>{{ $usulans['tujuan']}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="peserta" class="form-label">Peserta</label>
                    <div class="row">
                        <div class="col">
                            <input id="peserta" name="peserta" type="number"
                                class="form-control @error('lama') is invalid @enderror" aria-label="Target Peserta"
                                disabled value="{{ $usulans['peserta'] }}">
                        </div>
                        <div class="col my-auto">
                            <label for="peserta" class="form-label"
                                style="padding-top:8px; padding-left:5px;">orang</label>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="lama" class="form-label">Lama Kegiatan</label>
                    <div class="row">
                        <div class="col">
                            <input id="lama" nama="lama" type="text" class="form-control" aria-label="Lama Kegiatan"
                                disabled value="{{ $usulans['lama']}}">
                        </div>
                        <div class="col my-auto">
                            <label for="lama" class="form-label" style="padding-top:8px;">triwulan</label>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal Pelaksanaan</label>
                    <div class="d-flex justify-content-between">
                        <div class="p-0" style="width:42%; padding: 2px 0;">
                            <input type="text" id="tanggalAwalPelaksanaan" id="tanggalAwalPelaksanaan" class="form-control"
                                placeholder="First Date" aria-label="First date" disabled
                                value="{{ \Carbon\Carbon::parse($usulans->tanggalAwalPelaksanaan)->format('d F Y')}}">
                        </div>
                        <span class="my-auto text-center sd">sampai dengan</span>
                        <div class="p-0" style="width:42%; padding: 2px 0;">
                            <input type="text" id="tanggalAkhirPelaksanaan" id="tanggalAkhirPelaksanaan" class="form-control"
                                placeholder="Last Date" aria-label="Last date" disabled
                                value="{{ \Carbon\Carbon::parse($usulans->tanggalAwalPelaksanaan)->format('d F Y')}}">
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <!-- Button Delete -->
                    <button type="button" class="btn btn-danger buttons" data-bs-toggle="modal" data-bs-target="#hapusBackdrop"
                        style="height: 40px; margin: 20px 0; ">
                        Hapus
                    </button>

                    <!-- Button Edit -->
                    <a href="/usulan-kegiatan/{{$usulans->slug_usulan}}/edit">
                        <button type="button" class="btn btn-primary buttons" data-bs-toggle="modal" data-bs-target="#editBackdrop"
                        style="height: 40px; margin: 20px 0; ">
                        Edit</button>
                    </a>
                </div>
            </form>

                                <!-- Modal -->
                                <div class="modal fade" id="hapusBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-labelledby="hapusBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="hapusBackdropLabel">Konfirmasi Penghapusan</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda yakin menghapus usulan kegiatan ini?
                                        </div>
                                        <form action="/usulan-kegiatan/{{$usulans->slug_usulan}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" name="submit" class="btn btn-danger">Hapus</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


        </div>
        <!--//container-fluid-->
    </div>
    <!--//app-content-->

</div>
<!--//app-wrapper-->
@endsection
