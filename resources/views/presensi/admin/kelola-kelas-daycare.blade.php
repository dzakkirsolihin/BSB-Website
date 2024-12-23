<x-layout-admin>
  <div class="container">
      <!-- Judul Halaman -->
      <div class="text-center my-4">
          <h1 class="inter-font text-primary-custom mb-5">Kelola Murid DayCare</h1>
      </div>
      
      <!-- Tabel Data Murid -->
      <div class="table-responsive">
          <table class="table custom-table">
              <thead>
                  <tr>
                      <th class="text-center">Nama</th>
                      <th class="text-center">Jenis Kelamin</th>
                      <th class="text-center">Aksi</th>
                  </tr>
              </thead>
              <tbody>
                  <!-- Data Dummy untuk Front-end -->
                  @php
                      $students = [
                          ['name' => 'Aisyah Binti Abdullah Al-Muhajir', 'gender' => 'Perempuan'],
                          ['name' => 'Bagas Pratama Wijaya Kusuma', 'gender' => 'Laki-laki'],
                          ['name' => 'Bima Sakti Ananda Putra', 'gender' => 'Laki-laki'],
                          ['name' => 'Dina Amalia Sari Dewi', 'gender' => 'Perempuan'],
                          ['name' => 'Fajar Nugroho Santoso', 'gender' => 'Laki-laki'],
                          ['name' => 'Laras Ayu Permata Sari', 'gender' => 'Perempuan'],
                          ['name' => 'Nayla Putri Maharani', 'gender' => 'Perempuan'],
                          ['name' => 'Putri Ananda Dewi Sari', 'gender' => 'Perempuan'],
                          ['name' => 'Salsabila Nurul Hidayah', 'gender' => 'Perempuan'],
                          ['name' => 'Zidan Alif Ramadhan', 'gender' => 'Laki-laki'],
                      ];
                  @endphp
                  
                  <!-- Looping Data Dummy -->
                  @foreach ($students as $student)
                      <tr>
                          <td class="text-center">{{ $student['name'] }}</td>
                          <td class="text-center">{{ $student['gender'] }}</td>
                          <td class="d-flex justify-content-center">
                              <!-- Tombol Edit -->
                              <button class="btn btn-link p-0" onclick="alert('Edit {{ $student['name'] }}')">
                                  <i class="fas fa-edit text-success"></i>
                              </button>
                              <!-- Tombol Hapus -->
                              <button class="btn btn-link p-0 ms-2" onclick="alert('Hapus {{ $student['name'] }}')">
                                  <i class="fas fa-trash text-danger"></i>
                              </button>
                          </td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
  </div>
</x-layout-admin>
