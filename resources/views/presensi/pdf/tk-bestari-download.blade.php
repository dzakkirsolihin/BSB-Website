<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Presensi {{ $kelas }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f5f5f5;
        }

        .footer {
            margin-top: 50px;
            text-align: right;
        }

        .signature-line {
            margin-top: 80px;
            border-top: 1px solid #000;
            width: 200px;
            display: inline-block;
        }
    </style>
</head>
@props(['kelas', 'routeName', 'presensiData'])

<body>
    <h1>Laporan Presensi Kelas {{ $kelas }}</h1>
    <p style="text-align: center; margin-bottom: 30px;">{{ $tanggal }}</p>

    <table>
        <thead>
            <tr>
                <th style="width: 10%">No</th>
                <th style="width: 40%">Nama</th>
                <th style="width: 25%">Kehadiran</th>
                <th style="width: 25%">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($presensiData as $index => $siswa)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $siswa['nama'] }}</td>
                    <td>{{ $siswa['kehadiran'] }}</td>
                    <td>{{ $siswa['keterangan'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <x-ttd-laporan />
</body>

</html>
