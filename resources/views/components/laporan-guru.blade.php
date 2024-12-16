<x-layout-admin>
    <div class="container">
        <h1 class="text-center inter-font text-primary-custom mb-5" style="font-size: 32px;">
            Rekapitulasi Absensi Guru {{ $kelas }} Duta Firdaus <br> Tahun Ajaran 2024-2025
        </h1>

        <div class="d-flex justify-content-center my-4">
            <div class="mx-2">
                <label for="bulan">Bulan:</label>
                <select id="bulan" class="form-select" onchange="updateAbsensiTable()">
                    <option value="" disabled selected>Pilih Bulan...</option>
                    <option value="Januari">Januari</option>
                    <option value="Februari">Februari</option>
                    <option value="Maret">Maret</option>
                    <option value="April">April</option>
                    <option value="Mei">Mei</option>
                    <option value="Juni">Juni</option>
                    <option value="Juli">Juli</option>
                    <option value="Agustus">Agustus</option>
                    <option value="September">September</option>
                    <option value="Oktober">Oktober</option>
                    <option value="November">November</option>
                    <option value="Desember">Desember</option>
                </select>
            </div>
        </div>

        <div class="container my-4" id="absensi-table" style="display: none;">
            <table class="table table-bordered table-striped w-75 mx-auto">
                <thead class="text-center">
                    <tr>
                        <th rowspan="2" class="align-middle">TGL</th>
                        <th colspan="6" class="align-middle">EUIS KARTIKA</th>
                    </tr>
                    <tr>
                        <th>JD</th>
                        <th>JP</th>
                        <th>SK</th>
                        <th>Keterangan</th>
                        <th>Koordinat</th>
                        <th>Foto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($presensiData as $data)
                        <tr>
                            <td class="text-center">{{ $data['tanggal'] }}</td>
                            <td>{{ $data['jam_datang'] }}</td>
                            <td>{{ $data['jam_pulang'] }}</td>
                            <td>{{ $data['status_kehadiran'] }}</td>
                            <td>{{ $data['keterangan'] }}</td>
                            <td>{{ $data['koordinat'] }}</td>
                            <td><img src="{{ $data['foto'] }}" alt="Foto" style="width: 50px; height: auto;"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <x-ttd-laporan />
            <x-download-button />
        </div>

        <script>
            function updateAbsensiTable() {
                const bulan = document.getElementById('bulan').value;
                const absensiTable = document.getElementById('absensi-table');

                if (bulan) {
                    absensiTable.style.display = 'block';
                } else {
                    absensiTable.style.display = 'none';
                }
            }
        </script>
    </div>
</x-layout-admin>