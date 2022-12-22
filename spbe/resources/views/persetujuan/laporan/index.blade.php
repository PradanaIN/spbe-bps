@extends('layouts.template')
@section('title', 'Persetujuan Laporan')
@section('pages', 'Daftar Laporan Kegiatan')
@section('persetujuan-laporan', 'active')
@section('container')
@include('sweetalert::alert')

<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <header class="py-3 mb-4 border-bottom">
                <div class="container d-flex flex-wrap justify-content-between" style="padding:0;">

                </div>
            </header>

            <div class="container shadow-lg p-3 mb-5 bg-white rounded">
                    <table class="table text-nowrap mb-0 table-borderless table-hover w-100" id="listKegiatan">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama Kegiatan</th>
                                <th class="text-center">Area Perubahan</th>
                                <th class="text-center">PIC</th>
                                <th class="text-center">Satuan Kerja</th>
                                <th class="text-center">Status Persetujuan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($laporan as $l)
                            @if ($l->persentase_akhir != null)
                                @if ($l->persentase_akhir % 2 == 1)
                                <tr class='clickable-row' data-href="/persetujuan-laporan/{{$l->id}}">
                                    <div>
                                        <td class="align-middle">
                                            <div class="text-center">{{ $no }}</div>
                                        </td>
                                        <td class="align-middle text-dark">
                                            {{$l->perencanaan->nama_kegiatan}}
                                        </td>
                                        <td class="align-middle text-secondary text-center">
                                            {{$l->perencanaan->area->nama_area}}
                                        </td>
                                        <td class="align-middle text-secondary text-center">
                                            {{$l->role->nama_role}}
                                        </td>
                                        <td class="align-middle text-secondary text-center">
                                            @if ($l->area_id == null)
                                            {{$l->provinsi->nama_provinsi}}
                                            @else
                                            {{$l->area->nama_area}}
                                            @endif
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="badge {{ (($l->status_persetujuan == 1) ? 'bg-warning'
                                                : (($l->status_persetujuan == 2) ? 'bg-success'
                                                : 'bg-danger')) }} text-white">{{ (($l->status_persetujuan == 1) ? 'Waiting'
                                                    : (($l->status_persetujuan == 2) ? 'Approved'
                                                    : 'Declined')) }}</span>
                                        </td>
                                    </div>
                                </tr>
                                @php
                                    $no++;
                                @endphp
                                @endif
                            @endif
                            @endforeach

                            @foreach ($laporan_kabkot as $laporan_kabkot)
                            @if ($laporan_kabkot->persentase_akhir != null)
                                @if ($laporan_kabkot->persentase_akhir % 2 == 1)
                                <tr class='clickable-row' data-href="/persetujuan-laporan/kabkot/{{$laporan_kabkot->id}}">
                                    <div>
                                        <td class="align-middle">
                                            <div class="text-center">{{ $no }}</div>
                                        </td>
                                        <td class="align-middle text-dark">
                                            {{$laporan_kabkot->perencanaan->nama_kegiatan}}
                                        </td>
                                        <td class="align-middle text-secondary text-center">
                                            {{$laporan_kabkot->perencanaan->area->nama_area}}
                                        </td>
                                        <td class="align-middle text-secondary text-center">
                                            {{$laporan_kabkot->role->nama_role}}
                                        </td>
                                        <td class="align-middle text-secondary text-center">
                                            {{$laporan_kabkot->kabkota->nama_kabkota}}
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="badge {{ (($laporan_kabkot->status_persetujuan == 1) ? 'bg-warning'
                                                : (($laporan_kabkot->status_persetujuan == 2) ? 'bg-success'
                                                : 'bg-danger')) }} text-white">{{ (($laporan_kabkot->status_persetujuan == 1) ? 'Waiting'
                                                    : (($laporan_kabkot->status_persetujuan == 2) ? 'Approved'
                                                    : 'Declined')) }}</span>
                                        </td>
                                    </div>
                                </tr>
                                @php
                                    $no++;
                                @endphp
                                @endif
                            @endif
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
        <!--//container-fluid-->
    </div>
    <!--//app-content-->
</div>
<!--//app-wrapper-->

<script src="{{ url('/assets/js/sweetalert2.all.min.js') }}"></script>
    <script>
        @if (session()->has('setuju'))
    Swal.fire({
        title: 'Success',
        icon: 'success',
        text: 'Laporan kegiatan berhasil disetujui!'
    });
    @endif
    </script>

    <script>
    @if(session()->has('tolak'))
    Swal.fire({
        title: 'Success',
        icon: 'success',
        text: 'Laporan kegiatan berhasil ditolak!'
    });
    @endif
    </script>

@endsection
