@extends('layouts.template')
@section('title', 'Perencanaan')
@section('pages', 'Assign PIC Kabupaten/Kota')
@section('perencanaan', 'active')
@section('container')
<div class="app-wrapper">

    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="accordion" id="accordionExample" style="margin-bottom:30px; margin-top:35px;">
                <div class="accordion-item" style="background-color:#f5f6fe">
                    <h2 class="accordion-header" id="headingOne">
                    {{-- <h2 class="accordion-header" id="flush-headingOne"> --}}
                        <button class="accordion-button collapsed" type="button" data-toggle="collapse"
                        data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            Detail Kegiatan
                        </button>
                    </h2>

                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                    data-bs-parent="#accordionExample" style>
                        <div class="accordion-body">
                            <div class="mb-3">
                                <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                                <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" aria-describedby="nama_kegiatan"
                                    value="{{ $perencanaan["nama_kegiatan"] }}" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="area" class="form-label">Area Perubahan</label>
                                <input type="text" class="form-control" id="area" value="{{ $perencanaan->area->nama_area }}" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="pic" class="form-label">Person In Contact</label>
                                <input type="text" class="form-control" id="pic" value="{{ $perencanaan->pic->nama_pic }}" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="provinsi_id" class="form-label">Provinsi</label>
                                <input type="text" class="form-control" id="provinsi_id" name="provinsi_id" disabled
                                    value="{{$loginby->provinsi->nama_provinsi}}">
                            </div>
                            <div class="mb-3">
                                <label for="desc" class="form-label">Deskripsi Kegiatan</label>
                                <textarea type="text" class="form-control" id="desc" style="height:8em;"
                                disabled>{!! $perencanaan["deskripsi"] !!}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="tujuan" class="form-label">Tujuan Kegiatan</label>
                                <textarea type="text" class="form-control" id="tujuan" style="height:5em;"
                                disabled>{!! $perencanaan["tujuan"] !!}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="peserta" class="form-label">Target Peserta</label>
                                <input type="text" class="form-control" id="peserta"
                                value="{{ $perencanaan["peserta"] }}" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="peserta" class="form-label">Peserta Kegiatan</label>
                                    <input type="number" class="form-control"
                                    id="peserta" name="peserta" value="{{ $perencanaan['peserta']}}" required disabled>
                            </div>
                            <div class="mb-3">
                                <label for="lama" class="form-label">Lama Kegiatan</label>
                                <div class="row">
                                    <div class="col">
                                        <input id="lama" type="text" class="form-control" aria-label="Lama Kegiatan"
                                        value="{{ $perencanaan['lama']}}" disabled>
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
                                            aria-label="First date" disabled value="{{ tgl_indo($perencanaan->tanggalAwalPelaksanaan) }}" >
                                    </div>
                                    <span class="my-auto">sampai dengan</span>
                                    <div class="p-0" style="width:42%;">
                                        <input type="text" id="tanggalAkhirPelaksanaan" class="form-control" placeholder="Last Date"
                                            aria-label="Last date" disabled value="{{ tgl_indo($perencanaan->tanggalAkhirPelaksanaan) }}" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <form style="margin: 10px 30px;" action="/perencanaan-kegiatan/{{ $perencanaan->slug_kegiatan }}/assign" method="POST" >
                @csrf
                <div class="mb-3">
                    <div class="multi_select_box" id="kabkota_id">
                        <label for="kabkota_id" style="padding-top:8px; padding-right:30px;">Rincian PIC Kabupaten/Kota </label>
                        <select id="kabkota_id" name="kabkota_id[]" class="selectpicker multi_select" multiple="multiple"
                            data-live-search="true" data-selected-text-format="count > 3" data-actions-box="true"
                            title="Pilih Admin Kab/Kota" data-size="5" style="width:100px; color:dark; display:none;">
                                @foreach ($kabkot as $k)
                                <option value="{{ $k->id }}">{{ $k->nama_kabkota }}</option>
                                @endforeach
                        </select>
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
                    <input type="submit" name="submit" value="Assign PIC" class="btn btn-primary" style="width: 200px; margin: 20px 0;">
                </div>  
            </form>
        </div>
        <!--//container-fluid-->

    </div>
    <!--//app-content-->

</div>
<!--//app-wrapper-->
@endsection
