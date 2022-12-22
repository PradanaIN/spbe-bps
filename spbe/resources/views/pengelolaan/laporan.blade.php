@extends('layouts.template')
@section('title', 'Pengelolaan')
@section('pages', 'Laporan Kegiatan')
@section('pengelolaan', 'active')
@section('container')

<div class="app-wrapper">

    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            <form style="margin: 20px 30px;" action="/pengelolaan-kegiatan/laporan/{{$pengelolaan->id}}" method="POST" enctype="multipart/form-data">
                <!-- Pills navs -->
                @csrf
                @if ($loginby->role_id == 3)
                <input type="hidden" id="pengelolaan_kabkota_id" name="pengelolaan_kabkota_id" value="{{$pengelolaan->id}}">
                @else
                <input type="hidden" id="pengelolaan_id" name="pengelolaan_id" value="{{$pengelolaan->id}}">
                @endif
                <input type="hidden" id="realisasi_kegiatan" name="realisasi_kegiatan" value="101">
                <input type="hidden" id="perencanaan_id" name="perencanaan_id" value="{{$pengelolaan->perencanaan_id}}">

                <div class="d-flex flex-row-reverse">
                    @foreach ($link as $link)
                    <a class="btn btn-outline-primary my-auto btn-sm" href="{{ $link->link }}" 
                        style="width: 200px; height: 30px; margin: 20px 0;" role="button">Angket Evaluasi</a>
                    @endforeach
                </div>

                <div class="mb-3">
                    <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                    <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan"
                    aria-describedby="namakegiatan" value="{{ $pengelolaan->perencanaan->nama_kegiatan }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="rincian_perkembangan" class="form-label">Catatan Tambahan</label>
                    {{-- <trix-editor class="bg-white" input="rincian_perkembangan" required></trix-editor> --}}
                    <textarea type="text" class="form-control" id="rincian_perkembangan" name="rincian_perkembangan" style="height:8em;"></textarea>
                </div>
                <div class="mb-3">
                    <label for="file" class="form-label">Unggah Laporan Kegiatan</label>
                    <input class="form-control" type="file" id="file" name="file" required>
                    <script src="{{ url('/assets/js/sweetalert2.all.min.js') }}"></script>
                    <script>
                        @if ($errors->has('file'))
                         Swal.fire({
                            title: 'Error',
                            icon: 'error',
                            text: 'Terdapat isian yang tidak sesuai ketentuan!'
                        });
                        @endif
                    </script>
                    @error('file')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <input type="hidden" name="role_id" id="role_id" value="{{$loginby->role_id}}">
                <input type="hidden" name="status_persetujuan" id="status_persetujuan" value="1">
                <div class="d-flex flex-row-reverse">
                    <input type="submit" name="submit" value="Tambah Laporan" class="btn btn-primary full-buttons"
                        style="width: 200px; margin: 20px 0;">
                </div>
            </form>



        </div>
        <!--//container-fluid-->
    </div>
    <!--//app-content-->

</div>
<!--//app-wrapper-->
@endsection
