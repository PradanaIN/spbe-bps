@extends('layouts.template')
@section('title', 'Perencanaan')
@section('pages', 'Rincian Perencanaan Kegiatan')
@section('perencanaan', 'active')
@section('container')
<div class="app-wrapper">

    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            <form style="margin: 10px 30px;">
                <div class="mb-3">
                    <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                    <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan"
                        aria-describedby="namakegiatan" disabled value="{{ $perencanaan["nama_kegiatan"] }}">
                </div>

                <div class="mb-3">
                    <label for="area_id" class="form-label">Area Perubahan</label>
                    <input type="text" class="form-control" id="area_id" name="area_id" disabled
                        value="{{ $perencanaan->area->nama_area }}">
                </div>
                <div class="mb-3">
                    <label for="pic_id" class="form-label">Person In Charge</label>
                    <input type="text" class="form-control" id="pic_id" name="pic_id" disabled
                        value="{{ $perencanaan->pic->nama_pic }}">
                </div>
                @if($perencanaan->pic_id == 9)
                <div class="mb-3">
                    <label for="provinsi_id" class="form-label">Provinsi</label>
                    <select name="provinsi_id" id="provinsi_id" class="form-control" multiple=""
                    style="height:100px;" disabled>
                        @foreach ($perencanaan->provinsi as $provinsi)
                        <option>{{ $provinsi->nama_provinsi }}</option>
                        @endforeach
                    </select>
                </div>
                @endif
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi Kegiatan</label>
                    <textarea type="text" class="form-control" id="deskripsi" name="deskripsi" style="height:8em;"
                        disabled>{!! $perencanaan["deskripsi"] !!}</textarea>
                </div>
                <div class="mb-3">
                    <label for="tujuan" class="form-label">Tujuan Kegiatan</label>
                    <textarea type="text" class="form-control" id="tujuan" name="tujuan" style="height:5em;"
                        disabled>{!! $perencanaan['tujuan'] !!}</textarea>
                </div>
                <div class="mb-3">
                    <label for="peserta" class="form-label">Peserta</label>
                    <div class="row">
                        <div class="col">
                            <input id="peserta" name="peserta" type="number"
                                class="form-control @error('lama') is invalid @enderror" aria-label="Lama Kegiatan"
                                disabled value="{{ $perencanaan['peserta']}}">
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
                                disabled value="{{ $perencanaan['lama']}}">
                        </div>
                        <div class="col my-auto">
                            <label for="lama" class="form-label" style="padding-top:8px;">triwulan</label>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal Pelaksanaan</label>
                    <div class="d-flex justify-content-between">
                        <div class="p-0" style="width:42%;padding:2px 0;">
                            <input type="text" id="tanggalAwalPelaksanaan" id="tanggalAwalPelaksanaan"
                                class="form-control" placeholder="First Date" aria-label="First date" disabled
                                value="{{ \Carbon\Carbon::parse($perencanaan->tanggalAwalPelaksanaan)->format('d F Y')}}">
                        </div>
                        <span class="my-auto sd text-center">sampai dengan</span>
                        <div class="p-0" style="width:42%;padding:2px 0;">
                            <input type="text" id="tanggalAkhirPelaksanaan" id="tanggalAkhirPelaksanaan"
                                class="form-control" placeholder="Last Date" aria-label="Last date" disabled
                                value="{{ \Carbon\Carbon::parse($perencanaan->tanggalAkhirPelaksanaan)->format('d F Y')}}">
                        </div>
                    </div>
                </div>

                @if ($perencanaan->deskripsi_tolak != null)
                <div class="mb-3">
                    <label for="tujuan" class="form-label">Keterangan Penolakan Laporan Kegiatan</label>
                    <textarea type="text" class="form-control" id="deskripsi_tolak" name="deskripsi_tolak" style="height:5em;"
                        disabled>{{ $perencanaan['deskripsi_tolak'] }}</textarea>
                </div>
                @endif

                @if ($loginby->role_id == 0 || $loginby->role_id == 5)
                <div class="d-flex justify-content-between">
                    <!-- Button Delete -->
                    <button type="button" class="btn btn-danger buttons" data-bs-toggle="modal" data-bs-target="#hapusBackdrop"
                        style="height: 40px; margin: 20px 0; ">
                        Hapus
                    </button>
                    <!-- Button Edit -->
                    <a href="/perencanaan-kegiatan/{{$perencanaan->slug_kegiatan}}/edit" class="btn btn-primary buttons"
                        style="height: 40px; margin: 20px 10px 20px 0;">
                        Edit
                    </a>
                </div>
                @endif

                @if ($loginby->role_id == 2 && $perencanaan->deskripsi_tolak == null)
                <div class="d-flex flex-row-reverse">
                    <!-- Button Edit -->
                    <a href="/perencanaan-kegiatan/{{$perencanaan->slug_kegiatan}}/assign" class="btn btn-primary buttons"
                        style="height: 40px; margin: 20px 10px 20px 0;">
                        Assign PIC Kab/Kota
                    </a>
                </div>
                @endif
            </form>
        </div>
        <!--//container-fluid-->

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
                        Apakah Anda yakin menghapus kegiatan ini?
                    </div>
                    <form action="/perencanaan-kegiatan/{{$perencanaan->slug_kegiatan}}" method="POST">
                        @csrf
                        @method('delete')
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="submit" class="btn btn-danger">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!--//app-content-->

</div>
<!--//app-wrapper-->
@endsection
