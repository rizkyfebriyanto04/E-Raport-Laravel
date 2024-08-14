@extends('master')

@section('content')
    <section class="section">
        <div class="row" id="table-head">
            <div class="col-12">
                <button class="btn btn-outline-success" data-bs-toggle="modal"
                    data-bs-target="#inlineForm">
                    <i class="fas fa-file-excel"></i>&nbsp;Import Excel
                </button>
                <a href="{{ route('penilaian.export', $siswaId) }}" class="btn btn-primary">
                    <i class="fas fa-file-excel"></i>&nbsp;Export Excel
                </a>

                <br><br>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Nama : {{ $siswa->namalengkap }}</h4>
                        <h4 class="card-title"> Kelas : {{ $siswa->kelas }}</h4>
                        <h4 class="card-title"> Jurusan : {{ $siswa->jurusan }}</h4>
                        @if (session('success'))
                            <div class="alert alert-success" id="success-alert">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table2">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Nama Siswa</th>
                                        <th>Nilai</th>
                                        <th>Keterangan</th>
                                        <th>Semester</th>
                                        <th>Tahun Pelajaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1
                                    @endphp
                                    @foreach ($nilai as $d)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $d->matapelajaran }}</td>
                                        <td>{{ $d->namalengkap }}</td>
                                        <td>{{ $d->nilai }}</td>
                                        <td>{{ $d->ket }}</td>
                                        <td>{{ $d->semester }}</td>
                                        <td>{{ $d->tahunajaran }}</td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="inlineForm" tabindex="-1" aria-labelledby="inlineFormLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="inlineFormLabel">Import Excel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="{{ route('penilaian.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                    <label for="file">Upload Excel File</label>
                    <input type="file" name="file" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Import</button>
                </form>
                </div>
            </div>
            </div>
        </div>


    </section>

    <script>
        var alertBox = document.getElementById('success-alert');

        setTimeout(function() {
            alertBox.style.display = 'none';
        }, 3000);

        // document.addEventListener("DOMContentLoaded", function() {
        //     document.getElementById("myForm").addEventListener("submit", function(event) {
        //         var namalengkap = document.getElementById("NameLengkap").value;
        //         if (namalengkap.trim() === "") {
        //             alert("Nama Lengkap harus diisi!");
        //             event.preventDefault();
        //         }
        //     });
        // });
    </script>

@endsection
