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
                        <h4 class="card-title">Daftar Akun</h4>
                        @if (session('success'))
                            <div class="alert alert-success" id="success-alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger" id="success-alert">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama </th>
                                        <th>Email/Username</th>
                                        <th>Role</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1
                                    @endphp
                                    @foreach ($data as $d)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $d->name }}</td>
                                        <td>{{ $d->email }}</td>
                                        <td>{{ $d->role }}</td>
                                        <td>
                                            <form id="delete-form-{{ $d->id }}" action="{{ route('registrasi.hapusregistrasi', $d->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('POST')
                                                <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data?');" class="btn btn-primary">
                                                    Hapus
                                                </button>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $d->id }}">
                                                    Edit
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="editModal{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $d->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel{{ $d->id }}">Edit Data Akun</h5>
                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('registrasi.updateregistrasi', $d->id) }}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="name">Nama Lengkap</label>
                                                            <input type="text" class="form-control" id="NameLengkap" name="namalengkap" value="{{ $d->name }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="Email">Email</label>
                                                            <input type="email" class="form-control" id="Email" name="email" value="{{ $d->email }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="Email">Role</label>
                                                            {{-- <input type="email" class="form-control" id="Email" name="role" value="{{ $d->role }}" required> --}}
                                                            <fieldset class="form-group">
                                                                <select class="form-select" id="basicSelect" name="role">
                                                                    <option value="" disabled>-- Pilih --</option>
                                                                    <option value="siswa" {{ $d->role == 'siswa' ? 'selected' : '' }}>Siswa</option>
                                                                    <option value="guru" {{ $d->role == 'guru' ? 'selected' : '' }}>Guru</option>
                                                                    <option value="orangtua" {{ $d->role == 'orangtua' ? 'selected' : '' }}>Orangtua</option>
                                                                </select>
                                                            </fieldset>
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
                                    @endforeach
                                </tbody>
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
                    <h4 class="modal-title" id="myModalLabel33"> Tambah Data Akun</h4>
                    <button type="button" class="close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="{{ route('registrasi.action') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <label for="NameLengkap">Nama Lengkap</label>
                        <div class="form-group">
                            <input class="form-control" id="NameLengkap" type="text" name="name" placeholder="Nama Lengkap"/>
                        </div>
                        <label for="email">Email</label>
                        <div class="form-group">
                            <input class="form-control" id="email" type="email" name="email" placeholder="Email"/>
                        </div>
                        <label for="role">Role</label>
                        <fieldset class="form-group">
                            <select class="form-select role-select" name="role">
                                <option selected>-- Pilih --</option>
                                <option value="siswa">Siswa</option>
                                <option value="guru">Guru</option>
                                <option value="orangtua">Orangtua</option>
                            </select>
                        </fieldset>


                        <label for="password">Password</label>
                        <div class="form-group">
                            <input type="password" id="password-horizontal" class="form-control" name="password" placeholder="Password">
                        </div>

                        <div id="additional-combobox1" style="display: none;">
                            <label for="objectsiswafk">Siswa</label>
                            <fieldset class="form-group">
                                <select class="choices form-select" id="additionalSelect1" name="objectsiswafk">
                                    <option selected>--Pilih--</option>
                                    @foreach ($siswa as $s)
                                        <option value="{{ $s->id }}">{{ $s->nisn }} | {{ $s->namalengkap }}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>

                        <div id="additional-combobox3" style="display: none;">
                            <label for="objectgurufk">Guru</label>
                            <fieldset class="form-group">
                                <select class="choices form-select" id="additionalSelect3" name="objectgurufk">
                                    <option selected>--Pilih--</option>
                                    @foreach ($guru as $g)
                                        <option value="{{ $g->id }}">{{ $g->namalengkap }}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>

                        {{-- <label for="kategori">Kategori Produk <span class="text-danger">*</span></label>
                        <div class="form-group">
                            <select class="form-control" id="kategori" name="position_id">
                                <option value="" selected>-- Pilih --</option>
                                @foreach ($kategori as $k)
                                <option value="{{ $k->id }}">{{ $k->namakategori }}</option>
                                @endforeach
                            </select>
                        </div> --}}

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.role-select').change(function() {
                var selectedRole = $(this).val();

                if (selectedRole === 'siswa' || selectedRole === 'orangtua') {
                    $('#additional-combobox1').show();  // Tampilkan dropdown Siswa
                    $('#additional-combobox3').hide();  // Sembunyikan dropdown Guru
                } else if (selectedRole === 'guru') {
                    $('#additional-combobox1').hide();  // Sembunyikan dropdown Siswa
                    $('#additional-combobox3').show();  // Tampilkan dropdown Guru
                } else {
                    $('#additional-combobox1').hide();
                    $('#additional-combobox3').hide();
                }
            });
        });

    </script>

@endsection

