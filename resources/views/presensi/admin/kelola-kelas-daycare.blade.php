<x-layout-admin>
    <div class="container">
        <div class="text-center my-4">
            <h1 class="inter-font text-primary-custom mb-5">Kelola Murid DayCare</h1>
        </div>
        
        @php
            $students = [
                ['id' => 1, 'nama' => 'Aisyah Binti Abdullah Al-Muhajir', 'jk' => 'Perempuan', 'kelas' => 'Daycare'],
                            ['id' => 2, 'nama' => 'Bagas Pratama Wijaya Kusuma', 'jk' => 'Laki-laki', 'kelas' => 'Daycare'],
                            ['id' => 3, 'nama' => 'Bima Sakti Ananda Putra', 'jk' => 'Laki-laki', 'kelas' => 'Daycare'],
                            ['id' => 4, 'nama' => 'Dina Amalia Sari Dewi', 'jk' => 'Perempuan', 'kelas' => 'Daycare'],
                            ['id' => 5, 'nama' => 'Fajar Nugroho Santoso', 'jk' => 'Laki-laki', 'kelas' => 'Daycare'],
                            ['id' => 6, 'nama' => 'Laras Ayu Permata Sari', 'jk' => 'Perempuan', 'kelas' => 'Daycare'],
                            ['id' => 7, 'nama' => 'Nayla Putri Maharani', 'jk' => 'Perempuan', 'kelas' => 'Daycare'],
                            ['id' => 8, 'nama' => 'Putri Ananda Dewi Sari', 'jk' => 'Perempuan', 'kelas' => 'Daycare'],
                            ['id' => 9, 'nama' => 'Salsabila Nurul Hidayah', 'jk' => 'Perempuan', 'kelas' => 'Daycare'],
                            ['id' => 10, 'nama' => 'Zidan Alif Ramadhan', 'jk' => 'Laki-laki', 'kelas' => 'Daycare'],
            ];
        @endphp

        <x-tabel-kelola-murid :students="$students" kelas="Daycare" />
        <x-edit-murid-modal kelas="Daycare" />
        <x-script-kelola-murid kelas="Daycare" />
    </div>
</x-layout-admin>