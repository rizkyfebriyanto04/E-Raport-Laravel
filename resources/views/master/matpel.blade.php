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
                        <h4 class="card-title">Data Master Mata Pelajaran</h4>
                        @if (session('success'))
                            <div class="alert alert-success" id="success-alert">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="card">
                    {{-- <div class="card-header">
                        <h4 class="card-title">Data Master Mata Pelajaran</h4>
                        @if (session('success'))
                            <div class="alert alert-success" id="success-alert">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div> --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">
                                        Teknik Jaringan dan Telekomunikasi ( TJKT )
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home1" role="tab"
                                                aria-controls="home" aria-selected="true">Kelas X ( Sepuluh )</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile1" role="tab"
                                                aria-controls="profile" aria-selected="false">Kelas XI ( Sebelas )</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact1" role="tab"
                                                aria-controls="contact" aria-selected="false">Kelas XII ( Dua Belas )</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="home1" role="tabpanel" aria-labelledby="home-tab">
                                            <div class="card-content">
                                                <div class="table-responsive">
                                                    <table class="table table-striped" id="table1">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama Pelajaran</th>
                                                                <th>Nilai KKM</th>
                                                                <th>Kelas</th>
                                                                <th>Jenis Mata Pelajaran</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $no = 1
                                                            @endphp
                                                            @foreach ($tkjx as $d)
                                                            <tr>
                                                                <td>{{ $no++ }}</td>
                                                                <td>{{ $d->matapelajaran }}</td>
                                                                <td>{{ $d->nilaikkm }}</td>
                                                                <td>{{ $d->kelas }}</td>
                                                                <td>{{ $d->jenismatpel }}</td>
                                                                <td>
                                                                    {{-- <form id="delete-form-{{ $d->mpid }}" action="{{ route('mapel.hapusmapel', $d->mpid) }}" method="POST" style="display: inline;">
                                                                        @csrf
                                                                        @method('POST')
                                                                        <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data?');" class="btn btn-primary">
                                                                            Hapus
                                                                        </button> --}}
                                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $d->mpid }}">
                                                                            Edit
                                                                        </button>
                                                                    {{-- </form> --}}
                                                                </td>
                                                            </tr>

                                                            <div class="modal fade" id="editModal{{ $d->mpid }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $d->mpid }}" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="editModalLabel{{ $d->mpid }}">Edit Data Mata Pelajaran</h5>
                                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <form action="{{ route('mapel.updatemapel', $d->mpid) }}" method="POST">
                                                                            @csrf
                                                                            <div class="modal-body">
                                                                                {{-- <div class="form-group"> --}}
                                                                                    <label for="NameLengkap">Mata Pelajaran</label>
                                                                                    <input type="text" class="form-control" id="NameLengkap" name="matapelajaran" value="{{ $d->matapelajaran }}" >
                                                                                {{-- </div> --}}
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                {{-- <div class="form-group"> --}}
                                                                                    <label for="NameLengkap">Nilai KKM</label>
                                                                                    <input type="text" class="form-control" id="NameLengkap" name="nilaikkm" value="{{ $d->nilaikkm }}" >
                                                                                {{-- </div> --}}
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                {{-- <div class="form-group"> --}}
                                                                                    <label for="kelas{{ $d->mpid }}">Kelas</label>
                                                                                    <select class="form-control" id="kelas{{ $d->mpid }}" name="objectkelasfk" >
                                                                                        <option value="" selected>-- Pilih --</option>
                                                                                        @foreach ($kelas as $k)
                                                                                            <option value="{{ $k->id }}" {{ $d->objectkelasfk == $k->id ? 'selected' : '' }}>
                                                                                                {{ $k->kelas }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                {{-- </div> --}}
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                {{-- <div class="form-group"> --}}
                                                                                    <label for="kelas{{ $d->mpid }}">Jenis Mata Pelajaran</label>
                                                                                    <select class="form-control" id="kelas{{ $d->mpid }}" name="objectjenismapelfk" >
                                                                                        <option value="" selected>-- Pilih --</option>
                                                                                        @foreach ($jenismapel as $k)
                                                                                            <option value="{{ $k->id }}" {{ $d->objectjenismapelfk == $k->id ? 'selected' : '' }}>
                                                                                                {{ $k->jenismatpel }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                {{-- </div> --}}
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                {{-- <div class="form-group"> --}}
                                                                                    <label for="kelas{{ $d->mpid }}">Jurusan Mata Pelajaran</label>
                                                                                    <select class="form-control" id="kelas{{ $d->mpid }}" name="objectjurusanfk" >
                                                                                        <option value="" selected>-- Pilih --</option>
                                                                                        @foreach ($jurusan as $k)
                                                                                            <option value="{{ $k->id }}" {{ $d->objectjurusanfk == $k->id ? 'selected' : '' }}>
                                                                                                {{$k->jurusan}} ( {{ $k->kdjurusan }} )
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                {{-- </div> --}}
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="profile1" role="tabpanel" aria-labelledby="profile-tab">
                                            <div class="card-content">
                                                <div class="table-responsive">
                                                    <table class="table table-striped" id="table2">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama Pelajaran</th>
                                                                <th>Nilai KKM</th>
                                                                <th>Kelas</th>
                                                                <th>Jenis Mata Pelajaran</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $no = 1
                                                            @endphp
                                                            @foreach ($tkjxi as $d)
                                                            <tr>
                                                                <td>{{ $no++ }}</td>
                                                                <td>{{ $d->matapelajaran }}</td>
                                                                <td>{{ $d->nilaikkm }}</td>
                                                                <td>{{ $d->kelas }}</td>
                                                                <td>{{ $d->jenismatpel }}</td>
                                                                <td>
                                                                    {{-- <form id="delete-form-{{ $d->mpid }}" action="{{ route('mapel.hapusmapel', $d->mpid) }}" method="POST" style="display: inline;">
                                                                        @csrf
                                                                        @method('POST')
                                                                        <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data?');" class="btn btn-primary">
                                                                            Hapus
                                                                        </button> --}}
                                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $d->mpid }}">
                                                                            Edit
                                                                        </button>
                                                                    {{-- </form> --}}
                                                                </td>
                                                            </tr>

                                                            <div class="modal fade" id="editModal{{ $d->mpid }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $d->mpid }}" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="editModalLabel{{ $d->mpid }}">Edit Data Mata Pelajaran</h5>
                                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <form action="{{ route('mapel.updatemapel', $d->mpid) }}" method="POST">
                                                                            @csrf
                                                                            <div class="modal-body">
                                                                                {{-- <div class="form-group"> --}}
                                                                                    <label for="NameLengkap">Mata Pelajaran</label>
                                                                                    <input type="text" class="form-control" id="NameLengkap" name="matapelajaran" value="{{ $d->matapelajaran }}" >
                                                                                {{-- </div> --}}
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                {{-- <div class="form-group"> --}}
                                                                                    <label for="NameLengkap">Nilai KKM</label>
                                                                                    <input type="text" class="form-control" id="NameLengkap" name="nilaikkm" value="{{ $d->nilaikkm }}" >
                                                                                {{-- </div> --}}
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                {{-- <div class="form-group"> --}}
                                                                                    <label for="kelas{{ $d->mpid }}">Kelas</label>
                                                                                    <select class="form-control" id="kelas{{ $d->mpid }}" name="kelas" >
                                                                                        <option value="" selected>-- Pilih --</option>
                                                                                        @foreach ($kelas as $k)
                                                                                            <option value="{{ $k->id }}" {{ $d->objectkelasfk == $k->id ? 'selected' : '' }}>
                                                                                                {{ $k->kelas }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                {{-- </div> --}}
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                {{-- <div class="form-group"> --}}
                                                                                    <label for="kelas{{ $d->mpid }}">Jenis Mata Pelajaran</label>
                                                                                    <select class="form-control" id="kelas{{ $d->mpid }}" name="mapel" >
                                                                                        <option value="" selected>-- Pilih --</option>
                                                                                        @foreach ($jenismapel as $k)
                                                                                            <option value="{{ $k->id }}" {{ $d->objectjenismapelfk == $k->id ? 'selected' : '' }}>
                                                                                                {{ $k->jenismatpel }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                {{-- </div> --}}
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                {{-- <div class="form-group"> --}}
                                                                                    <label for="kelas{{ $d->mpid }}">Jurusan Mata Pelajaran</label>
                                                                                    <select class="form-control" id="kelas{{ $d->mpid }}" name="mapel" >
                                                                                        <option value="" selected>-- Pilih --</option>
                                                                                        @foreach ($jurusan as $k)
                                                                                            <option value="{{ $k->id }}" {{ $d->objectjurusanfk == $k->id ? 'selected' : '' }}>
                                                                                                {{$k->jurusan}} ( {{ $k->kdjurusan }} )
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                {{-- </div> --}}
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="contact1" role="tabpanel" aria-labelledby="contact-tab">
                                            <div class="card-content">
                                                <div class="table-responsive">
                                                    <table class="table table-striped" id="table3">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama Pelajaran</th>
                                                                <th>Nilai KKM</th>
                                                                <th>Kelas</th>
                                                                <th>Jenis Mata Pelajaran</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $no = 1
                                                            @endphp
                                                            @foreach ($tkjxii as $d)
                                                            <tr>
                                                                <td>{{ $no++ }}</td>
                                                                <td>{{ $d->matapelajaran }}</td>
                                                                <td>{{ $d->nilaikkm }}</td>
                                                                <td>{{ $d->kelas }}</td>
                                                                <td>{{ $d->jenismatpel }}</td>
                                                                <td>
                                                                    {{-- <form id="delete-form-{{ $d->mpid }}" action="{{ route('mapel.hapusmapel', $d->mpid) }}" method="POST" style="display: inline;">
                                                                        @csrf
                                                                        @method('POST')
                                                                        <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data?');" class="btn btn-primary">
                                                                            Hapus
                                                                        </button> --}}
                                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $d->mpid }}">
                                                                            Edit
                                                                        </button>
                                                                    {{-- </form> --}}
                                                                </td>
                                                            </tr>

                                                            <div class="modal fade" id="editModal{{ $d->mpid }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $d->mpid }}" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="editModalLabel{{ $d->mpid }}">Edit Data Mata Pelajaran</h5>
                                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <form action="{{ route('mapel.updatemapel', $d->mpid) }}" method="POST">
                                                                            @csrf
                                                                            <div class="modal-body">
                                                                                {{-- <div class="form-group"> --}}
                                                                                    <label for="NameLengkap">Mata Pelajaran</label>
                                                                                    <input type="text" class="form-control" id="NameLengkap" name="matapelajaran" value="{{ $d->matapelajaran }}" >
                                                                                {{-- </div> --}}
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                {{-- <div class="form-group"> --}}
                                                                                    <label for="NameLengkap">Nilai KKM</label>
                                                                                    <input type="text" class="form-control" id="NameLengkap" name="nilaikkm" value="{{ $d->nilaikkm }}" >
                                                                                {{-- </div> --}}
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                {{-- <div class="form-group"> --}}
                                                                                    <label for="kelas{{ $d->mpid }}">Kelas</label>
                                                                                    <select class="form-control" id="kelas{{ $d->mpid }}" name="kelas" >
                                                                                        <option value="" selected>-- Pilih --</option>
                                                                                        @foreach ($kelas as $k)
                                                                                            <option value="{{ $k->id }}" {{ $d->objectkelasfk == $k->id ? 'selected' : '' }}>
                                                                                                {{ $k->kelas }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                {{-- </div> --}}
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                {{-- <div class="form-group"> --}}
                                                                                    <label for="kelas{{ $d->mpid }}">Jenis Mata Pelajaran</label>
                                                                                    <select class="form-control" id="kelas{{ $d->mpid }}" name="mapel" >
                                                                                        <option value="" selected>-- Pilih --</option>
                                                                                        @foreach ($jenismapel as $k)
                                                                                            <option value="{{ $k->id }}" {{ $d->objectjenismapelfk == $k->id ? 'selected' : '' }}>
                                                                                                {{ $k->jenismatpel }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                {{-- </div> --}}
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                {{-- <div class="form-group"> --}}
                                                                                    <label for="kelas{{ $d->mpid }}">Jurusan Mata Pelajaran</label>
                                                                                    <select class="form-control" id="kelas{{ $d->mpid }}" name="mapel" >
                                                                                        <option value="" selected>-- Pilih --</option>
                                                                                        @foreach ($jurusan as $k)
                                                                                            <option value="{{ $k->id }}" {{ $d->objectjurusanfk == $k->id ? 'selected' : '' }}>
                                                                                                {{$k->jurusan}} ( {{ $k->kdjurusan }} )
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                {{-- </div> --}}
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">
                                        Manajemen Perkantoran (MP)
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home2" role="tab"
                                                aria-controls="home" aria-selected="true">Kelas X ( Sepuluh )</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile2" role="tab"
                                                aria-controls="profile" aria-selected="false">Kelas XI ( Sebelas )</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact2" role="tab"
                                                aria-controls="contact" aria-selected="false">Kelas XII ( Dua Belas )</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="home2" role="tabpanel" aria-labelledby="home-tab">
                                            Coming Soon Menunggu Data
                                        </div>
                                        <div class="tab-pane fade" id="profile2" role="tabpanel" aria-labelledby="profile-tab">
                                            Coming Soon Menunggu Data
                                        </div>
                                        <div class="tab-pane fade" id="contact2" role="tabpanel" aria-labelledby="contact-tab">
                                            Coming Soon Menunggu Data
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">
                                        Usaha Layanan Pariwisata (ULP)
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home3" role="tab"
                                                aria-controls="home" aria-selected="true">Kelas X ( Sepuluh )</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile3" role="tab"
                                                aria-controls="profile" aria-selected="false">Kelas XI ( Sebelas )</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact3" role="tab"
                                                aria-controls="contact" aria-selected="false">Kelas XII ( Dua Belas )</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab">
                                            Coming Soon Menunggu Data
                                        </div>
                                        <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab">
                                            Coming Soon Menunggu Data
                                        </div>
                                        <div class="tab-pane fade" id="contact3" role="tabpanel" aria-labelledby="contact-tab">
                                            Coming Soon Menunggu Data
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">
                                        Broadcasting dan Perfilman (BP)
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home4" role="tab"
                                                aria-controls="home" aria-selected="true">Kelas X ( Sepuluh )</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile4" role="tab"
                                                aria-controls="profile" aria-selected="false">Kelas XI ( Sebelas )</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact4" role="tab"
                                                aria-controls="contact" aria-selected="false">Kelas XII ( Dua Belas )</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="home4" role="tabpanel" aria-labelledby="home-tab">
                                            Coming Soon Menunggu Data
                                        </div>
                                        <div class="tab-pane fade" id="profile4" role="tabpanel" aria-labelledby="profile-tab">
                                            Coming Soon Menunggu Data
                                        </div>
                                        <div class="tab-pane fade" id="contact4" role="tabpanel" aria-labelledby="contact-tab">
                                            Coming Soon Menunggu Data
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--login form Modal -->
        <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
            role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33"> Tambah Mata Pelajaran</h4>
                    <button type="button" class="close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="{{ route('mapel.action') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <label for="NameLengkap">Mata Pelajaran</label>
                        <div class="form-group">
                            <input class="form-control" id="NameLengkap" type="text" name="matapelajaran" placeholder="Mata Pelajaran"/>
                        </div>
                        <label for="nisn">Nilai KKM</label>
                        <div class="form-group">
                            <input class="form-control" id="nisn" type="text" name="nilaikkm" placeholder="Nilai KKM"/>
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
                        <label for="jrs">Jenis Mata Pelajaran</label>
                        <div class="form-group">
                            <select class="form-control" id="jrs" name="jurusan">
                                <option value="" selected>-- Pilih --</option>
                                @foreach ($jenismapel as $k)
                                    <option value="{{ $k->id }}">{{ $k->jenismatpel }} </option>
                                @endforeach
                            </select>
                        </div>
                        <label for="jrs">Jurusan Mata Pelajaran</label>
                        <div class="form-group">
                            <select class="form-control" id="jrs" name="jurusanmapel">
                                <option value="" selected>-- Pilih --</option>
                                @foreach ($jurusan as $k)
                                    <option value="{{ $k->id }}">{{ $k->jurusan }} ( {{$k->kdjurusan}} ) </option>
                                @endforeach
                            </select>
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

    </section>

    <script>
        var alertBox = document.getElementById('success-alert');

        setTimeout(function() {
            alertBox.style.display = 'none';
        }, 3000);
    </script>
@endsection
