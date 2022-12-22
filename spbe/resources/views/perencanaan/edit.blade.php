@extends('layouts.template')
@section('title', 'Perencanaan')
@section('pages', 'Formulir Edit Rencana Kegiatan')
@section('perencanaan', 'active')
@section('container')
<div class="app-wrapper">

    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            <form style="margin: 10px 30px;" action="/perencanaan-kegiatan/{{ $perencanaan->slug_kegiatan }}" method="POST" >
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                    <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan"
                        aria-describedby="namakegiatan" value="{{ $perencanaan["nama_kegiatan"] }}">
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
                        >{!! $perencanaan["deskripsi"] !!}</textarea>
                </div>
                <div class="mb-3">
                    <label for="tujuan" class="form-label">Tujuan Kegiatan</label>
                    <textarea type="text" class="form-control" id="tujuan" name="tujuan" style="height:5em;"
                        >{!! $perencanaan['tujuan'] !!}</textarea>
                </div>
                <div class="mb-3">
                    <label for="peserta" class="form-label">Peserta</label>
                    <div class="row">
                        <div class="col">
                            <input id="peserta" name="peserta" type="number"
                                class="form-control @error('peserta') is invalid @enderror" aria-label="Peserta Kegiatan"
                                value="{{ $perencanaan['peserta']}}">
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
                            <select class="form-select  @error('lama') is invalid @enderror" id="lama" name="lama"
                            aria-label="Dalam Triwulan" required>
                                <option selected disabled>Dalam Triwulan</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                            <div class="col my-auto">
                                <label for="lama" class="form-label" style="padding-top:8px;">triwulan</label>
                            </div>
                        </div>
                    <script src="{{ url('/assets/js/sweetalert2.all.min.js') }}"></script>
                    <script>
                        @if ($errors->has('lama'))
                         Swal.fire({
                            title: 'Error',
                            icon: 'error',
                            text: 'Terdapat isian yang tidak sesuai ketentuan!'
                        });
                        @endif
                    </script>
                    @error('lama')
                    <div class="ivalid-feedback" style="color:red; font-size:13px; font-weight:bold">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal Pelaksanaan</label>
                    <div class="d-flex justify-content-between">
                        <div class="p-0" style="width:42%;">
                            <input type="date" class="form-control" id="tanggalAwalPelaksanaan"
                                name="tanggalAwalPelaksanaan" placeholder="First Date" aria-label="First date" required
                                value="{{ old('tanggalAwalPelaksanaan') }}">
                        </div>
                        <span class="my-auto sd text-center">sampai dengan</span>
                        <div class="p-0" style="width:42%;">
                            <input type="date" class="form-control" id="tanggalAkhirPelaksanaan"
                                name="tanggalAkhirPelaksanaan" placeholder="Last Date" aria-label="Last date" required
                                value="{{ old('tanggalAkhirPelaksanaan') }}">
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

                <div class="d-flex flex-row-reverse">
                    <input type="submit" name="submit" value="Edit" class="btn btn-primary" style="width: 200px; margin: 20px 0;">
                </div>  
            </form>
        </div>
        <!--//container-fluid-->

    </div>
    <!--//app-content-->

</div>
<!--//app-wrapper-->
@endsection
