@extends('master')

@section('content')
    <section class="section">
        <div class="row" id="table-head">
            <div class="col-12">
                {{-- <button class="btn btn-outline-success" data-bs-toggle="modal"
                    data-bs-target="#inlineForm">
                    <i data-feather="plus"></i>&nbsp;Tambah
                </button> --}}
                <br><br>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Daftar Hasil Studi Siswa</h4>
                        @if (session('success'))
                            <div class="alert alert-success" id="success-alert">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Kelas</th>
                                        <th>Jurusan</th>
                                        <th>aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1
                                    @endphp
                                    @foreach ($siswa as $d)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $d->namalengkap }}</td>
                                        <td>{{ $d->kelas }}</td>
                                        <td>{{ $d->jurusan }} ( {{ $d->kdjurusan }} )</td>
                                        <td>
                                            <a href="/hasilraport/{{ $d->smid }}" class="btn btn-primary" target="_blank"><i class="fas fa-file-pdf"></i> Lihat</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
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

    </script>
@endsection
