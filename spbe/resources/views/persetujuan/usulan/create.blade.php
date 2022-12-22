@extends('layouts.template')
@section('title', 'Persetujuan Usulan')
@section('pages', 'Persetujuan Usulan')
@section('persetujuan-usulan', 'active')
@section('container')

<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="mb-3" style="margin-top:20px;">
                <label for="nama" class="form-label">Nama Kegiatan</label>
                <input type="text" class="form-control" id="nama" name="nama" aria-describedby="namakegiatan"
                    value="{{ $usulans->nama_usulan }}" disabled>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi Kegiatan</label>
                <textarea type="text" class="form-control" id="deskripsi" name="deskripsi" style="height:8em;"
                    disabled>{{ $usulans->deskripsi }}</textarea>
            </div>
            <div class="mb-3">
                <label for="tujuan" class="form-label">Tujuan Kegiatan</label>
                <textarea type="text" class="form-control" id="tujuan" name="tujuan" style="height:5em;"
                    disabled>{{ $usulans->tujuan }}</textarea>
            </div>
            <div class="mb-3">
                <label for="peserta" class="form-label">Peserta</label>
                <div class="row">
                    <div class="col">
                        <input id="peserta" name="peserta" type="number"
                            class="form-control @error('lama') is invalid @enderror" aria-label="Peserta" disabled
                            value="{{ $usulans->peserta }}">
                    </div>
                    <div class="col my-auto">
                        <label for="peserta" class="form-label" style="padding-top:8px; padding-left:5px;">orang</label>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="lama" class="form-label">Lama Kegiatan</label>
                <div class="row">
                    <div class="col">
                        <input id="lama" name="lama" type="text" class="form-control" aria-label="Lama Kegiatan"
                            value="{{ $usulans->lama }}" disabled>
                    </div>
                    <div class="col my-auto">
                        <label for="lama" class="form-label" style="padding-top:8px;">triwulan</label>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal Pelaksanaan</label>
                <div class="d-flex justify-content-between">
                    <div class="p-0" style="width:42%; padding:2px 0;">
                        <input type="date" id="tanggalAwalPelaksanaan" name="tanggalAwalPelaksanaan"
                            class="form-control" placeholder="First Date" aria-label="First date"
                            value="{{ $usulans->tanggalAwalPelaksanaan }}" disabled>
                    </div>
                    <span class="my-auto text-center sd">sampai dengan</span>
                    <div class="p-0" style="width:42%; padding:2px 0;">
                        <input type="date" id="tanggalAkhirPelaksanaan" name="tanggalAkhirPelaksanaan"
                            class="form-control" placeholder="Last Date" aria-label="Last date"
                            value="{{ $usulans->tanggalAkhirPelaksanaan }}" disabled>
                    </div>
                </div>
            </div>
            
            <div class="d-flex justify-content-between">
                <!-- Button Declined -->
                <form action="/persetujuan-usulan" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="id" value="{{ $usulans->id }}">
                    <input type="hidden" name="status_usulan" id="status_usulan" value="2">
                    <div>
                        <input type="button" name="button" class="btn btn-danger buttons" data-bs-toggle="modal"
                            data-bs-target="#declinedBackdrop" style="height: 40px; margin: 20px 0;" value="Declined">
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="declinedBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="declinedBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="declinedBackdropLabel">Konfirmasi Penolakan</h1>
                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button> -->
                                </div>
                                <div class="modal-body">
                                    Apakah Anda yakin menolak usulan kegiatan ini?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="submit" class="btn btn-danger">Declined</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <form action="/persetujuan-usulan" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="id" value="{{ $usulans->id }}">
                    <input type="hidden" name="status_usulan" id="status_usulan" value="1">
                    <div>
                        <input type="button" data-bs-toggle="modal" data-bs-target="#approvedBackdrop" name="button"
                            class="btn btn-success buttons" style="height: 40px; margin: 20px 0;" value="Approved">
                    </div>
                    <!-- Modal -->
                    <div class="modal fade my-auto" id="approvedBackdrop" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="approvedBackdropLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="approvedBackdropLabel">Konfirmasi Persetujuan</h1>
                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button> -->
                                </div>
                                <div class="modal-body">
                                    Apakah Anda yakin menyetujui usulan kegiatan ini?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="submit" class="btn btn-success">Approved</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--//container-fluid-->
    </div>
    <!--//app-content-->
</div>
<!--//app-wrapper-->
@endsection
