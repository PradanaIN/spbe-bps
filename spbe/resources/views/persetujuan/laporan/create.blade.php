@extends('layouts.template')
@section('title', 'Persetujuan Laporan')
@section('pages', 'Persetujuan Laporan Kegiatan')
@section('persetujuan-laporan', 'active')
@section('container')

<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
                <div style="margin: 10px 30px;">

                    
                    @php
                    if ($pengelolaan->kabkota_id != null){
                        $progress = App\Models\Progress::where('pengelolaan_kabkota_id', $pengelolaan->id)->latest()->first();
                    } else {
                        $progress = App\Models\Progress::where('pengelolaan_id', $pengelolaan->id)->latest()->first();
                    }
                    @endphp
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
                                            value="{{ $laporan->perencanaan->nama_kegiatan }}" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="area" class="form-label">Area Perubahan</label>
                                        <input type="text" class="form-control" id="area" value="{{ $laporan->perencanaan->area->nama_area }}" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="pic" class="form-label">Person In Contact</label>
                                        <input type="text" class="form-control" id="pic" value="{{ $laporan->perencanaan->pic->nama_pic }}" disabled>
                                    </div>

                                    <div class="mb-3">
                                        <label for="desc" class="form-label">Deskripsi Kegiatan</label>
                                        <textarea type="text" class="form-control" id="desc" style="height:8em;"
                                        disabled>{{ $laporan->perencanaan->deskripsi }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tujuan" class="form-label">Tujuan Kegiatan</label>
                                        <textarea type="text" class="form-control" id="tujuan" style="height:5em;"
                                        disabled>{{ $laporan->perencanaan->tujuan }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="peserta" class="form-label">Target Peserta</label>
                                        <input type="text" class="form-control" id="peserta"
                                        value="{{ $laporan->perencanaan->peserta }}" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="peserta" class="form-label">Peserta Kegiatan</label>
                                            <input type="number" class="form-control"
                                            id="peserta" name="peserta" value="{{ $progress->peserta }}" required disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="lama" class="form-label">Lama Kegiatan</label>
                                        <div class="row">
                                            <div class="col">
                                                <input id="lama" type="text" class="form-control" aria-label="Lama Kegiatan"
                                                value="{{ $laporan->perencanaan->lama }}" disabled>
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
                                                    aria-label="First date" disabled value="{{ tgl_indo($laporan->perencanaan->tanggalAwalPelaksanaan) }}" >
                                            </div>
                                            <span class="my-auto">sampai dengan</span>
                                            <div class="p-0" style="width:42%;">
                                                <input type="text" id="tanggalAkhirPelaksanaan" class="form-control" placeholder="Last Date"
                                                    aria-label="Last date" disabled value="{{ tgl_indo($laporan->perencanaan->tanggalAkhirPelaksanaan) }}" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if ($pengelolaan->kabkota_id != null)
                        <div class="mb-3">
                            <label for="laporan" class="form-label">Laporan Kegiatan</label>
                            <button class="d-flex flex-row border border-5 rounded"
                                style="width:100%; background-color:#e9ecef;" data-toggle="modal" data-target="#myModal">
                                <div class="button p-2 text-secondary border-left-2" style="color:#666f86;">{{$progress->pengelolaan_kabkota->perencanaan->nama_kegiatan}}.pdf
                                </div>
                            </button>
                        
                            <!-- Modal -->
                            <div id="myModal" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-lg">
                        
                                    <!-- Modal content-->
                                    <div class="modal-content rounded">
                                        <div class="modal-header">
                                            <h4 class="modal-title" style="padding:5px;">Laporan Kegiatan {{$progress->pengelolaan_kabkota->perencanaan->nama_kegiatan}}</h4>
                                        </div>
                    @else
                        <div class="mb-3">
                            <label for="laporan" class="form-label">Laporan Kegiatan</label>
                            <button class="d-flex flex-row border border-5 rounded"
                                style="width:100%; background-color:#e9ecef;" data-toggle="modal" data-target="#myModal">
                                <div class="button p-2 text-secondary border-left-2" style="color:#666f86;">{{$progress->pengelolaan->perencanaan->nama_kegiatan}}.pdf
                                </div>
                            </button>
                        
                            <!-- Modal -->
                            <div id="myModal" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-lg">
                        
                                    <!-- Modal content-->
                                    <div class="modal-content rounded">
                                        <div class="modal-header">
                                            <h4 class="modal-title" style="padding:5px;">Laporan Kegiatan {{$progress->pengelolaan->perencanaan->nama_kegiatan}}</h4>
                                        </div>
                    @endif

                                    @php
                                        if ($progress->file == null) {
                                            $progress = $progress->realisasi_kegiatan - 1;
                                            $progress = App\Models\Progress::where('realisasi_kegiatan', $progress)->latest()->first();
                                        }
                                    @endphp
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
                    <div class="d-flex justify-content-between">
                        <!-- Button Declined -->
                        <form action="/persetujuan-laporan" method="POST">
                            @csrf
                            <input type="hidden" name="status_persetujuan" id="status_persetujuan" value="3">
                            <input type="hidden" name="realisasi_kegiatan" id="realisasi_kegiatan" value="{{ $progress->realisasi_kegiatan + 1}}">
                            @if ($pengelolaan->kabkota_id != null)
                            <input type="hidden" name="pengelolaan_kabkota_id" id="pengelolaan_kabkota_id" value="{{ $pengelolaan->id }}">
                            @else
                            <input type="hidden" name="pengelolaan_id" id="pengelolaan_id" value="{{ $pengelolaan->id }}">
                            @endif
                            <div>
                                <input type="button" name="button" class="btn btn-danger buttons" data-bs-toggle="modal"
                                    data-bs-target="#declinedBackdrop" style="height: 40px; margin: 20px 0;" value="Declined">
                            </div>
    
                            <!-- Modal -->
                            <div class="modal fade" id="declinedBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="declinedBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="declinedBackdropLabel">Konfirmasi Penolakan</h1>
                                    </div>
                                    <div class="modal-body pb-0">
                                        Masukkan alasan penolakan sebagai bahan evaluasi!
                                    </div>
                                    <div class="modal-body">
                                        <textarea type="text" class="form-control" id="deskripsi_tolak" name="deskripsi_tolak"
                                            style="height:8em;" required></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="submit" class="btn btn-danger">Declined</button>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </form>
    
                        <form action="/persetujuan-laporan" method="POST">
                            @csrf
                            {{-- <input type="hidden" name="perencanaan_id" id="perencanaan_id" value="{{ $laporan->id }}"> --}}
                            <input type="hidden" name="status_persetujuan" id="status_persetujuan" value="2">
                            @if ($pengelolaan->kabkota_id != null)
                            <input type="hidden" name="pengelolaan_kabkota_id" id="pengelolaan_kabkota_id" value="{{ $pengelolaan->id }}">
                            @else
                            <input type="hidden" name="pengelolaan_id" id="pengelolaan_id" value="{{ $pengelolaan->id }}">
                            @endif
                            <div>
                                <input type="button" data-bs-toggle="modal" data-bs-target="#approvedBackdrop" name="button"
                                    class="btn btn-success buttons" style="height: 40px; margin: 20px 0;" value="Approved">
                            </div>
                            <!-- Modal -->
                            <div class="modal fade my-auto" id="approvedBackdrop" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="approvedBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="approvedBackdropLabel">Konfirmasi Persetujuan</h1>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda yakin menyetujui laporan kegiatan ini?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" name="submit" class="btn btn-success">Approved</button>
                                        </div>
                                    </div>
                                </div>
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
