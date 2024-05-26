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
                        <h4 class="card-title">Data Master Guru</h4>
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
                                    <th>Nama guru</th>
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
                                    <td>{{ $d->namalengkap }}</td>
                                    <td>
                                        <form id="delete-form-{{ $d->id }}" action="{{ route('guru.hapusguru', $d->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('POST')
                                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data?');" style="border: none; background-color: transparent;">
                                                <i class="badge-circle badge-circle-light-secondary font-medium-1" data-feather="trash"></i>
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
                    <h4 class="modal-title" id="myModalLabel33"></h4>
                    <button type="button" class="close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="{{ route('guru.action') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        {{-- <label for="kategori">Kategori Produk <span class="text-danger">*</span></label>
                        <div class="form-group">
                            <select class="form-control" id="kategori" name="position_id">
                                <option value="" selected>-- Pilih --</option>
                                @foreach ($kategori as $k)
                                   <option value="{{ $k->id }}">{{ $k->namakategori }}</option>
                                @endforeach
                             </select>
                        </div> --}}
                        <label for="NameLengkap">Nama Lengkap <span class="text-danger">*</span></label>
                        <div class="form-group">
                            <input class="form-control" id="NameLengkap" type="text" name="namalengkap" placeholder="Nama Lengkap"/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary"
                            data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
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
@endsection
