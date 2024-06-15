@extends('master')

@section('content')
<div class="row">
    <div class="col-12 col-lg-12 col-md-12">
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
</div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Grafik Hasil Studi</h4>
                </div>
                <div class="card-body">
                    <div id="chart"></div>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Nilai Rata - Rata Mata Pelajaran</h4>
                </div>
                <div class="card-body">
                    <div id="chart-visitors-profile"></div>
                </div>
            </div>
        </div>
    </div>


    <script>

document.addEventListener('DOMContentLoaded', function () {
        var options = {
            chart: {
                type: 'line'
            },
            series: [{
                name: 'Average Grades',
                data: @json(array_values($averageGrades))
            }],
            xaxis: {
                categories: @json(array_keys($averageGrades))
            },
            title: {
                text: 'Average Grades Per Semester',
                align: 'left'
            }
        }

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    });

    document.addEventListener("DOMContentLoaded", function() {
        // Data dari controller
        var subjectScores = @json(array_values($subjectScores));
        var subjectLabels = @json(array_keys($subjectScores));

        var optionsVisitorsProfile = {
            series: subjectScores,
            labels: subjectLabels,
            colors: ["#435ebe", "#55c6e8", "#00e396", "#feb019", "#ff4560", "#775dd0", "#3f51b5", "#03a9f4", "#4caf50", "#f9ce1d"],
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
    </script>
@endsection
