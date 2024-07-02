<!DOCTYPE html>
<html>
<head>
    <title>Hasil Raport</title>
    <style>
        /* Add any custom styles you want for the PDF */
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Hasil Raport</h1>
    <table>
        <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Kelas</th>
            <th>Jurusan</th>
        </tr>
        {{-- <tr>
            <td>1</td>
            <td>{{ $siswa->namalengkap }}</td>
            <td>{{ $siswa->kelas }}</td>
            <td>{{ $siswa->jurusan }} ({{ $siswa->kdjurusan }})</td>
        </tr> --}}
    </table>
</body>
</html>
