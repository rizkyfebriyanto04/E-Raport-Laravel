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
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pelajaran</th>
                                    <th>Nilai KKM</th>
                                    <th>Kelas</th>
                                    <th>Jenis Mata Pelajaran</th>
                                    <th>Aksi</th>
                                    {{-- <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Stok</th> --}}
                                    {{-- <th>Tanggal Kadaluarsa</th> --}}
                                </tr>
                                @php
                                    $no = 1
                                @endphp
                                @foreach ($data as $d)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $d->matapelajaran }}</td>
                                    <td>{{ $d->nilaikkm }}</td>
                                    <td>{{ $d->kelas }}</td>
                                    <td>{{ $d->jenismatpel }}</td>
                                    <td>
                                        <form id="delete-form-{{ $d->id }}" action="{{ route('guru.hapusguru', $d->id) }}" method="POST" style="display: inline;">
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
        aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
            role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33"> Tambah Data Guru</h4>
                    <button type="button" class="close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="{{ route('guru.action') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <label for="NameLengkap">Mata Pelajaran</label>
                        <div class="form-group">
                            <input class="form-control" id="NameLengkap" type="text" name="matapelajaran" placeholder="Mata Pelajaran"/>
                        </div>
                        <label for="nisn">Nilai KKM</label>
                        <div class="form-group">
                            <input class="form-control" id="nisn" type="text" name="nisn" placeholder="Nilai KKM"/>
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
    <div class="modal fade" id="editModal{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $d->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel{{ $d->id }}">Edit Data Guru</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('mapel.updatemapel', $d->id) }}" method="POST">
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
                            <label for="kelas{{ $d->id }}">Kelas</label>
                            <select class="form-control" id="kelas{{ $d->id }}" name="kelas" >
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
                            <label for="kelas{{ $d->id }}">Jenis Mata Pelajaran</label>
                            <select class="form-control" id="kelas{{ $d->id }}" name="mapel" >
                                <option value="" selected>-- Pilih --</option>
                                @foreach ($jenismapel as $k)
                                    <option value="{{ $k->id }}" {{ $d->objectjenismapelfk == $k->id ? 'selected' : '' }}>
                                        {{ $k->jenismatpel }}
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
    </section>

    <script>
        var alertBox = document.getElementById('success-alert');

        setTimeout(function() {
            alertBox.style.display = 'none';
        }, 3000);
    </script>
@endsection
