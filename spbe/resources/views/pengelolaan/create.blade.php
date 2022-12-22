@extends('layouts.template')
@section('title', 'Pengelolaan')
@section('pages', 'Formulir Progress Kegiatan')
@section('pengelolaan', 'active')
@section('container')

<div class="app-wrapper">

    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div style="margin: 10px 30px;">
                <div class="mb-3">
                    <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                    <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" aria-describedby="nama_kegiatan"
                        value="{{ $pengelolaan->perencanaan->nama_kegiatan }}" disabled>
                </div>

                <div class="accordion" id="accordionExample" style="margin-bottom:30px; margin-top:35px;">
                {{-- <div class="accordion accordion-flush" id="accordionFlushExample" style="margin-bottom:30px; margin-top:35px;"> --}}
                    <div class="accordion-item" style="background-color:#f5f6fe">
                        <h2 class="accordion-header" id="headingOne">
                        {{-- <h2 class="accordion-header" id="flush-headingOne"> --}}
                            <button class="accordion-button collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                Perencanaan Kegiatan
                            </button>
                            {{-- <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseOne" aria-expanded="false"
                                aria-controls="flush-collapseOne">
                                Perencanaan Kegiatan
                            </button> --}}
                        </h2>

                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample" style>
                        {{-- <div id="flush-collapseOne" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample"> --}}
                            <div class="accordion-body">
                                <div class="mb-3">
                                    <label for="area" class="form-label">Area Perubahan</label>
                                    <input type="text" class="form-control" id="area" value="{{ $pengelolaan->perencanaan->area->nama_area }}" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="pic" class="form-label">Person In Contact</label>
                                    <input type="text" class="form-control" id="pic" value="{{ $pengelolaan->perencanaan->pic->nama_pic }}" disabled>
                                </div>

                                <div class="mb-3">
                                    <label for="desc" class="form-label">Deskripsi Kegiatan</label>
                                    <textarea type="text" class="form-control" id="desc" style="height:8em;"
                                    disabled>{{ $pengelolaan->perencanaan->deskripsi }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="tujuan" class="form-label">Tujuan Kegiatan</label>
                                    <textarea type="text" class="form-control" id="tujuan" style="height:5em;"
                                    disabled>{{ $pengelolaan->perencanaan->tujuan }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="peserta" class="form-label">Target Peserta</label>
                                    <input type="text" class="form-control" id="peserta" 
                                    value="{{ $pengelolaan->perencanaan->peserta }}" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="lama" class="form-label">Lama Kegiatan</label>
                                    <div class="row">
                                        <div class="col">
                                            <input id="lama" type="text" class="form-control" aria-label="Lama Kegiatan"
                                            value="{{ $pengelolaan->perencanaan->lama }}" disabled>
                                        </div>
                                        <div class="col my-auto">
                                            <label for="lama" class="form-label"
                                                style="padding-top:8px;">triwulan</label>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                function tgl_indo($tanggal){
                                    $bulan = array (
                                        1 =>   'Januari',
                                        'Februari',
                                        'Maret',
                                        'April',
                                        'Mei',
                                        'Juni',
                                        'Juli',
                                        'Agustus',
                                        'September',
                                        'Oktober',
                                        'November',
                                        'Desember'
                                    );
                                    $pecahkan = explode('-', $tanggal);
                                    return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
                                }
                                ?>
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal Pelaksanaan</label>
                                    <div class="d-flex justify-content-between">
                                        <div class="p-0" style="width:42%;">
                                            <input type="text" id="tanggalAwalPelaksanaan" class="form-control" placeholder="First Date"
                                                aria-label="First date" disabled value="{{ tgl_indo($pengelolaan->perencanaan->tanggalAwalPelaksanaan) }}" >
                                        </div>
                                        <span class="my-auto">sampai dengan</span>
                                        <div class="p-0" style="width:42%;">
                                            <input type="text" id="tanggalAkhirPelaksanaan" class="form-control" placeholder="Last Date"
                                                aria-label="Last date" disabled value="{{ tgl_indo($pengelolaan->perencanaan->tanggalAkhirPelaksanaan) }}" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form style="margin: 10px 30px;" action="/pengelolaan-kegiatan/{{$pengelolaan->id}}" method="POST">
                @csrf
            @if ($loginby->role_id == 3)
                    <input type="hidden" id="pengelolaan_kabkota_id" name="pengelolaan_kabkota_id" value="{{$pengelolaan->id}}">
            @else
                    <input type="hidden" id="pengelolaan_id" name="pengelolaan_id" value="{{$pengelolaan->id}}">
            @endif
                    <input type="hidden" id="area_id" name="area_id" value="{{$pengelolaan->perencanaan->area_id}}">
                <div class="mb-3">
                    <label for="rincian_perkembangan" class="form-label">Rincian Progress Kegiatan</label>
                    {{-- <trix-editor class="bg-white" input="rincian_perkembangan" required></trix-editor> --}}
                    <textarea type="text" class="form-control @error('rincian_perkembangan') is invalid @enderror"
                    id="rincian_perkembangan" name="rincian_perkembangan" style="height:8em;"
                        required>{{ old('rincian_perkembangan') }}</textarea>
                        <script src="{{ url('/assets/js/sweetalert2.all.min.js') }}"></script>
                        <script>
                            @if ($errors->has('rincian_perkembangan'))
                            Swal.fire({
                                title: 'Error',
                                icon: 'error',
                                text: 'Terdapat isian yang tidak sesuai ketentuan!'
                            });
                            @endif
                        </script>
                    @error('rincian_perkembangan')
                    <div class="ivalid-feedback" style="color:red; font-size:13px; font-weight:bold">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="peserta" class="form-label">Peserta Kegiatan</label>
                        <div class="row">
                        <div class="col">
                            <input id="peserta" name="peserta" type="number" min="1"
                                class="form-control @error('peserta') is invalid @enderror" aria-label="Peserta Kegiatan"
                                required value="{{ old('peserta') }}" onkeypress="return isNumberKey(event)">
                        </div>
                        <div class="col my-auto">
                            <label for="peserta" class="form-label"
                                style="padding-top:8px; padding-left:5px;">orang</label>
                        </div>
                    </div>
                    <script src="{{ url('/assets/js/sweetalert2.all.min.js') }}"></script>
                    <script>
                        @if ($errors->has('peserta'))
                         Swal.fire({
                            title: 'Error',
                            icon: 'error',
                            text: 'Terdapat isian yang tidak sesuai ketentuan!'
                        });
                        @endif
                    </script>
                    @error('peserta')
                    <div class="ivalid-feedback" style="color:red; font-size:13px; font-weight:bold">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="realisasi_kegiatan" class="form-label">Realisasi Kegiatan</label>
                    <div class="row">
                        <div class="col">
                            <input id="realisasi_kegiatan" name="realisasi_kegiatan" type="number" min="0" max="100"
                            class="form-control @error('realisasi_kegiatan') is invalid @enderror" onkeypress="return isNumberKey(event)"
                                aria-label="Perkembangan Kegiatan" value="{{ old('realisasi_kegiatan') }}" required>
                                <script src="{{ url('/assets/js/sweetalert2.all.min.js') }}"></script>
                            <script>
                                @if ($errors->has('realisasi_kegiatan'))
                                Swal.fire({
                                    title: 'Error',
                                    icon: 'error',
                                    text: 'Terdapat isian yang tidak sesuai ketentuan!'
                                });
                                @endif
                            </script>
                            @error('realisasi_kegiatan')
                            <div class="ivalid-feedback" style="color:red; font-size:13px; font-weight:bold">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col my-auto">
                            <label class="form-label">%</label>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-row-reverse">
                    <input type="submit" name="submit" value="Tambah Progress" class="btn btn-primary full-buttons"
                        style="margin: 20px 0;">
                </div>
            </form>



        </div>
        <!--//container-fluid-->
    </div>
</div>
    <!--//app-content-->

<!--//app-wrapper-->
@endsection
