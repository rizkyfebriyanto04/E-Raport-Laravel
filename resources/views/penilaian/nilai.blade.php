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
    <div class="modal fade" id="menampilkannilai" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Detail Nilai Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="nilaiContainer">
                        <!-- Data akan dimuat di sini -->
                    </div>
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
            $('#menampilkannilai').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Tombol yang diklik
                var id = button.data('id'); // Ambil ID dari data-id
                var modal = $(this);
                var container = modal.find('#nilaiContainer');

                $.ajax({
                    url: '/menampilkannilai/' + id,
                    method: 'GET',
                    success: function(data) {
                        container.empty(); // Kosongkan kontainer sebelum mengisi data

                        data.forEach(function(item) {
                            // Misalnya, menampilkan nama lengkap dan nilai untuk setiap item
                            container.append(`
                                <div class="mb-3">
                                    <strong>Nama Lengkap:</strong> ${item.namalengkap}<br>
                                    <strong>Matpel:</strong> ${item.matapelajaran}<br>
                                    <strong>Nilai:</strong> ${item.nilai} <!-- Ubah sesuai dengan kolom data Anda -->
                                </div>
                            `);
                        });
                    },
                    error: function(xhr) {
                        // Menangani jika ada kesalahan saat mendapatkan data
                        container.html('<p>Terjadi kesalahan saat memuat data.</p>');
                    }
                });
            });
        });
        </script>

@endsection
