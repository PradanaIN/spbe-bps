@extends('layouts.template')
@section('title', 'Persetujuan Usulan')
@section('pages', 'Daftar Usulan Kegiatan')
@section('persetujuan-usulan', 'active')
@section('container')
@include('sweetalert::alert')

<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            <header class="py-3 mb-4 border-bottom">

            </header>

            <div class="container shadow-lg p-3 mb-5 bg-white rounded">
                    <table class="table text-nowrap mb-0 table-borderless table-hover w-100" id="listKegiatan">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Tanggal Pengajuan</th>
                                <th class="text-center">Nama Kegiatan</th>
                                <th class="text-center">Satuan Kerja</th>
                                <th class="text-center">Status Usulan</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($usulans as $u)
                                    <tr class='clickable-row' data-href="/persetujuan-usulan/{{$u->slug_usulan}}">
                                        <td class="align-middle text-dark">
                                            <div class="text-center">{{ $loop->iteration }}</div>
                                        </td>
                                        <td class="align-middle text-dark">
                                            <div class="text-center">{{ \Carbon\Carbon::parse($u->created_at)->format('d F Y')}}</div>
                                        </td>
                                        <td class="align-middle text-dark">
                                            <div class="text-center">{{ $u->nama_usulan }}</div>
                                        </td>
                                        <td class="align-middle text-dark">
                                            <div class="text-center">{{ $u->satuankerja }}</div>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="badge {{ (($u->status_usulan == 0) ? 'bg-warning'
                                                : (($u->status_usulan == 1) ? 'bg-success'
                                                : 'bg-danger')) }} text-white">{{ (($u->status_usulan == 0) ? 'Waiting'
                                                    : (($u->status_usulan == 1) ? 'Approved'
                                                    : 'Declined')) }}</span>
                                        </td>
                                    </tr>
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
        text: 'Usulan kegiatan berhasil disetujui!'
    });
    @endif
    </script>

    <script>
    @if(session()->has('tolak'))
    Swal.fire({
        title: 'Success',
        icon: 'success',
        text: 'Usulan kegiatan berhasil ditolak!'
    });
    @endif
    </script>

@endsection
