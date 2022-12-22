@extends('layouts.template')
@section('title', 'Perencanaan')
@section('pages', 'Daftar Perencanaan Kegiatan')
@section('perencanaan', 'active')
@section('container')
@include('sweetalert::alert')

<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            {{-- @if (session()->has('success'))
            <div class="alert alert-success" role="alert" id="usulanAlert">
                {{ session('success') }}
            </div>
            @endif --}}


            @if ($loginby->role_id == 0 || $loginby->role_id == 5)
            <header class="py-3 mb-4 border-bottom">
                <div class="container d-flex flex-row-reverse " style="padding:0;">
                    <div type="button p-2" class="btn btn-primary add">
                        <a href="/perencanaan-kegiatan/create" class="add my-auto" style="text-decoration:none; color:white;">Tambah
                            Kegiatan</a>
                    </div>
                </div>
            </header>
            @else
            <header class="py-3 mb-4 border-bottom">
            </header>
            @endif

            <div class="container shadow-lg p-3 mb-3 bg-white rounded">
                    <table class="table text-nowrap mb-0 table-borderless table-hover w-100" id="listKegiatan">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama Kegiatan</th>
                                <th class="text-center">Area Perubahan</th>
                                {{-- <th class="text-center">Status Kegiatan</th>
                                <th class="text-center">Status Persetujuan</th> --}}
                                <th class="text-center">Tanggal Awal</th>
                                <th class="text-center">Tanggal Akhir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($loginby->role_id == 2 || $loginby->role_id == 3)
                            @foreach ($perencanaan as $p)
                            @if ($p->perencanaan != null)
                            <tr class='clickable-row' data-href="/perencanaan-kegiatan/{{$p->perencanaan->slug_kegiatan}}">
                                <div>
                                    <td class="align-middle">
                                        <div class="text-center">{{ $loop->iteration }}</div>
                                    </td>
                                    <td class="align-middle text-dark text-left">
                                        {{ $p->perencanaan->nama_kegiatan }}
                                    </td>
                                    <td class="align-middle text-secondary text-left">
                                        {{ $p->perencanaan->area->nama_area }}
                                    </td>
                                    {{-- <td class="align-middle text-center">
                                        <span class="badge
                                            {{ (($p->perencanaan->status_kegiatan == 0) ? 'bg-secondary'
                                            : 'bg-primary') }} text-white">
                                                {{ (($p->perencanaan->status_kegiatan == 0) ? 'On Going'
                                                : 'Done') }}
                                        </span>
                                    </td>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="badge
                                            {{ (($p->perencanaan->status_persetujuan == -1) ? 'bg-secondary'
                                            : (($p->perencanaan->status_persetujuan == 0) ? 'bg-warning'
                                            : (($p->perencanaan->status_persetujuan == 1) ? 'bg-success'
                                            : 'bg-danger'))) }} text-white">
                                            {{ (($p->perencanaan->status_persetujuan == -1) ? 'Pending'
                                            : (($p->perencanaan->status_persetujuan == 0) ? 'Waiting'
                                            : (($p->perencanaan->status_persetujuan == 1) ? 'Approved'
                                            : 'Declined'))) }}</span>
                                    </td> --}}
                                    <td class="align-middle text-secondary text-center">
                                        {{ \Carbon\Carbon::parse($p->perencanaan->tanggalAwalPelaksanaan)->format('d F Y')}}
                                    </td>
                                    <td class="align-middle text-secondary text-center">
                                        {{ \Carbon\Carbon::parse($p->perencanaan->tanggalAkhirPelaksanaan)->format('d F Y')}}
                                    </td>
                                </div>
                            </tr>
                            @endif
                            @endforeach
                            @else
                            @foreach ($perencanaan as $p)
                            @if ($p != null)
                            <tr class='clickable-row' data-href="/perencanaan-kegiatan/{{$p->slug_kegiatan}}">
                                <div>
                                    <td class="align-middle">
                                        <div class="text-center">{{ $loop->iteration }}</div>
                                    </td>
                                    <td class="align-middle text-dark text-left">
                                        {{ $p->nama_kegiatan }}
                                    </td>
                                    <td class="align-middle text-secondary text-left">
                                        {{ $p->area->nama_area }}
                                    </td>
                                    {{-- <td class="align-middle text-center">
                                        <span class="badge
                                            {{ (($p->status_kegiatan == 0) ? 'bg-secondary'
                                            : 'bg-primary') }} text-white">
                                                {{ (($p->status_kegiatan == 0) ? 'On Going'
                                                : 'Done') }}
                                        </span>
                                    </td>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="badge
                                            {{ (($p->status_persetujuan == -1) ? 'bg-secondary'
                                            : (($p->status_persetujuan == 0) ? 'bg-warning'
                                            : (($p->status_persetujuan == 1) ? 'bg-success'
                                            : 'bg-danger'))) }} text-white">
                                            {{ (($p->status_persetujuan == -1) ? 'Pending'
                                            : (($p->status_persetujuan == 0) ? 'Waiting'
                                            : (($p->status_persetujuan == 1) ? 'Approved'
                                            : 'Declined'))) }}</span>
                                    </td> --}}
                                    <td class="align-middle text-secondary text-left">
                                        {{ \Carbon\Carbon::parse($p->tanggalAwalPelaksanaan)->format('d F Y')}}
                                    </td>
                                    <td class="align-middle text-secondary text-left">
                                        {{ \Carbon\Carbon::parse($p->tanggalAkhirPelaksanaan)->format('d F Y')}}
                                    </td>
                                </div>
                            </tr>
                            @endif
                            @endforeach
                            @endif
                        </tbody>
                    </table>
            </div>


            <!--//app-content-->
        </div>
        <!--//container-fluid-->


    </div>
</div>
<!--//app-wrapper-->

<script src="{{ url('/assets/js/sweetalert2.all.min.js') }}"></script>
    <script>
        @if (session()->has('create'))
    Swal.fire({
        title: 'Success',
        icon: 'success',
        text: 'Kegiatan berhasil ditambahkan!'
    });
    @endif
    </script>

    <script>
    @if(session()->has('update'))
    Swal.fire({
        title: 'Success',
        icon: 'success',
        text: 'Kegiatan berhasil diupdate!'
    });
    @endif
    </script>

    <script>
    @if(session()->has('hapus'))
    Swal.fire({
        title: 'Success',
        icon: 'success',
        text: 'Kegiatan berhasil dihapus!'
    });
    @endif
    </script>

@endsection
