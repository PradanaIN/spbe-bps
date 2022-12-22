@extends('layouts.template')
@section('title', 'Pengelolaan')
@section('pages', 'Daftar Realisasi Kegiatan')
@section('pengelolaan', 'active')
@section('container')
@include('sweetalert::alert')  

<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            @if ($loginby->role_id == 3)
            <header class="py-3 mb-4 border-bottom">
                <div class="container d-flex flex-row-reverse ">
                    @inject('real', '\App\Models\Progress')
                    @php
                        $id = $id_pengelolaan->id;
                        $realisasi = $real->where('pengelolaan_kabkota_id', $id)->latest()->first();
                        if ($realisasi == null)
                            $realisasi = (object) ['realisasi_kegiatan' => 0];
                    @endphp
                    @if ($realisasi->realisasi_kegiatan > 100)
                        @if ($realisasi->realisasi_kegiatan % 2 == 0)
                            <form action="/pengelolaan-kegiatan/create" method="post">
                                @csrf
                                <input type="hidden" name="pengelolaan_kabkota_id" id="pengelolaan_kabkota_id" value="{{$id_pengelolaan->id}}">
                                <input type="hidden" name="realisasi_kegiatan" id="realisasi_kegiatan" value="{{$realisasi->realisasi_kegiatan}}">  
                                <div class="d-flex flex-row-reverse">
                                    <input type="submit" name="submit" value="Revisi Laporan" class="btn btn-primary" style="width: 200px; margin: 10px 0">
                                </div>
                            </form>
                        @endif
                    @else
                    <form action="/pengelolaan-kegiatan/create" method="post">
                        @csrf
                        <input type="hidden" name="pengelolaan_kabkota_id" id="pengelolaan_kabkota_id" value="{{$id_pengelolaan->id}}">
                        <input type="hidden" name="realisasi_kegiatan" id="realisasi_kegiatan" value="{{$realisasi->realisasi_kegiatan}}">  
                        <div class="d-flex flex-row-reverse">
                            <input type="submit" name="submit" value="Tambah Progress" class="btn btn-primary" style="width: 200px; margin: 10px 0">
                        </div>
                    </form>
                    @endif
                </div>
            </header>
            @else
            <header class="py-3 mb-4 border-bottom">
                <div class="container d-flex flex-row-reverse ">
                    @inject('real', '\App\Models\Progress')
                    @php
                        $id = $id_pengelolaan->id;
                        $realisasi = $real->where('pengelolaan_id', $id)->latest()->first();
                        if ($realisasi == null)
                            $realisasi = (object) ['realisasi_kegiatan' => 0];
                    @endphp
                    @if ($realisasi->realisasi_kegiatan > 100)
                        @if ($realisasi->realisasi_kegiatan % 2 == 0)
                            <form action="/pengelolaan-kegiatan/create" method="post">
                                @csrf
                                <input type="hidden" name="pengelolaan_id" id="pengelolaan_id" value="{{$id_pengelolaan->id}}">
                                <input type="hidden" name="realisasi_kegiatan" id="realisasi_kegiatan" value="{{$realisasi->realisasi_kegiatan}}">  
                                <div class="d-flex flex-row-reverse">
                                    <input type="submit" name="submit" value="Revisi Laporan" class="btn btn-primary" style="width: 200px; margin: 10px 0">
                                </div>
                            </form>
                        @endif
                    @else
                    <form action="/pengelolaan-kegiatan/create" method="post">
                        @csrf
                        <input type="hidden" name="pengelolaan_id" id="pengelolaan_id" value="{{$id_pengelolaan->id}}">
                        <input type="hidden" name="realisasi_kegiatan" id="realisasi_kegiatan" value="{{$realisasi->realisasi_kegiatan}}">  
                        <div class="d-flex flex-row-reverse">
                            <input type="submit" name="submit" value="Tambah Progress" class="btn btn-primary" style="width: 200px; margin: 10px 0">
                        </div>
                    </form>
                    @endif
                </div>
            </header>
            @endif

            <div class="container shadow-lg p-3 mb-5 bg-white rounded">

                <div class="table-responsive">
                    <table class="table text-nowrap mb-0 table-borderless table-hover w-100" id="detailKegiatan">
                        <thead class="table-light">
                            <tr class="text-center">
                                <th class="text-center" style="width: 10em;">Tanggal</th>
                                <th class="text-center" style="width: 30em;">Rincian Progress Kegiatan</th>
                                <th class="text-center">Realisasi Kegiatan (%)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($progress as $p)
                            @if ($p->realisasi_kegiatan <= 101 || $p->realisasi_kegiatan > 102)
                            <tr class='clickable-row' data-href="/progress-kegiatan/{{$p->id}}">
                                <div>
                                    <td class="align-middle">
                                        <div class="text-center">{{ \Carbon\Carbon::parse($p->created_at)->format('d F Y')}}</div>
                                    </td>
                                    <td class="small align-middle text-secondary text-center">
                                        {{$p->rincian_perkembangan}}
                                    </td>
                                    <td class="align-middle">
                                        <div class="progress">
                                            <div class="progress-bar {{ (($p->realisasi_kegiatan <= 25) ? 'bg-danger'
                                                : (($p->realisasi_kegiatan <= 50) ? 'bg-warning'
                                                : (($p->realisasi_kegiatan <= 100) ? 'bg-success'
                                                : (($p->realisasi_kegiatan == 101) ? 'bg-secondary'
                                                : 'bg-danger')))) }}" role="progressbar"
                                                aria-label="Example with label" style="width: {{$p->realisasi_kegiatan}}%;" aria-valuenow="25"
                                                aria-valuemin="0" aria-valuemax="100">{{ (($p->realisasi_kegiatan == 101) ? 'Laporan'
                                                                                        : (($p->realisasi_kegiatan > 102) ? 'Revisi'  
                                                                                        : (($p->realisasi_kegiatan) . '%'))) }}</div>
                                        </div>
                                    </td>
                                </div>
                            </tr>
                            @php
                                if ($p->realisasi_kegiatan == 101){
                                    $p->realisasi_kegiatan + 2;
                                }
                            @endphp
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <!--//container-fluid-->
    </div>
    <!--//app-content-->
</div>
<!--//app-wrapper-->

<script src="{{ url('/assets/js/sweetalert2.all.min.js') }}"></script>
    <script>
    @if (session()->has('tambahProgress'))
    Swal.fire({
        title: 'Success',
        icon: 'success',
        text: 'Progress Kegiatan berhasil ditambahkan!'
    });
    @endif
    </script>

    <script>
    @if (session()->has('tambahLaporan'))
    Swal.fire({
        title: 'Success',
        icon: 'success',
        text: 'Laporan Kegiatan berhasil ditambahkan!'
    });
    @endif
    </script>

    <script>
    @if(session()->has('update'))
    Swal.fire({
        title: 'Success',
        icon: 'success',
        text: 'Realisasi kegiatan berhasil diupdate!'
    });
    @endif
    </script>

    <script>
    @if(session()->has('hapus'))
    Swal.fire({
        title: 'Success',
        icon: 'success',
        text: 'Realisasi kegiatan berhasil dihapus!'
    });
    @endif
    </script>

@endsection
