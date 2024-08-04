<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .letterhead {
            width: 100%;
            border-bottom: 2px solid #000;
            margin-bottom: 20px;
            padding-bottom: 10px;
            display: flex;
            align-items: center;
        }
        .logo {
            width: 100px;
            margin-right: 20px;
        }
        .header-text {
            text-align: center;
            font-size: 18px;
            line-height: 1.5;
            flex-grow: 1;
        }
        .content {
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            /* border: 1px solid black; */
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="letterhead">
        <img src="{{ asset('dist/assets/static/images/logo/logosmk.png') }}" alt="Logo" class="logo">
        <div class="header-text">
            <strong>SMK AL AMANAH</strong><br>
            Jl. Cibogo, Cangkuang Kulon, Kec. Dayeuhkolot, Kabupaten Bandung, Jawa Barat 40239<br>
            Email: <a href="">smkalamanah@smkbisa.com</a>
        </div>
        <img src="{{ asset('dist/assets/static/images/logo/kemendikbud.png') }}" alt="Logo" class="logo">

    </div>

    <div class="content">
        <h2 align="left">Identitas Siswa</h2>

        <fieldset>
            <table style="border: none;">
                <tr>
                    <td width="15%">
                        <span class="text-normal">Nama Peserta Didik</span>
                    </td>
                    <td width="35%">
                        <span class="text-normal">:
                            {{ $nilai[0]->namalengkap }}</span>
                    </td>

                    <td width="15%">
                        <span class="text-normal">NIS / NISN</span>
                    </td>
                    <td width="35%">
                        <span class="text-normal">:
                            {{ $nilai[0]->nisn }}</span>
                    </td>
                </tr>
                <tr>
                    <td width="15%">
                        <span class="text-normal">Bidang Studi Keahlian</span>
                    </td>
                    <td width="35%">
                        <span class="text-normal">:
                            {{ $nilai[0]->bidangjurusan }}</span>
                    </td>

                    <td width="15%">
                        <span class="text-normal">Kelas / Semester</span>
                    </td>
                    <td width="35%">
                        <span class="text-normal">:
                            {{ $nilai[0]->kelas }} / {{ $nilai[0]->semester }}</span>
                    </td>
                </tr>
                <tr>
                    <td width="15%">
                        <span class="text-normal">Kompetensi Keahlian</span>
                    </td>
                    <td width="35%">
                        <span class="text-normal">:
                            {{ $nilai[0]->jurusan }}</span>
                    </td>

                    <td width="15%">
                        <span class="text-normal">Tahun</span>
                    </td>
                    <td width="35%">
                        <span class="text-normal">:
                            {{ $nilai[0]->tahunajaran }}</span>
                    </td>
                </tr>
            </table>
        </fieldset>


        <h2 align="left">Daftar Hasil Siswa</h2>

        <table border="1">
            <thead>
                <tr>
                    <th>MataPelajaran</th>
                    <th>KKM</th>
                    <th>Nilai</th>
                    <th>Terbilang</th>
                    <th>Ketercapaian Kompetensi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalNilai = 0;
                    $jumlahMataPelajaran = count($nilai);
                @endphp
                @foreach($nilai as $n)
                @php
                    $totalNilai += $n->nilai;
                @endphp
                <tr>
                    <td>{{ $n->matapelajaran }}</td>
                    <td>{{ $n->nilaikkm }}</td>
                    <td>{{ $n->nilai }}</td>
                    <td>{{ $n->nilai_terbilang }}</td>
                    <td>{{ $n->ket }}</td>
                </tr>
                @endforeach
                @php
                    $rataRataNilai = $jumlahMataPelajaran > 0 ? $totalNilai / $jumlahMataPelajaran : 0;
                    $rataRataNilaiFormatted = number_format($rataRataNilai, 1);
                    $rataRataNilaiTerbilang = $terbilang($rataRataNilaiFormatted);
                @endphp
                <tr>
                    <td colspan="2">Rata-Rata Nilai</td>
                    <td colspan="1">{{ $rataRataNilaiFormatted }}</td>
                    <td colspan="2">{{ $rataRataNilaiTerbilang }}</td>
                </tr>
            </tbody>
        </table>


        <h2 align="left">Ketidakhadiran</h2>

        {{-- <br> --}}
        {{-- <h3> Ketidakhadiran</h3> --}}
        <table border="1">
            <thead>
                <tr>
                    <th>Sakit</th>
                    <th>Izin</th>
                    <th>Tanpa Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kehadiran as $n)
                <tr>
                    <td>{{ $n->sakit }} Hari</td>
                    <td>{{ $n->izin }} Hari</td>
                    <td>{{ $n->tanpa_keterangan }} Hari</td>
                </tr>
                @endforeach

            </tbody>
        </table>
        <br>
    </div>
</body>
</html>
