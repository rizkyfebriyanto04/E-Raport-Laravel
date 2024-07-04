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
        <h2 align="center">Daftar Nilai Siswa</h2>

        <fieldset>
            <table style="border: none;">
                <tr>
                    <td width="15%">
                        <span class="text-normal">Nama Lengkap</span>
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
                        <span class="text-normal">Kelas</span>
                    </td>
                    <td width="35%">
                        <span class="text-normal">:
                            {{ $nilai[0]->kelas }}</span>
                    </td>

                    <td width="15%">
                        <span class="text-normal">Semester</span>
                    </td>
                    <td width="35%">
                        <span class="text-normal">:
                            {{ $nilai[0]->semester }}</span>
                    </td>
                </tr>
                <tr>
                    <td width="15%">
                        <span class="text-normal">Jurusan</span>
                    </td>
                    <td width="35%">
                        <span class="text-normal">:
                            {{ $nilai[0]->jurusan }} ( {{ $nilai[0]->kdjurusan }} ) </span>
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


        <br>
        <table border="1">
            <thead>
                <tr>
                    <th>MataPelajaran</th>
                    <th>Nilai KKM</th>
                    <th>Nilai</th>
                    <th>Terbilang</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($nilai as $n)
                <tr>
                    <td>{{ $n->matapelajaran }}</td>
                    <td>{{ $n->nilaikkm }}</td>
                    <td>{{ $n->nilai }}</td>
                    {{-- <td>{{ $n->terbilang }}</td> --}}
                    <td>{{ $n->nilai_terbilang }}</td>
                    <td>{{ $n->ket }}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</body>
</html>
