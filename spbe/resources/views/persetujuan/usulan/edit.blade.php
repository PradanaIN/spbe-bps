@extends('layouts.template')
@section('title', 'Perencanaan')
@section('pages', 'Formulir Perencanaan Kegiatan')
@section('Usulan', 'active')
@section('container')
@include('sweetalert::alert')

<div class="app-wrapper">

    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <form style="margin: 10px 30px;" action="/perencanaan-kegiatan" method="POST">
                @csrf
                <div class="mb-3" style="margin-top:20px;">
                    <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                    <input type="text" class="form-control @error('nama_kegiatan') is invalid @enderror" readonly="true"
                        id="nama_kegiatan" name="nama_kegiatan" value="{{ old('nama_kegiatan', $usulan->nama_usulan) }}">
                    @error('nama_kegiatan')
                    <div class="ivalid-feedback" style="color:red; font-size:13px; font-weight:bold">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <input type="hidden" class="form-control" id="slug_kegiatan" name="slug_kegiatan" value="{{ $usulan->slug_usulan }}">
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi Kegiatan</label>
                    <textarea type="text" class="form-control @error('deskripsi') is invalid @enderror" id="deskripsi" readonly="true"
                        name="deskripsi" style="height:8em;" required>{{ old('deskripsi', $usulan->deskripsi) }}</textarea>
                        @error('deskripsi')
                        <div class="ivalid-feedback" style="color:red; font-size:13px; font-weight:bold">
                            {{ $message }}
                        </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label for="tujuan" class="form-label">Tujuan Kegiatan</label>
                    <textarea type="text" class="form-control @error('tujuan') is invalid @enderror" id="tujuan" readonly="true"
                    name="tujuan" style="height:5em;" required>{{ old('tujuan', $usulan->tujuan) }}</textarea>
                    @error('tujuan')
                    <div class="ivalid-feedback" style="color:red; font-size:13px; font-weight:bold">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="area_id" class="form-label">Area Perubahan</label>
                    <select class="form-select  @error('area_id') is invalid @enderror" id="area_id" name="area_id"
                        aria-label="Pilih Area Perubahan" required value="{{ old('area_id') }}">
                        <option selected disabled>Pilih Area Perubahan</option>
                        @foreach ($area as $area)
                        <option value="{{ $area->id }}">{{ $area->nama_area }}</option>
                        @endforeach
                    </select>
                    @error('area_id')
                    <div class="ivalid-feedback" style="color:red; font-size:13px; font-weight:bold">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="pic_id" class="form-label">Pearson In Charge</label>
                    <select class="form-select  @error('pic_id') is invalid @enderror" id="pic_id" name="pic_id"
                        aria-label="Pilih PIC Kegiatan" required value="{{ old('pic') }}">
                        <option selected disabled>Pilih PIC Kegiatan</option>
                        @foreach ($pic as $pic)
                        <option value="{{ $pic->id }}">{{ $pic->nama_pic }}</option>
                        @endforeach
                    </select>
                    @error('pic_id')
                    <div class="ivalid-feedback" style="color:red; font-size:13px; font-weight:bold">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <div class="multi_select_box" id="provinsi_id">
                        <label for="provinsi_id" style="padding-top:8px; padding-right:30px;">Rincian PIC Provinsi </label>
                        <select id="provinsi_id" name="provinsi_id[]" class="selectpicker multi_select" multiple="multiple"
                            data-live-search="true" data-selected-text-format="count > 3" data-actions-box="true"
                            title="Pilih Admin Provinsi" data-size="5" style="width:100px; color:dark; display:none;">
                                @foreach ($provinsi as $provinsi)
                                <option value="{{ $provinsi->id }}">{{ $provinsi->nama_provinsi }}</option>
                                @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="peserta" class="form-label">Target Peserta</label>
                    <div class="row">
                        <div class="col">
                            <input id="peserta" name="peserta" type="number" readonly="true"
                                class="form-control @error('peserta') is invalid @enderror" aria-label="Target Peserta"
                                required value="{{ old('peserta', $usulan->peserta) }}">
                        </div>
                        <div class="col my-auto">
                            <label for="peserta" class="form-label"
                                style="padding-top:8px; padding-left:5px;">orang</label>
                        </div>
                    </div>
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
                            <input class="form-control  @error('lama') is invalid @enderror" id="lama" name="lama" readonly="true"
                            aria-label="Dalam Triwulan" required value="{{ old('lama', $usulan->lama) }}">
                            </input>
                        </div>
                            <div class="col my-auto">
                                <label for="lama" class="form-label" style="padding-top:8px;">triwulan</label>
                            </div>
                        </div>
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
                            <input type="date" class="form-control" id="tanggalAwalPelaksanaan" readonly="true"
                                name="tanggalAwalPelaksanaan" placeholder="First Date" aria-label="First date" required
                                value="{{ old('tanggalAwalPelaksanaan', $usulan->tanggalAwalPelaksanaan) }}">
                        </div>
                        <span class="my-auto sd text-center">sampai dengan</span>
                        <div class="p-0" style="width:42%;">
                            <input type="date" class="form-control" id="tanggalAkhirPelaksanaan" readonly="true"
                                name="tanggalAkhirPelaksanaan" placeholder="Last Date" aria-label="Last date" required
                                value="{{ old('tanggalAkhirPelaksanaan', $usulan->tanggalAkhirPelaksanaan) }}">
                        </div>
                    </div>
                </div>
                <div>
                    <input type="hidden" id="status_kegiatan" name="status_kegiatan" value="0">
                    {{-- <input type="hidden" id="status_persetujuan" name="status_persetujuan" value="-1"> --}}
                </div>
                <div class="d-flex flex-row-reverse">
                    <input type="submit" name="submit" value="Tambah Kegiatan" class="btn btn-primary full-buttons"
                        style="margin: 20px 0;">
                </div>
            </form>



        </div>
        <!--//container-fluid-->
    </div>
    <!--//app-content-->

</div>
<!--//app-wrapper-->


<script>
const nama = document.querySelector('#nama_kegiatan');
const slug = document.querySelector('#slug_kegiatan');

nama.addEventListener('change', function() {
    fetch('/perencanaan-kegiatan/checkSlug?nama=' + nama.value).then(response => response.json())
        .then(data => slug.value = data.slug)
});
</script>

<script type="text/javascript">
    $(function()
    {
        $('#pic_id').hide();
        $('label[for="pic_id"]').hide();
        $('#provinsi_id').hide();
        $('label[for="provinsi_id"]').hide();
        $('#area_id').change(function(){
            if($('#area_id').val() != null)
            {
                $('#pic_id').show();
                $('label[for="pic_id"]').show();
                $('#pic_id').change(function(){
                    if($('#pic_id').val() == 2)
                    {
                        $('#provinsi_id').show();
                        $('label[for="provinsi_id"]').show();
                    }
                    else
                    {
                        $('#provinsi_id').hide();
                        $('label[for="provinsi_id"]').hide();
                    }
                });
            }
            else
            {
                $('#pic_id').hide();
                $('label[for="pic_id"]').hide();
                $('#provinsi_id').hide();
                $('label[for="provinsi_id"]').hide();
            }
        });
    });
</script>

<script src="{{ url('/assets/js/sweetalert2.all.min.js') }}"></script>
    <script>
        @if (session()->has('setuju'))
    Swal.fire({
        title: 'Success',
        icon: 'success',
        text: 'Usulan kegiatan berhasil disetujui!'
    });
    @endif
    </script>
@endsection
