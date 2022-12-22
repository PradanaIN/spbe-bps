@extends('layouts.template')
@section('title', 'User Management')
@section('pages', 'Daftar Role')
@section('User Management', 'active')
@section('container')
@include('sweetalert::alert')

<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            <header class="py-3 mb-4 border-bottom">
                <div class="container d-flex flex-row-reverse " style="padding:0;">
                    <div type="button p-2" class="btn btn-primary add">
                        <a href="/role/create" class="add my-auto" style="text-decoration:none; color:white;">Tambah
                            User</a>
                    </div>
                </div>
            </header>

            <div class="container shadow-lg p-3 mb-3 bg-white rounded">
                <div class="table-responsive">
                    <table class="table text-nowrap mb-0 table-borderless table-hover w-100" id="listKegiatan">
                        <thead class="table-light">
                            <tr class="text-center">
                                <th class="text-center">No</th>
                                <th class="text-center">User</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $user)
                            <tr class='column'>
                                <div>
                                    <td class="align-middle">
                                        <div class="text-center">{{ $loop->iteration }}</div>
                                    </td>
                                    <td class="align-middle text-dark text-center">
                                        {{ $user->nama_user}}
                                    </td>
                                    <td class="align-middle text-secondary text-center">
                                        {{ $user->email}}
                                    </td>
                                    <td class="align-middle">
                                        <li class="list-inline-item">
                                            <a href="/role/{{$user->slug_user}}/edit">
                                                <button class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit" data-bs-target="#editBackdrop"><i class="fa fa-edit"></i></button>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <button type="button" class="btn btn-danger btn-sm rounded-0" data-bs-toggle="modal" data-bs-target="#hapusBackdrop">
                                            <i class="fa fa-trash"></i>
                                            </button>
                                        </li>
                                    </td>
                                </div>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="hapusBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="hapusBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="hapusBackdropLabel">Konfirmasi Penghapusan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda yakin menghapus User ini?
                    </div>
                    <form action="/role/{{$user->slug_user}}" method="POST">
                        @csrf
                        @method('delete')
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="submit" class="btn btn-danger">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

            <!--//app-content-->

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
        text: 'User berhasil ditambahkan!'
    });
    @endif
    </script>

    <script>
    @if(session()->has('update'))
    Swal.fire({
        title: 'Success',
        icon: 'success',
        text: 'User berhasil diupdate!'
    });
    @endif
    </script>

    <script>
    @if(session()->has('hapus'))
    Swal.fire({
        title: 'Success',
        icon: 'success',
        text: 'User berhasil dihapus!'
    });
    @endif
    </script>

@endsection
