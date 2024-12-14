<x-layout-presensi>
  <div class="container">
      <div class="text-center my-4">
          <h1 class="text-center inter-font text-primary-custom mb-5">Riwayat Presensi Guru</h1>
      </div>
      <div class="table-responsive">
        <table class="table custom-table">
          <thead>
            <tr>
              <th>Hari/Tanggal</th>
              <th>Jam Masuk</th>
              <th>Jam Pulang</th>
            </tr>
          </thead>
          <tbody>
            @php
            $presensi = [
                ['tanggal' => 'Jumat/12 Oktober 2024', 'jam_masuk' => '07:00', 'jam_pulang' => '17:00'],
                ['tanggal' => 'Kamis/11 Oktober 2024', 'jam_masuk' => '07:00', 'jam_pulang' => '17:00'],
                ['tanggal' => 'Rabu/10 Oktober 2024', 'jam_masuk' => '07:00', 'jam_pulang' => '17:00'],
                ['tanggal' => 'Selasa/09 Oktober 2024', 'jam_masuk' => '07:00', 'jam_pulang' => '17:00'],
                ['tanggal' => 'Senin/08 Oktober 2024', 'jam_masuk' => '07:00', 'jam_pulang' => '17:00'],
                ['tanggal' => 'Jumat/05 Oktober 2024', 'jam_masuk' => '07:00', 'jam_pulang' => '17:00'],
                ['tanggal' => 'Kamis/04 Oktober 2024', 'jam_masuk' => '07:00', 'jam_pulang' => '17:00'],
                ['tanggal' => 'Rabu/03 Oktober 2024', 'jam_masuk' => '07:00', 'jam_pulang' => '17:00'],
                ['tanggal' => 'Selasa/02 Oktober 2024', 'jam_masuk' => '07:00', 'jam_pulang' => '17:00'],
                ['tanggal' => 'Senin/01 Oktober 2024', 'jam_masuk' => '07:00', 'jam_pulang' => '17:00'],
            ];
            @endphp
            @foreach ($presensi as $data)
            <tr>
              <td>{{ $data['tanggal'] }}</td>
              <td>{{ $data['jam_masuk'] }}</td>
              <td>{{ $data['jam_pulang'] }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
</x-layout-presensi>
