@extends('master')

@section('content')
<div class="row">
    <div class="col-12 col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <h5>
                        Selamat Datang , di E-Raport SMK AL Amanah
                    </h5>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6 col-lg-12 col-md-6">
        <div class="card collapse-icon accordion-icon-rotate">
            <div class="card-header">
                <h4 class="card-title pl-1">Profile Siswa</h4>
            </div>
            <div class="card-body">
                <div class="accordion" id="cardAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                aria-expanded="false" aria-controls="collapseTwo">
                                {{ $siswa[0]->namalengkap }}
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse"
                            aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">NIS / NISN</label>
                                            <input type="text" id="first-name-column" class="form-control"
                                                value="{{ $siswa[0]->nisn }}" name="fname-column" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Jenis Kelamin</label>
                                            <input type="text" id="last-name-column" class="form-control"
                                            value="{{ $siswa[0]->jk }}" name="lname-column" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Tanggal Lahir</label>
                                            <input type="text" id="city-column" class="form-control" value="{{ $siswa[0]->ttl }}"
                                                name="city-column" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Alamat</label>
                                            <input type="text" id="country-floating" class="form-control"
                                                name="country-floating" value="{{ $siswa[0]->alamat }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Agama</label>
                                            <input type="text" id="company-column" class="form-control"
                                                name="company-column" value="{{ $siswa[0]->agama }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Nama Orangtua/Wali</label>
                                            <input type="email" id="email-id-column" class="form-control"
                                                name="email-id-column" value="{{ Auth::user()->name }}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
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
                        <h6 class="text-muted font-semibold">Sakit</h6>
                        <h6 class="font-extrabold mb-0">{{ $kehadiran[0]->sakit }}</h6>
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
                        <h6 class="text-muted font-semibold">Izin</h6>
                        <h6 class="font-extrabold mb-0">{{ $kehadiran[0]->izin }}</h6>
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
                        <h6 class="text-muted font-semibold">Tanpa Kehadiran</h6>
                        <h6 class="font-extrabold mb-0">{{ $kehadiran[0]->tanpa_keterangan }}</h6>
                    </div>
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
            text: '',
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
