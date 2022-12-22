@extends('layouts.template')
@section('title', 'Pengelolaan')
@section('pages', 'Rincian Realisasi Kegiatan')
@section('pengelolaan', 'active')
@section('container')

<div class="app-wrapper">

    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            @foreach ($progress as $progress)
            <div style="margin: 10px 30px;">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Kegiatan</label>
                    <input type="text" class="form-control" id="nama" name="nama" aria-describedby="namakegiatan" 
                    value="@if ($loginby->role_id == 3){{$progress->pengelolaan_kabkota->perencanaan->nama_kegiatan}}
                    @else{{$progress->pengelolaan->perencanaan->nama_kegiatan}}
                    @endif
                    " disabled>
                </div>
                

                <div class="mb-3">
                    @if ($progress->realisasi_kegiatan <= '100')
                    <label for="rincian_perkembangan" class="form-label">Rincian Progress Kegiatan</label>
                    @else
                    <label for="rincian_perkembangan" class="form-label">Catatan Tambahan</label>
                    @endif
                    <textarea type="text" class="form-control" id="deskripsi" name="deskripsi" style="height:8em;" 
                    value="" disabled>{{$progress->rincian_perkembangan}}</textarea>
                </div>
                @if ($progress->realisasi_kegiatan <= '100')
                <div class="mb-3">
                    <label for="peserta" class="form-label">Peserta Kegiatan</label>
                    <input type="text" class="form-control" id="peserta" name="peserta" 
                    value="{{$progress->peserta}}" disabled>
                </div>
                <label for="presentase" class="form-label">Realisasi Kegiatan</label>
                <div class="row">
                    <div class="col">
                        <input id="presentase" name="presentase" type="text" class="form-control" aria-label="Perkembangan Kegiatan"
                        value="{{$progress->realisasi_kegiatan}}" disabled>
                    </div>
                    <div class="col my-auto">
                        <label for="presentase" class="form-label">%</label>
                    </div>
                </div>
                @endif

                @if ($progress->realisasi_kegiatan > '100')
                <div class="mb-3">
                    <label for="laporan" class="form-label">Laporan Kegiatan</label>
                    <button class="d-flex flex-row border border-5 rounded"
                        style="width:100%; background-color:#e9ecef;" data-toggle="modal" data-target="#myModal">
                        <div class="button p-2 text-secondary border-left-2" style="color:#666f86;">
                            @if ($loginby->role_id == 3)
                            {{$progress->pengelolaan_kabkota->perencanaan->nama_kegiatan}}.pdf
                            @else
                            {{$progress->pengelolaan->perencanaan->nama_kegiatan}}.pdf
                            @endif
                        </div>
                    </button>

                    <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg">

                            <!-- Modal content-->
                            <div class="modal-content rounded">
                                <div class="modal-header">
                                    <h4 class="modal-title" style="padding:5px;">
                                        @if ($loginby->role_id == 3)
                                        Laporan Kegiatan {{$progress->pengelolaan_kabkota->perencanaan->nama_kegiatan}}
                                        @else
                                        Laporan Kegiatan {{$progress->pengelolaan->perencanaan->nama_kegiatan}}
                                        @endif
                                    </h4>
                                </div>

                                <div class="modal-body">
                                    <embed src="{{ url('/storage/'.$progress->file) }}" frameborder="0" width="100%"
                                        height="500px">

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                
                <div class="d-flex flex-row-reverse">

                    {{-- <!-- Button Delete -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusBackdrop"
                        style="width:200px; height: 40px; margin: 20px 0; ">
                        Hapus
                    </button> --}}

                    <!-- Button Edit -->
                    <a href="/progress-kegiatan/{{$progress->id}}/edit">
                        <button type="button" class="btn btn-primary buttons" data-bs-toggle="modal" data-bs-target="#editBackdrop"
                        style="height: 40px; margin: 20px 0; ">
                        Edit</button>
                    </a>
                </div>
            </div>
            @endforeach

        {{-- <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>
        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">

                        <embed src="{{ url('/storage/'.$progress->file) }}"
                               frameborder="0" width="100%" height="500px">

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>
        </div> --}}

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
                                    Apakah Anda yakin menghapus usulan kegiatan ini?
                                </div>
                                <form action="/progress-kegiatan/{{$progress->id}}" method="POST">
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
        <!--//container-fluid-->
    </div>
    <!--//app-content-->

</div>
<!--//app-wrapper-->
@endsection
