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
                        <h4 class="card-title">Input Nilai Siswa</h4>
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
                                            {{-- <button type="button" class="btn btn-primary open-modal" data-bs-toggle="modal" data-bs-target="#editModal{{ $d->id }}">
                                                Input Nilai
                                            </button> --}}
                                            <a href="#" class="btn btn-primary" data-id="{{ $d->smid }}" data-bs-toggle="modal" data-bs-target="#menampilkannilai">Menampilkan Nilai</a>
                                            <a href="/penilaiansiswa/{{ $d->smid }}" class="btn btn-primary">Input Nilai</a>
                                            <a href="/penilaiansiswaimport/{{ $d->smid }}" class="btn btn-primary">Input Excel</a>
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
    <!-- Modal -->
    <!-- Modal -->
    <div class="modal fade" id="menampilkannilai" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nilai Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Placeholder for student name -->
                    <h4>Nama Siswa</h4>
                    <h2 id="namasiswa"></h2>

                    <table class="table table-striped" id="nilaiTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Mata Pelajaran</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data will be populated here by JavaScript -->
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>



    </section>
    <script>
        $(document).ready(function() {
            $('#table1').DataTable();
        });
    </script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize the DataTable variable
            var dataTable;

            $('#menampilkannilai').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Tombol yang diklik
                var id = button.data('id'); // Ambil ID dari data-id

                var modal = $(this);
                var table = modal.find('#nilaiTable');
                var tableBody = table.find('tbody');

                // Destroy previous DataTable instance if it exists
                if ($.fn.DataTable.isDataTable('#nilaiTable')) {
                    table.DataTable().clear().destroy();
                }

                $.ajax({
                    url: '/menampilkannilai/' + id,
                    method: 'GET',
                    success: function(data) {
                        tableBody.empty(); // Kosongkan tabel sebelum mengisi data
                        var namalengkap = data[0].namalengkap
                        $('#namasiswa').text(namalengkap);
                        // Populate the table with data
                        var no = 1;
                        data.forEach(function(item) {
                            tableBody.append(`
                                <tr>
                                    <td>${no++}</td>
                                    <td>${item.matapelajaran}</td>
                                    <td>${item.nilai}</td>
                                </tr>
                            `);
                        });

                        // Initialize DataTable after populating it
                        table.DataTable({
                            // Optional configuration here
                        });
                    },
                    error: function(xhr) {
                        tableBody.html('<tr><td colspan="3">Terjadi kesalahan saat memuat data.</td></tr>');
                    }
                });
            });
        });
    </script>


@endsection
