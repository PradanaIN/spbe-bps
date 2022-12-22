@extends('layouts.template')
@section('title', 'Usulan')
@section('pages', 'Formulir Edit Usulan Kegiatan')
@section('usulan', 'active')
@section('container')

<div class="app-wrapper">

    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            <form style="margin: 10px 30px;" action="/usulan-kegiatan/{{ $usulans->slug_usulan }}" method="POST">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="nama_usulan" class="form-label">Nama Kegiatan</label>
                    <input type="text" class="form-control @error('nama_usulan') is invalid @enderror" id="nama_usulan" name="nama_usulan" value="{{ old('nama_usulan', $usulans->nama_usulan) }}">
                    <script src="{{ url('/assets/js/sweetalert2.all.min.js') }}"></script>
                    <script>
                        @if ($errors->has('nama_usulan'))
                         Swal.fire({
                            title: 'Error',
                            icon: 'error',
                            text: 'Terdapat isian yang tidak sesuai ketentuan!'
                        });
                        @endif
                    </script>
                    @error('nama_usulan')
                    <div class="ivalid-feedback" style="color:red; font-size:13px; font-weight:bold">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <input type="hidden" class="form-control" id="slug_usulan" name="slug_usulan" value="{{ $usulans->slug_usulan }}">
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi Kegiatan</label>
                    <textarea type="text" class="form-control @error('deskripsi') is invalid @enderror" id="deskripsi"
                        name="deskripsi" style="height:8em;" required>{{ old('deskripsi',$usulans->deskripsi) }}</textarea>
                        <script src="{{ url('/assets/js/sweetalert2.all.min.js') }}"></script>
                        <script>
                            @if ($errors->has('deskripsi'))
                            Swal.fire({
                                title: 'Error',
                                icon: 'error',
                                text: 'Terdapat isian yang tidak sesuai ketentuan!'
                            });
                            @endif
                        </script>
                        @error('deskripsi')
                        <div class="ivalid-feedback" style="color:red; font-size:13px; font-weight:bold">
                            {{ $message }}
                        </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label for="tujuan" class="form-label">Tujuan Kegiatan</label>
                    <textarea type="text" class="form-control @error('tujuan') is invalid @enderror" id="tujuan"
                    name="tujuan" style="height:5em;" required>{{ old('tujuan',$usulans->tujuan) }}</textarea>
                    <script src="{{ url('/assets/js/sweetalert2.all.min.js') }}"></script>
                    <script>
                        @if ($errors->has('tujuan'))
                         Swal.fire({
                            title: 'Error',
                            icon: 'error',
                            text: 'Terdapat isian yang tidak sesuai ketentuan!'
                        });
                        @endif
                    </script>
                    @error('tujuan')
                    <div class="ivalid-feedback" style="color:red; font-size:13px; font-weight:bold">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="peserta" class="form-label">Target Peserta</label>
                    <div class="row">
                        <div class="col">
                            <input id="peserta" name="peserta" type="number"
                                class="form-control @error('peserta') is invalid @enderror" aria-label="Target Peserta"
                                required value="{{ old('peserta',$usulans->peserta) }}">
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
                    <label for="lama" class="form-label">Lama Kegiatan</label>
                    <div class="row">
                        <div class="col">
                            <select class="form-select  @error('lama') is invalid @enderror" id="lama" name="lama"
                            aria-label="Dalam Triwulan" required value="{{ old('lama',$usulans->lama) }}">
                                <option selected disabled></option>
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
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal Pelaksanaan</label>
                        <div class="d-flex justify-content-between">
                            <div class="p-0" style="width:42%;">
                                <input type="date" class="form-control" id="tanggalAwalPelaksanaan"
                                    name="tanggalAwalPelaksanaan" placeholder="First Date" aria-label="First date" required
                                    value="{{ old('tanggalAwalPelaksanaan',$usulans->tanggalAwalPelaksanaan) }}">
                            </div>
                            <span class="my-auto sd text-center">sampai dengan</span>
                            <div class="p-0" style="width:42%;">
                                <input type="date" class="form-control" id="tanggalAkhirPelaksanaan"
                                    name="tanggalAkhirPelaksanaan" placeholder="Last Date" aria-label="Last date" required
                                    value="{{ old('tanggalAkhirPelaksanaan',$usulans->tanggalAkhirPelaksanaan) }}">
                            </div>
                        </div>
                    </div>
                <input type="hidden" name="status_usulan" id="status_usulan" value="{{ $usulans->status_usulan }}">
                <div class="d-flex flex-row-reverse">
                    <input type="submit" name="submit" value="Edit Usulan" class="btn btn-primary" style="width: 200px; margin: 20px 0;">
                </div>
            </form>
        </div>
        <!--//container-fluid-->
    </div>
    <!--//app-content-->
</div>
<!--//app-wrapper-->

<script>
    const nama = document.querySelector('#nama_usulan');
    const slug = document.querySelector('#slug_usulan');

    nama.addEventListener('change', function () {
        fetch('/usulan-kegiatan/checkSlug?nama=' + nama.value).then(response => response.json())
            .then(data => slug.value = data.slug)
            });

</script>


@endsection
