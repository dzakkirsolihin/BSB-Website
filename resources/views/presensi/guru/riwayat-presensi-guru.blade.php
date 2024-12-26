<x-presensi-layout>
    <div class="container">
        <div class="text-center my-4">
            <h1 class="text-center inter-font text-primary-custom mb-5">Riwayat Presensi Bulan {{ Carbon\Carbon::now()->isoFormat('MMMM Y') }}</h1>
        </div>

        <div class="table-responsive">
            <table class="table custom-table">
                <thead>
                    <tr>
                        <th>Hari/Tanggal</th>
                        <th>Jam Masuk</th>
                        <th>Jam Pulang</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($riwayatPresensiGuru as $presensi)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($presensi->created_at)->isoFormat('dddd[/]D MMMM Y', 'id') }}</td>
                            <td>{{ $presensi->jam_datang ?? '-' }}</td>
                            <td>{{ $presensi->jam_pulang ?? '-' }}</td>
                            <td>{{ $presensi->status_kehadiran }}</td>
                            <td>{{ $presensi->keterangan ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Belum ada riwayat presensi bulan ini</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="d-flex justify-content-center mt-4">
            {{ $riwayatPresensiGuru->links('pagination::bootstrap-5') }}
        </div>
    </div>
</x-presensi-layout>