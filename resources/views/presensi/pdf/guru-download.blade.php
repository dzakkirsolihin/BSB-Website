<!DOCTYPE html>
<html>

@php
    $hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

    // Collect all unique dates from presensi data
    $dates = collect();
    foreach ($allTeachersData as $teacherData) {
        $dates = $dates->concat(collect($teacherData['presensiData'])->pluck('tanggal'));
    }
    $dates = $dates->unique()->sort()->values();
@endphp

<head>
    <meta charset="utf-8">
    <title>Laporan Presensi Guru</title>
    <style>
        @page {
            size: A4 landscape;
            margin: 20px;
            /* Reduced margin */
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            font-size: 10px;
            /* Reduced font size */
        }

        h1,
        h2,
        p {
            text-align: center;
            color: #333;
            margin-bottom: 15px;
            /* Reduced margin */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
            /* Reduced margin */
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 6px;
            /* Reduced padding */
            text-align: center;
            font-size: 10px;
            /* Reduced font size */
        }

        th {
            background-color: #f5f5f5;
        }

        .text-center {
            text-align: center;
        }

        .badge {
            padding: 3px 6px;
            /* Reduced padding */
            border-radius: 4px;
            font-size: 9px;
            /* Reduced font size */
            color: white;
        }

        .badge-success {
            background-color: #198754;
        }

        .badge-warning {
            background-color: #ffc107;
            color: #000;
        }

        .badge-danger {
            background-color: #dc3545;
        }

        .badge-info {
            background-color: #0dcaf0;
            color: #000;
        }

        .keterangan {
            margin-top: 15px;
            /* Reduced margin */
            font-size: 10px;
            /* Reduced font size */
        }
    </style>
</head>

<body>
    <h1>Rekapitulasi Absensi Guru {{ $kelas }} Duta Firdaus</h1>
    <h2>Tahun Ajaran 2024-2025</h2>
    <p>Bulan: {{ Carbon\Carbon::createFromFormat('m', $month)->format('F') }} {{ $year }}</p>

    @if (empty($allTeachersData))
        <p class="text-center">Tidak ada data presensi yang tersedia untuk bulan ini.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th rowspan="2" class="align-middle">Tanggal</th>
                    <th rowspan="2" class="align-middle">Hari</th>
                    @foreach ($allTeachersData as $teacherData)
                        <th colspan="4" class="align-middle">{{ $teacherData['guru']->nama_guru }}</th>
                    @endforeach
                </tr>
                <tr>
                    @foreach ($allTeachersData as $teacherData)
                        <th>JD</th>
                        <th>JP</th>
                        <th>SK</th>
                        <th>Ket</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($dates as $date)
                    @php
                        $currentDate = Carbon\Carbon::createFromFormat('d-m-Y', $date);
                        $isWeekend = $currentDate->isWeekend();
                    @endphp
                    <tr @if ($isWeekend) style="background-color: #f8f9fa;" @endif>
                        <td>{{ $currentDate->format('d') }}</td>
                        <td>{{ $hari[$currentDate->dayOfWeek] }}</td>
                        @foreach ($allTeachersData as $teacherData)
                            @php
                                $presensi = collect($teacherData['presensiData'])->first(function ($item) use ($date) {
                                    return $item['tanggal'] === $date;
                                });
                            @endphp
                            @if ($presensi)
                                <td>{{ \Carbon\Carbon::parse($presensi['jam_masuk'])->format('H:i') ?? '-' }}</td>
                                <td>{{ \Carbon\Carbon::parse($presensi['jam_pulang'])->format('H:i') ?? '-' }}</td>
                                <td>
                                    @if (isset($presensi['kehadiran']))
                                        <span class="badge {{ $presensi['kehadiran'] === 'Hadir' ? 'badge-success' : ($presensi['kehadiran'] === 'Izin' ? 'badge-warning' : ($presensi['kehadiran'] === 'Sakit' ? 'badge-info' : 'badge-danger')) }}">
                                            {{ $presensi['kehadiran'] }}
                                        </span>
                                    @else
                                        <span class="badge badge-danger">Tanpa Keterangan</span>
                                    @endif
                                </td>
                                <td>{{ $presensi['keterangan'] ?? '-' }}</td>
                            @else
                                <td colspan="4" class="text-center">
                                    <span class="badge badge-danger">Tidak Ada Data</span>
                                </td>
                            @endif
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <div class="keterangan">
        <div style="float: left; width: 50%;">
            <h5>Keterangan:</h5>
            <ul style="list-style-type: none; padding-left: 0;">
                <li>JD: Jam Datang</li>
                <li>JP: Jam Pulang</li>
                <li>SK: Status Kehadiran</li>
            </ul>
        </div>
        <div style="float: right; width: 50%;">
            <h5>Status Kehadiran:</h5>
            <ul style="list-style-type: none; padding-left: 0;">
                <li style="margin-bottom: 5px;"><span class="badge badge-success">Hadir</span></li>
                <li style="margin-bottom: 5px;"><span class="badge badge-warning">Izin</span></li>
                <li style="margin-bottom: 5px;"><span class="badge badge-danger">Tanpa Keterangan</span></li>
                <li style="margin-bottom: 5px;"><span class="badge badge-info">Sakit</span></li>
            </ul>
        </div>
    </div>
</body>

</html>
