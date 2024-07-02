@extends('master')

@section('content')
<div class="row">
    <div class="col-8 col-lg-8 col-md-8">
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <h5>
                        Selamat Datang {{ Auth::user()->name }}, di E-Raport SMK AL Amanah
                    </h5>
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
                        <h6 class="text-muted font-semibold">Jumlah Siswa </h6>
                        <h6 class="font-extrabold mb-0">{{ $siswa }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Rata Rata Nilai Siswa </h4>
                </div>
                <div class="card-body">
                    <div id="bar"></div>
                </div>
            </div>
        </div>
        {{-- <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Nilai Rata - Rata Mata Pelajaran</h4>
                </div>
                <div class="card-body">
                    <div id="chart-visitors-profile"></div>
                </div>
            </div>
        </div> --}}
    </div>


    <script>

    document.addEventListener('DOMContentLoaded', function () {
            var data = @json($averageData);

            var barOptions = {
                series: [
                    {
                        name: "Normatif",
                        data: [data.Normatif],
                    },
                    {
                        name: "Adaptif",
                        data: [data.Adatif],
                    },
                    {
                        name: "Produktif",
                        data: [data.Produktif],
                    },
                    {
                        name: "Muatan Lokal",
                        data: [data['Muatan Lokal']],
                    },
                ],
                chart: {
                    type: "bar",
                    height: 350,
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: "55%",
                        endingShape: "rounded",
                    },
                },
                dataLabels: {
                    enabled: false,
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ["transparent"],
                },
                xaxis: {
                    categories: ["Kategori Mata Pelajaran"],
                },
                yaxis: {
                    title: {
                        text: "Rata - Rata Nilai Siswa di Mata Pelajaran",
                    },
                },
                fill: {
                    opacity: 1,
                },
                tooltip: {
                    y: {
                        formatter: function (val) {
                            return val;
                        },
                    },
                },
            };

            var bar = new ApexCharts(document.querySelector("#bar"), barOptions);
            bar.render();
        });
    </script>
@endsection
