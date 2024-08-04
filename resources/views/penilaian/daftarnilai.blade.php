@extends('master')

@section('content')
    <section class="section">
        <div class="row" id="table-head">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Daftar Nilai Siswa</h4>
                        @if (session('success'))
                            <div class="alert alert-success" id="success-alert">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                    {{-- <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                @foreach($nilai as $n)
                                    <div class="col-sm-4">
                                        <h6 style="text-align: center;">Mata Pelajaran</h6>
                                        <input type="hidden" name="id" value="{{ $n->id }}">
                                        <input class="form-control" type="text" value="{{ $n->matapelajaran }}" disabled>
                                    </div>
                                    <div class="col-sm-4">
                                        <h6 style="text-align: center;">Nilai</h6>
                                        <input class="form-control" type="number" value="{{ $n->nilai }}">
                                    </div>
                                    <div class="col-sm-4">
                                        <h6 style="text-align: center;">Keterangan</h6>
                                        <input class="form-control" type="text" value="{{ $n->ket }}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                </div>
                                <div class="col-sm-4">
                                </div>
                                <div class="col-sm-4" align="right">
                                    <button type="button" class="btn btn-primary btn-lg" >Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('penilaian.action') }}" method="POST">
                                @csrf
                                @foreach($nilai as $n)
                                <div class="row">
                                    <input type="hidden" name="hrid[]" value="{{ $n->hrid }}">
                                    <div class="col-sm-4">
                                        <h6 style="text-align: center;">Mata Pelajaran</h6>
                                        <input class="form-control" type="text" value="{{ $n->matapelajaran }}" disabled>
                                    </div>
                                    <div class="col-sm-2">
                                        <h6 style="text-align: center;">Nilai KKM</h6>
                                        <input class="form-control" type="text" value="{{ $n->nilaikkm }}" disabled>
                                    </div>
                                    <div class="col-sm-2">
                                        <h6 style="text-align: center;">Nilai</h6>
                                        <input class="form-control" type="number" name="nilai[]" value="{{ $n->nilai }}">
                                    </div>
                                    <div class="col-sm-4">
                                        <h6 style="text-align: center;">Keterangan</h6>
                                        {{-- <input class="form-control" type="text" name="ket[]" value="{{ $n->ket }}"> --}}
                                        <select class="form-control" name="ket[]">
                                            <option value="-" {{ $n->ket == '-' ? 'selected' : '' }}>--pilih--</option>
                                            <option value="Kompeten" {{ $n->ket == 'Kompeten' ? 'selected' : '' }}>Kompeten</option>
                                            <option value="Lulus Cukup" {{ $n->ket == 'Lulus Cukup' ? 'selected' : '' }}>Lulus Cukup</option>
                                            <option value="Cukup" {{ $n->ket == 'Cukup' ? 'selected' : '' }}>Cukup</option>
                                        </select>
                                    </div>
                                </div>
                                @endforeach

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                        </div>
                                        <div class="col-sm-4">
                                        </div>
                                        <div class="col-sm-4" align="right">
                                            <button type="submit" class="btn btn-primary btn-lg">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>


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
