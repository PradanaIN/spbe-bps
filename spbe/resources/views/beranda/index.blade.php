@extends('layouts.template')
@section('title', 'Beranda')
@section('pages', 'Beranda')
@section('beranda', 'active')
@section('container')
<div class="app-wrapper" style="margin-top:30px">

    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-4 mb-4 ">
                <div class="col-sm col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Total Kegiatan</h4>
                            <div class="stats-figure">{{ $jumlah_perencanaan }}</div>
                        </div>
                        <!--//app-card-body-->
                        <a class="app-card-link-mask" href="#"></a>
                    </div>
                    <!--//app-card-->
                </div>
                <!--//col-->

                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Kegiatan Berjalan</h4>
                            <div class="stats-figure">{{ $jumlah_berjalan }}</div>
                            <div class="stats-meta">{{ $jumlah_berjalan }} kegiatan on going</div>
                        </div>
                    </div>
                    <!--//app-card-->
                </div>
                <!--//col-->
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Kegiatan Selesai</h4>
                            <div class="stats-figure">{{ $jumlah_selesai }}</div>
                            <span class="stats-meta text-success">
                                Approved: {{ $perencanaan_approved }}</span>
                            <span class="stats-meta text-danger">
                                Declined: {{ $perencanaan_declined }}</span>
                        </div>
                    </div>
                    <!--//app-card-->
                </div>
                <!--//col-->
                <div class="col-sm col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Usulan Kegiatan</h4>
                            <div class="stats-figure">{{ $jumlah_usulan }}</div>
                            <span class="stats-meta text-success">
                                Approved: {{ $usulan_approved }}</span>
                            <span class="stats-meta text-danger">
                                Declined: {{ $usulan_declined }}</span>
                        </div>
                    </div>
                    <!--//app-card-->
                </div>
                <!--//col-->
            </div>
            <!--//col-->

        </div>
        <!--//row-->
        <div class="panel">
            <div id="chart"></div>
        </div>
    </div>
    <!--//app-content-->

    {{-- data: [{{  $rata1  }}, {{ $rata2 }}, {{ $rata3 }}, {{ $rata4 }}, {{ $rata5 }},{{ $rata6 }}, {{ $rata7 }}, {{ $rata8 }}] --}}

</div>
<!--//app-wrapper-->

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    Highcharts.chart('chart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Realisasi Kegiatan'
    },
    subtitle: {
        text: 'Area Perubahan SPBE'
    },
    xAxis: {
        categories: [
            'Kebijakan Internal Tata Kelola SPBE',
            'Perancangan Strategis SPBE',
            'Teknologi Informasi dan Komunikasi',
            'Penyelenggaraan SPBE',
            'Penerapan Manajemen SPBE',
            'Pelaksanaan Audit TIK',
            'Layanan Administrasi Pemerintahan Berbasis Elektronik',
            'Layanan Publik Berbasis Elektronik',
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        max:100,
        title: {
            text: 'Persentase'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} persen</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Rata-Rata Progress Realisasi',
        data: [{{  $rata1  }}, {{ $rata2 }}, {{ $rata3 }}, {{ $rata4 }}, {{ $rata5 }},{{ $rata6 }}, {{ $rata7 }}, {{ $rata8 }}]

    }]
});
</script>

@endsection
