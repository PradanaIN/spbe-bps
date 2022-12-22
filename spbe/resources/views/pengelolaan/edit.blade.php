@extends('layouts.template')
@section('title', 'Pengelolaan')
@section('pages', 'Rincian Realisasi Kegiatan')
@section('pengelolaan', 'active')
@section('container')

<div class="app-wrapper">

    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            @foreach ($progress as $progress)
            <form style="margin: 10px 30px;" action="/progress-kegiatan/{{ $progress->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <input type="hidden" id="pengelolaan_id" name="pengelolaan_id" value="{{$pengelolaan->id}}">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Kegiatan</label>
                    <input type="text" class="form-control" id="nama" name="nama" aria-describedby="namakegiatan" 
                    value="{{$progress->pengelolaan->perencanaan->nama_kegiatan}}" disabled>
                </div>

                <div class="mb-3">
                    @if ($progress->realisasi_kegiatan <= '100')
                    <label for="rincian_perkembangan" class="form-label">Rincian Progress Kegiatan</label>
                    @else
                    <label for="rincian_perkembangan" class="form-label">Catatan Tambahan</label>
                    @endif
                    <textarea type="text" class="form-control" id="rincian_perkembangan" name="rincian_perkembangan" style="height:8em;">{{$progress->rincian_perkembangan}}</textarea>
                </div>
                @if ($progress->realisasi_kegiatan <= '100')
                <div class="mb-3">
                    <label for="peserta" class="form-label">Peserta Kegiatan</label>
                    <input type="text" class="form-control" id="peserta" name="peserta" 
                    value="{{$progress->peserta}}">
                </div>
                <label for="presentase" class="form-label">Realisasi Kegiatan</label>
                <div class="row">
                    <div class="col">
                        <input id="realisasi_kegiatan" name="realisasi_kegiatan" type="text" class="form-control" aria-label="Perkembangan Kegiatan"
                        value="{{$progress->realisasi_kegiatan}}">
                    </div>
                    <div class="col my-auto">
                        <label for="presentase" class="form-label">%</label>
                    </div>
                </div>
                @endif

                @if ($progress->realisasi_kegiatan > '100')
                <div class="mb-3">
                    <label for="file" class="form-label">Unggah Laporan Kegiatan</label>
                    <input class="form-control" type="file" id="file" name="file" required>
                    @error('file')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                @endif

                <div class="d-flex flex-row-reverse">
                    <input type="submit" name="submit" value="Edit Progress" class="btn btn-primary" style="width: 200px; margin: 20px 0;">
                </div>
            </form>
            @endforeach
        </div>
        <!--//container-fluid-->
    </div>
    <!--//app-content-->

</div>
<!--//app-wrapper-->
@endsection
