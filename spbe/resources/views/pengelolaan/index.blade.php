@extends('layouts.template')
@section('title', 'Pengelolaan')
@section('pages', 'Daftar Kegiatan')
@section('pengelolaan', 'active')
@section('container')

<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif

            <header class="py-3 mb-4 border-bottom">
                <div class="container d-flex flex-wrap justify-content-between" style="padding:0;">
                </div>
            </header>

            <div class="container shadow-lg p-3 mb-3 bg-white rounded">
                <div class="table-responsive">
                    <table class="table text-nowrap mb-0 table-borderless table-hover w-100" id="listKegiatan">
                        <thead class="table-light">
                            <tr class="text-center">
                                <th class="text-center">No</th>
                                <th class="text-center">Nama Kegiatan</th>
                                <th class="text-center">Area Perubahan</th>
                                <th class="text-center">Realisasi Kegiatan (%)</th>
                                <th class="text-center">Status Persetujuan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengelolaan as $p)
                            @if ($p->perencanaan != null)
                            @if ($loginby->role_id == 3)
                            <tr class='clickable-row' data-href="/pengelolaan-kegiatan/kabkota/{{$p->id}}">
                            @else
                            <tr class='clickable-row' data-href="/pengelolaan-kegiatan/{{$p->id}}">
                            @endif
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
                                    <td class="align-middle">
                                        <div class="progress">
                                            @inject('progress', '\App\Models\Progress')
                                            @php
                                            if ($loginby->role_id == 3){
                                                $persentase = $progress->where('pengelolaan_kabkota_id', $p->id)->latest()->first();
                                            }
                                            else{
                                                $persentase = $progress->where('pengelolaan_id', $p->id)->latest()->first();
                                            }
                                            @endphp
                                            @if ($persentase == null)
                                                @php
                                                    $persentase = (object) ['realisasi_kegiatan' => 0];
                                                @endphp
                                            @endif
                                            <div class="progress-bar 
                                            @php
                                                if($persentase->realisasi_kegiatan <= 25){
                                                    echo 'bg-danger';
                                                }elseif($persentase->realisasi_kegiatan <= 50){
                                                    echo 'bg-warning';
                                                }elseif($persentase->realisasi_kegiatan < 100){
                                                    echo 'bg-success';
                                                }elseif($persentase->realisasi_kegiatan == 100){
                                                    echo 'bg-secondary';
                                                }elseif($persentase->realisasi_kegiatan > 100){
                                                    if($persentase->realisasi_kegiatan % 2 == 0){
                                                        echo 'bg-danger';
                                                    }else{
                                                        echo 'bg-primary';
                                                    }
                                                }
                                            @endphp
                                                " role="progressbar"
                                                aria-label="Example with label" style="width: {{ $persentase->realisasi_kegiatan}}%;"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                @php
                                                    if($persentase->realisasi_kegiatan == 0){

                                                    }elseif ($persentase->realisasi_kegiatan == 100) {
                                                        echo 'Harap Upload Laporan';
                                                    }elseif ($persentase->realisasi_kegiatan > 100) {
                                                        if($persentase->realisasi_kegiatan % 2 == 0){
                                                            echo 'Harap Revisi Laporan';
                                                        }else{
                                                            echo 'Done';
                                                        }
                                                    }else{
                                                        echo $persentase->realisasi_kegiatan.'%';
                                                    }
                                                @endphp
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center">   
                                        <span class="badge {{ (($p->status_persetujuan == 0) ? 'bg-secondary'
                                            : (($p->status_persetujuan == 1) ? 'bg-warning'
                                            : (($p->status_persetujuan == 2) ? 'bg-success'
                                            : 'bg-danger'))) }} text-white">
                                            {{ (($p->status_persetujuan == 0) ? 'Pending'
                                            : (($p->status_persetujuan == 1) ? 'Waiting'
                                            : (($p->status_persetujuan == 2) ? 'Approved'
                                            : 'Declined'))) }}</span>
                                    </td>
                                </div>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!--//app-content-->

        </div>
        <!--//container-fluid-->
    </div>
    <!--//app-content-->

</div>
<!--//app-wrapper-->
@endsection
