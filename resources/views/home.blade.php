@extends('master')

@section('content')
    <div class="row">
        <div class="col-6 col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                            <div class="stats-icon purple mb-2">
                                <i class="fas fa-user-tie"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">Jumlah Guru</h6>
                            <h6 class="font-extrabold mb-0">{{ $guru }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                            <div class="stats-icon blue mb-2">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">Jumlah Siswa</h6>
                            <h6 class="font-extrabold mb-0">{{ $siswa }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                            <div class="stats-icon green mb-2">
                                <i class="fas fa-school"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">Jumlah Jurusan</h6>
                            <h6 class="font-extrabold mb-0">{{ $jurusan }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <h4>Jumlah Siswa Berdasarkan Jurusan</h4>
                </div>
                <div class="card-body">
                    <div id="bar">
                        <canvas id="barChartCanvas"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    <h4>Jumlah Siswa Berdasarkan Jenis Kelamin</h4>
                </div>
                <div class="card-body">
                    <div id="chart-visitors-profile"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- @if(Auth::user()->role == 'admin')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Trend Penjualan</h4>
                    </div>
                    <div class="card-body">
                        <div id="chart-profile-visit"></div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <p>&nbsp;</p>
    @endif --}}
    {{-- <h4>
        Selamat Datang
        <b>{{ Auth::user()->name }}</b>,
        Anda Login sebagai
        <b>{{ Auth::user()->role }}</b>
    </h4> --}}


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Data dari controller
            var jklakilaki = {{ $jklakilaki }};
            var jkperempuan = {{ $jkperempuan }};

            var optionsVisitorsProfile = {
                series: [jklakilaki, jkperempuan],
                labels: ["Laki - Laki", "Perempuan"],
                colors: ["#435ebe", "#55c6e8"],
                chart: {
                    type: "donut",
                    width: "100%",
                    height: "350px",
                },
                legend: {
                    position: "bottom",
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: "30%",
                        },
                    },
                },
            };

            var chartVisitorsProfile = new ApexCharts(
                document.getElementById("chart-visitors-profile"),
                optionsVisitorsProfile
            );

            chartVisitorsProfile.render();
        });

    var chartColors = {
        red: "rgb(255, 99, 132)",
        orange: "rgb(255, 159, 64)",
        yellow: "rgb(255, 205, 86)",
        green: "rgb(75, 192, 192)",
        info: "#41B1F9",
        blue: "#3245D1",
        purple: "rgb(153, 102, 255)",
        grey: "#EBEFF6",
    };

    var ctxBar = document.getElementById("barChartCanvas").getContext("2d");
    var dataJurusan = {!! json_encode($dataJurusan) !!};

    var labels = dataJurusan.map(function(item) {
        return item.kdjurusan;
    });

    var values = dataJurusan.map(function(item) {
        return item.jumlah_siswa;
    });

    var myBar = new Chart(ctxBar, {
        type: "bar",
        data: {
            labels: labels,
            datasets: [{
                label: "Jumlah Siswa",
                backgroundColor: Object.values(chartColors).slice(1, 5),
                data: values,
            }],
        },
        options: {
            responsive: true,
            barRoundness: 1,
            title: {
                display: true,
                text: "Jumlah Siswa per Jurusan",
            },
            legend: {
                display: false,
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        padding: 10,
                    },
                    gridLines: {
                        drawBorder: false,
                    },
                }],
                xAxes: [{
                    gridLines: {
                        display: false,
                        drawBorder: false,
                    },
                }],
            },
        },
    });

    </script>
@endsection
