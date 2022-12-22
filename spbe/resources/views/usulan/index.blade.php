@extends('layouts.template')
@section('title', 'Usulan')
@section('pages', 'Daftar Usulan Kegiatan')
@section('usulan', 'active')
@section('container')
@include('sweetalert::alert')

<div class="app-wrapper">

    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif

            <header class="py-3 mb-4 border-bottom">
                <div class="container d-flex flex-row-reverse " style="padding:0;">
                    <div type="button p-2" class="btn btn-primary add">
                        <a href="/usulan-kegiatan/create" class="add my-auto" style="text-decoration:none; color:white;">Tambah Usulan</a>
                    </div>
                </div>
            </header>

            <div class="container shadow-lg p-3 mb-3 bg-white rounded">
                    <table class="table text-nowrap mb-0 table-borderless table-hover w-100" id="listKegiatan">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Tanggal Pengajuan</th>
                                <th class="text-center">Nama Kegiatan</th>
                                <th class="text-center">Status Usulan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($usulans as $u)
                            <tr class='clickable-row' data-href="/usulan-kegiatan/{{$u->slug_usulan}}">
                                <td class="align-middle text-dark">
                                    <div class="text-center">{{ $loop->iteration }}</div>
                                </td>
                                <td class="align-middle text-dark text-center">
                                    <div>{{ \Carbon\Carbon::parse($u->created_at)->format('d F Y') }}</div>
                                </td>
                                <td class="align-middle text-dark text-center">
                                    <div class="text-center">{{ $u->nama_usulan }}</div>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="badge {{ (($u->status_usulan == 0) ? 'bg-warning'
                                                : (($u->status_usulan == 1) ? 'bg-success'
                                                : 'bg-danger')) }} text-white">{{ (($u->status_usulan == 0) ? 'Waiting'
                                                    : (($u->status_usulan == 1) ? 'Approved'
                                                    : 'Declined')) }}</span>
                                </td>
                            </tr>
                            <?php $no++; ?>
                            @endforeach
                        </tbody>
                    </table>
            </div>
            <!--//container-fluid-->
        </div>
        <!--//app-content-->

    </div>
    <!--//app-wrapper-->

    <script src="{{ url('/assets/js/sweetalert2.all.min.js') }}"></script>
    <script>
        @if (session()->has('create'))
    Swal.fire({
        title: 'Success',
        icon: 'success',
        text: 'Usulan kegiatan berhasil ditambahkan, Silakan tunggu persetujuan!'
    });
    @endif
    </script>

    <script>
    @if(session()->has('update'))
    Swal.fire({
        title: 'Success',
        icon: 'success',
        text: 'Usulan kegiatan berhasil diupdate!'
    });
    @endif
    </script>

    <script>
    @if(session()->has('hapus'))
    Swal.fire({
        title: 'Success',
        icon: 'success',
        text: 'Usulan kegiatan berhasil dihapus!'
    });
    @endif
    </script>

@endsection

