@extends('master')

@section('content')
    <section class="section">
        <div class="row" id="table-head">
            <div class="col-12">
                <button class="btn btn-outline-success" data-bs-toggle="modal"
                    data-bs-target="#inlineForm">
                    <i data-feather="plus"></i>&nbsp;Tambah
                </button>
                <br><br>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Master Siswa</h4>
                        @if (session('success'))
                            <div class="alert alert-success" id="success-alert">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Siswa</th>
                                    <th>NISN</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    {{-- <th>Kelas</th>
                                    <th>Jurusan</th>
                                    <th>Semester</th>
                                    <th>Wali Kelas</th> --}}
                                    <th>Agama</th>
                                    <th>Alamat</th>
                                    <th>No Hp</th>
                                    <th>Aksi</th>
                                </tr>
                                @php
                                    $no = 1
                                @endphp
                                @foreach ($data as $d)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $d->namalengkap }}</td>
                                    <td>{{ $d->nisn }}</td>
                                    <td>{{ $d->ttl }}</td>
                                    <td>{{ $d->jk }}</td>
                                    {{-- <td>{{ $d->kelas }}</td>
                                    <td>{{ $d->jurusan }}</td>
                                    <td>{{ $d->semester }}</td>
                                    <td>{{ $d->namaguru }}</td> --}}
                                    <td>{{ $d->agama }}</td>
                                    <td>{{ $d->alamat }}</td>
                                    <td>{{ $d->nohp }}</td>
                                    <td>
                                        <form id="delete-form-{{ $d->id }}" action="{{ route('siswa.hapussiswa', $d->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('POST')
                                            {{-- <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data?');" style="border: none; background-color: transparent;">
                                                <i class="badge-circle badge-circle-light-secondary font-medium-1" data-feather="trash"></i>
                                            </button> --}}
                                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data?');" class="btn btn-primary">
                                                Hapus
                                            </button>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $d->id }}">
                                                Edit
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--login form Modal -->
        <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel17" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
            role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17"> Tambah Data Siswa</h4>
                    <button type="button" class="close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="{{ route('siswa.action') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="NameLengkap">Nama Lengkap</label>
                                <div class="form-group">
                                    <input class="form-control" id="NameLengkap" type="text" name="namalengkap" placeholder="Nama Lengkap"/>
                                </div>
                                <label for="nisn">NISN</label>
                                <div class="form-group">
                                    <input class="form-control" id="nisn" type="text" name="nisn" placeholder="NISN"/>
                                </div>
                                <label for="kls">Kelas</label>
                                <div class="form-group">
                                    <select class="form-control" id="kls" name="kelas">
                                        <option value="" selected>-- Pilih --</option>
                                        @foreach ($kelas as $k)
                                            <option value="{{ $k->id }}">{{ $k->kelas }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label for="jrs">Jurusan</label>
                                <div class="form-group">
                                    <select class="form-control" id="jrs" name="jurusan">
                                        <option value="" selected>-- Pilih --</option>
                                        @foreach ($jurusan as $k)
                                            <option value="{{ $k->id }}">{{ $k->jurusan }} ( {{ $k->kdjurusan }} )</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label for="sm">Semester</label>
                                <div class="form-group">
                                    <select class="form-control" id="sm" name="semester">
                                        <option value="" selected>-- Pilih --</option>
                                        @foreach ($semester as $k)
                                            <option value="{{ $k->id }}">{{ $k->semester }} {{ $k->tahunajaran }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <label for="wl">Wali Kelas</label>
                                <div class="form-group">
                                    <select class="form-control" id="wl" name="walikelas">
                                        <option value="" selected>-- Pilih --</option>
                                        @foreach ($guru as $k)
                                            <option value="{{ $k->id }}">{{ $k->namalengkap }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label for="tgl">Tanggal Lahir</label>
                                <div class="form-group">
                                    <input type="date" name="tgl" class="form-control mb-3 flatpickr-no-config" placeholder="Select date..">
                                </div>
                                <label for="jk">Jenis Kelamin</label>
                                <div class="form-group">
                                    <select class="form-control" id="jk" name="jeniskelamin">
                                        <option value="" selected>-- Pilih --</option>
                                        <option value="Perempuan">Perempuan</option>
                                        <option value="Laki - Laki">Laki - Laki</option>
                                    </select>
                                </div>
                                <label for="alamat">Alamat</label>
                                <div class="form-group">
                                    <input class="form-control" id="alamat" type="text" name="alamat" placeholder="alamat"/>
                                </div>
                                <label for="nohp">No Hp</label>
                                <div class="form-group">
                                    <input class="form-control" id="nohp" type="text" name="nohp" placeholder="nohp"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary"
                            data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Tutup</span>
                        </button>
                        <button type="submit" class="btn btn-primary ms-1"
                            data-bs-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Simpan</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $d->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel{{ $d->id }}">Edit Data Siswa</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('siswa.updatesiswa', $d->id) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="NameLengkap{{ $d->id }}">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="NameLengkap{{ $d->id }}" name="namalengkap" value="{{ $d->namalengkap }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nisn{{ $d->id }}">NISN</label>
                                        <input type="text" class="form-control" id="nisn{{ $d->id }}" name="nisn" value="{{ $d->nisn }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="ttl{{ $d->id }}">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="ttl{{ $d->id }}" name="ttl" value="{{ $d->ttl }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="jk{{ $d->id }}">Jenis Kelamin</label>
                                        <input type="text" class="form-control" id="jk{{ $d->id }}" name="jk" value="{{ $d->jk }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="kelas{{ $d->id }}">Kelas</label>
                                        <select class="form-control" id="kelas{{ $d->id }}" name="kelas" required>
                                            <option value="" selected>-- Pilih --</option>
                                            @foreach ($kelas as $k)
                                                <option value="{{ $k->id }}" {{ $d->objectkelasfk == $k->id ? 'selected' : '' }}>
                                                    {{ $k->kelas }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jurusan{{ $d->id }}">Jurusan</label>
                                        <select class="form-control" id="jurusan{{ $d->id }}" name="jurusan" required>
                                            <option value="" selected>-- Pilih --</option>
                                            @foreach ($jurusan as $k)
                                                <option value="{{ $k->id }}" {{ $d->objectjurusanfk == $k->id ? 'selected' : '' }}>
                                                    {{ $k->kdjurusan }} {{ $k->jurusan }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="semester{{ $d->id }}">Semester</label>
                                        <select class="form-control" id="semester{{ $d->id }}" name="semester" required>
                                            <option value="" selected>-- Pilih --</option>
                                            @foreach ($semester as $k)
                                                <option value="{{ $k->id }}" {{ $d->objectsemesterfk == $k->id ? 'selected' : '' }}>
                                                    {{ $k->semester }} {{ $k->tahunajaran }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="wl{{ $d->id }}">Wali Kelas</label>
                                        <select class="form-control" id="wl{{ $d->id }}" name="walikelas" required>
                                            <option value="" selected>-- Pilih --</option>
                                            @foreach ($guru as $k)
                                                <option value="{{ $k->id }}" {{ $d->objectgurufk == $k->id ? 'selected' : '' }}>
                                                    {{ $k->namalengkap }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat{{ $d->id }}">Alamat</label>
                                        <input type="text" class="form-control" id="alamat{{ $d->id }}" name="alamat" value="{{ $d->alamat }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nohp{{ $d->id }}">No HP</label>
                                        <input type="text" class="form-control" id="nohp{{ $d->id }}" name="nohp" value="{{ $d->nohp }}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    </section>

    <script>
        var alertBox = document.getElementById('success-alert');

        setTimeout(function() {
            alertBox.style.display = 'none';
        }, 3000);

        document.addEventListener('DOMContentLoaded', function () {
            flatpickr(".flatpickr-no-config", {
                dateFormat: "Y-m-d",
                altInput: true,
                altFormat: "Y-m-d",
                defaultDate: null, // Optionally, you can set a default date
                placeholder: "Select date..",
            });
        });

    </script>
@endsection
