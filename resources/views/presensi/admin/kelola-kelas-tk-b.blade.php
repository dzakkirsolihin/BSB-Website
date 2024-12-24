<x-layout-admin>
  <div class="container">
      <div class="text-center my-4">
          <h1 class="inter-font text-primary-custom mb-5">Kelola Murid TK B</h1>
      </div>
      
      @php
          $students = [
              ['id' => 1, 'nama' => 'Aisyah Binti Abdullah Al-Muhajir', 'jk' => 'Perempuan', 'kelas' => 'TK B'],
                          ['id' => 2, 'nama' => 'Bagas Pratama Wijaya Kusuma', 'jk' => 'Laki-laki', 'kelas' => 'TK B'],
                          ['id' => 3, 'nama' => 'Bima Sakti Ananda Putra', 'jk' => 'Laki-laki', 'kelas' => 'TK B'],
                          ['id' => 4, 'nama' => 'Dina Amalia Sari Dewi', 'jk' => 'Perempuan', 'kelas' => 'TK B'],
                          ['id' => 5, 'nama' => 'Fajar Nugroho Santoso', 'jk' => 'Laki-laki', 'kelas' => 'TK B'],
                          ['id' => 6, 'nama' => 'Laras Ayu Permata Sari', 'jk' => 'Perempuan', 'kelas' => 'TK B'],
                          ['id' => 7, 'nama' => 'Nayla Putri Maharani', 'jk' => 'Perempuan', 'kelas' => 'TK B'],
                          ['id' => 8, 'nama' => 'Putri Ananda Dewi Sari', 'jk' => 'Perempuan', 'kelas' => 'TK B'],
                          ['id' => 9, 'nama' => 'Salsabila Nurul Hidayah', 'jk' => 'Perempuan', 'kelas' => 'TK B'],
                          ['id' => 10, 'nama' => 'Zidan Alif Ramadhan', 'jk' => 'Laki-laki', 'kelas' => 'TK B'],
          ];
      @endphp

      <x-tabel-kelola-murid :students="$students" kelas="TK B" />
      <x-edit-murid-modal kelas="TK B" />
      <x-script-kelola-murid kelas="TK B" />
  </div>
</x-layout-admin>