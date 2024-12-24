<x-layout-admin>
  <div class="container">
      <div class="text-center my-4">
          <h1 class="inter-font text-primary-custom mb-5">Kelola Murid Bestari</h1>
      </div>
      
      @php
          $students = [
              ['id' => 1, 'nama' => 'Aisyah Binti Abdullah Al-Muhajir', 'jk' => 'Perempuan', 'kelas' => 'Bestari'],
                          ['id' => 2, 'nama' => 'Bagas Pratama Wijaya Kusuma', 'jk' => 'Laki-laki', 'kelas' => 'Bestari'],
                          ['id' => 3, 'nama' => 'Bima Sakti Ananda Putra', 'jk' => 'Laki-laki', 'kelas' => 'Bestari'],
                          ['id' => 4, 'nama' => 'Dina Amalia Sari Dewi', 'jk' => 'Perempuan', 'kelas' => 'Bestari'],
                          ['id' => 5, 'nama' => 'Fajar Nugroho Santoso', 'jk' => 'Laki-laki', 'kelas' => 'Bestari'],
                          ['id' => 6, 'nama' => 'Laras Ayu Permata Sari', 'jk' => 'Perempuan', 'kelas' => 'Bestari'],
                          ['id' => 7, 'nama' => 'Nayla Putri Maharani', 'jk' => 'Perempuan', 'kelas' => 'Bestari'],
                          ['id' => 8, 'nama' => 'Putri Ananda Dewi Sari', 'jk' => 'Perempuan', 'kelas' => 'Bestari'],
                          ['id' => 9, 'nama' => 'Salsabila Nurul Hidayah', 'jk' => 'Perempuan', 'kelas' => 'Bestari'],
                          ['id' => 10, 'nama' => 'Zidan Alif Ramadhan', 'jk' => 'Laki-laki', 'kelas' => 'Bestari'],
          ];
      @endphp

      <x-tabel-kelola-murid :students="$students" kelas="Bestari" />
      <x-edit-murid-modal kelas="Bestari" />
      <x-script-kelola-murid kelas="Bestari" />
  </div>
</x-layout-admin>