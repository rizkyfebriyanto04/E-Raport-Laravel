@extends('master')

@section('content')
    <section class="section">
        <section class="basic-choices">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Input Kehadiran Siswa</h4>
                            <div class="alert alert-success" id="success-alert" style="display: none;">
                                Data berhasil di update
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 mb-12">
                                        <h6>Cari Siswa</h6>
                                        <div class="form-group">
                                            <select class="choices form-select" onchange="siswa()" id="siswa-select">
                                                <option selected>--Pilih--</option>
                                                @foreach ($siswa as $s)
                                                    <option value="{{ $s->id }}">{{ $s->nisn }} | {{ $s->namalengkap }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card" id="card-kehadiran" style="display: none;">
                        <div class="card-header">
                            <h4 class="card-title">Daftar Kehadiran Siswa</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <h6 style="text-align: center;">Sakit</h6>
                                        <input id="sakit-input" class="form-control" type="number" placeholder="Sakit">
                                    </div>
                                    <div class="col-sm-4">
                                        <h6 style="text-align: center;">Izin</h6>
                                        <input id="izin-input" class="form-control" type="number" placeholder="Izin">
                                    </div>
                                    <div class="col-sm-4">
                                        <h6 style="text-align: center;">Tanpa Keterangan</h6>
                                        <input id="tanpa-keterangan-input" class="form-control" type="number" placeholder="Tanpa Kehadiran">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                    </div>
                                    <div class="col-sm-4">
                                    </div>
                                    <div class="col-sm-4" align="right">
                                        <button type="button" class="btn btn-primary btn-lg" onclick="updateKehadiran()">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </div>
    </section>

    <script>

        function siswa() {
            const siswaSelect = document.getElementById('siswa-select');
            const siswaId = siswaSelect.value;
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const cardKehadiran = document.getElementById('card-kehadiran');

            if (siswaId !== "--Pilih--") {
                cardKehadiran.style.display = 'block';
                const formData = new FormData();
                formData.append('siswaId', siswaId);

                fetch('/kehadiran', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    // Assuming you want to show the first record
                    if (data.length > 0) {
                        document.getElementById('sakit-input').value = data[0].sakit;
                        document.getElementById('izin-input').value = data[0].izin;
                        document.getElementById('tanpa-keterangan-input').value = data[0].tanpaKeterangan;
                    }
                })
                .catch(error => console.error('Error fetching attendance:', error));
            }else{
                cardKehadiran.style.display = 'none';
            }
        }

        function updateKehadiran() {
            const siswaSelect = document.getElementById('siswa-select');
            const siswaId = siswaSelect.value;
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            const sakit = document.getElementById('sakit-input').value;
            const izin = document.getElementById('izin-input').value;
            const tanpaKeterangan = document.getElementById('tanpa-keterangan-input').value;

            const data = {
                siswaId: siswaId,
                sakit: sakit,
                izin: izin,
                tanpaKeterangan: tanpaKeterangan
            };

            fetch('/updateKehadiran', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify(data)
            })
            .then(response => {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error('Network response was not ok.');
                }
            })
            .then(data => {
                console.log('Data saved successfully:', data);
                // alert('Success: ' + data.message);
                const successAlert = document.getElementById('success-alert');
                successAlert.textContent = 'Data berhasil diupdate'; // Set sesuai dengan kebutuhan pesan Anda
                successAlert.style.display = 'block';

                setTimeout(function() {
                    successAlert.style.display = 'none';
                }, 3000);

                siswa();
            })
            .catch(error => {
                console.error('Error saving attendance:', error);
                alert('Error: ' + error.message);
            });
        }

    </script>
@endsection
