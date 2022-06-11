@extends('layouts.adminLayout')
@section('title')
    Dashboard || SITERPI
@endsection

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="mdi mdi-cube text-danger icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">Pengeluaran</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">{{number_format($pengeluaran)}} </h3>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3 mb-0">
                        <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> 65% lower growth
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="mdi mdi-receipt text-warning icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">Penjualan</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">{{number_format($transaksi)}}</h3>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3 mb-0">
                        <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> Product-wise
                        sales
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="mdi mdi-poll-box text-success icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">Laba</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">{{number_format($laba)}}</h3>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3 mb-0">
                        <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> Weekly Sales
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="mdi mdi-account-location text-info icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">Karyawan</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">{{$pegawai}}</h3>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3 mb-0">
                        <i class="mdi mdi-reload mr-1" aria-hidden="true"></i> Member Employee
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <!--weather card-->
            <div class="card card-weather">
                <div class="card-body">
                    <div class="weather-date-location">
                        <h3>{{$today}}</h3>
                        <p class="text-gray">
                            <span class="weather-date">{{$date}}</span>
                            <span class="weather-location">Pasuruan, Jawatimur</span>
                        </p>
                    </div>
                    <div class="weather-data d-flex">
                        <div class="mr-auto">
                            <h4 class="display-3">21
                                <span class="symbol">&deg;</span>C</h4>
                            <p>
                                Mostly Cloudy
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="d-flex weakly-weather">
                        <div class="weakly-weather-item">
                            <p class="mb-0">
                                Sun
                            </p>
                            <i class="mdi mdi-weather-cloudy"></i>
                            <p class="mb-0">
                                30°
                            </p>
                        </div>
                        <div class="weakly-weather-item">
                            <p class="mb-1">
                                Mon
                            </p>
                            <i class="mdi mdi-weather-hail"></i>
                            <p class="mb-0">
                                31°
                            </p>
                        </div>
                        <div class="weakly-weather-item">
                            <p class="mb-1">
                                Tue
                            </p>
                            <i class="mdi mdi-weather-partlycloudy"></i>
                            <p class="mb-0">
                                28°
                            </p>
                        </div>
                        <div class="weakly-weather-item">
                            <p class="mb-1">
                                Wed
                            </p>
                            <i class="mdi mdi-weather-pouring"></i>
                            <p class="mb-0">
                                30°
                            </p>
                        </div>
                        <div class="weakly-weather-item">
                            <p class="mb-1">
                                Thu
                            </p>
                            <i class="mdi mdi-weather-pouring"></i>
                            <p class="mb-0">
                                29°
                            </p>
                        </div>
                        <div class="weakly-weather-item">
                            <p class="mb-1">
                                Fri
                            </p>
                            <i class="mdi mdi-weather-snowy-rainy"></i>
                            <p class="mb-0">
                                31°
                            </p>
                        </div>
                        <div class="weakly-weather-item">
                            <p class="mb-1">
                                Sat
                            </p>
                            <i class="mdi mdi-weather-snowy"></i>
                            <p class="mb-0">
                                32°
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!--weather card ends-->
        </div>
    </div>

    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4"></h5>
                    <div class="fluid-container">
                        <canvas id="canvas" height="280" width="600"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    var month = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
    console.log(month);
    var keuanganMasuk = {{$keuanganMasuk}};
    var keuanganKeluar = {{$keuanganKeluar}};

    var barChartData = {
        labels: month,
        datasets: [{
            label: 'Pemasukan',
            borderColor: "green",
            data: keuanganMasuk,
            fill : false
        },
        {
            label: 'Pengeluaran',
            borderColor: "pink",
            data: keuanganKeluar,
            fill : false
        }
    ]
    };

    window.onload = function() {
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'line',
            data: barChartData,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: '#c1c1c1',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Grafik Keuangan'
                }
            }
        });
    };
</script>
@endsection
