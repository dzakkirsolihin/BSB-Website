<x-layout-admin>
    <div class="container">
        <div class="text-center my-4">
            <h1 class="text-center inter-font text-primary-custom mb-5">Kelola Akun Guru</h1>
        </div>

        {{-- @php
            // Data dummy - nanti akan diganti dengan data dari database
            $dataGuru = [
                ['id' => 1, 'name' => 'Ema Kusmiati', 'class_role' => null],
                ['id' => 2, 'name' => 'Nenur Dahyati', 'class_role' => 'daycare'],
                ['id' => 3, 'name' => 'Ade Suparman', 'class_role' => 'tk-a'],
                ['id' => 4, 'name' => 'Euis Kartika', 'class_role' => 'tk-b'],
                ['id' => 5, 'name' => 'Titin Sumarni', 'class_role' => 'bestari'],
                ['id' => 6, 'name' => 'Suci Pebrianti', 'class_role' => null],
                ['id' => 7, 'name' => 'Dea Rizki Shifany', 'class_role' => null],
            ];
        @endphp --}}
        @php
            $dataGuru = App\Models\Guru::all();
        @endphp

        <div class="table-responsive">
            <table class="table custom-table">
                <thead class="bg-primary-custom text-white">
                    <tr>
                        <th class="text-center col-4">Nama</th>
                        <th class="text-center col-5">Role Kelas</th>
                        <th class="text-center col-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataGuru as $guru)
                    <tr class="align-middle" data-guru-id="{{ $guru['id'] }}">
                        <td class="text-center">{{ $guru['nama_guru'] }}</td>
                        <td class="text-center">
                            <select class="form-select form-select-sm mx-auto w-75 class-role"
                                    id="class-role-{{ $guru['id'] }}"
                                    data-guru-id="{{ $guru['id'] }}">
                                <option value="" {{ is_null($guru['class_role']) ? 'selected' : '' }}>Pilih Kelas</option>
                                <option value="daycare" {{ $guru['class_role'] === 'daycare' ? 'selected' : '' }}>Daycare</option>
                                <option value="tk-a" {{ $guru['class_role'] === 'tk-a' ? 'selected' : '' }}>TK A</option>
                                <option value="tk-b" {{ $guru['class_role'] === 'tk-b' ? 'selected' : '' }}>TK B</option>
                                <option value="bestari" {{ $guru['class_role'] === 'bestari' ? 'selected' : '' }}>Bestari</option>
                            </select>
                        </td>
                        <td class="d-flex justify-content-center gap-2">
                            <a href="{{ url('resources/profile/edit' . $guru['id']) }}"
                               class="btn btn-link p-0 edit-btn"
                               data-guru-id="{{ $guru['id'] }}"
                               data-guru-name="{{ $guru['nama_guru'] }}"
                               data-guru-role="{{ $guru['class_role'] }}">
                                <i class="fas fa-edit text-success"></i>
                            </a>
                            <button class="btn btn-link p-0 delete-btn" data-guru-id="{{ $guru['id'] }}">
                                <i class="fas fa-trash text-danger"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Menyimpan data guru dalam format yang siap untuk database
        const guruData = {};

        // Inisialisasi data awal
        @foreach ($dataGuru as $guru)
            guruData[{{ $guru['id'] }}] = {
                id: {{ $guru['id'] }},
                name: "{{ $guru['name'] }}",
                class_role: "{{ $guru['class_role'] ?? '' }}"
            };
        @endforeach

        // Event listener untuk perubahan role kelas
        document.querySelectorAll('.class-role').forEach(select => {
            select.addEventListener('change', function() {
                const guruId = this.dataset.guruId;
                const newRole = this.value;

                guruData[guruId].class_role = newRole;

                // Simulasi pengiriman data ke server
                console.log('Update role kelas:', {
                    guru_id: guruId,
                    class_role: newRole
                });

                /* Nanti bisa ditambahkan AJAX request ke server:
                fetch('/api/guru/update-role', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        guru_id: guruId,
                        class_role: newRole
                    })
                })
                .then(response => response.json())
                .then(data => {
                    // Handle response
                })
                .catch(error => console.error('Error:', error));
                */
            });
        });

        // Event listener untuk tombol delete
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function() {
                const guruId = this.dataset.guruId;
                if (confirm('Apakah Anda yakin ingin menghapus guru ini?')) {
                    console.log('Delete guru:', guruData[guruId]);
                }
            });
        });

        // Event listener untuk tombol edit
        document.querySelectorAll('.edit-btn').forEach(link => {
            link.addEventListener('click', function(e) {
                // Menangkap data guru dari atribut data
                const guruId = this.dataset.guruId;
                const guruName = this.dataset.guruName;
                const guruRole = this.dataset.guruRole;

                // Menyimpan data ke sessionStorage agar bisa diakses di halaman edit
                sessionStorage.setItem('editGuruData', JSON.stringify({
                    id: guruId,
                    name: guruName,
                    class_role: guruRole
                }));

                // Biarkan link berjalan normal
                // window.location.href akan ditangani oleh href di tag <a>
            });
        });
    </script>

    <style>
        .custom-table thead {
            background-color: var(--bs-primary);
        }

        .custom-table tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }

        .custom-table tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.075);
        }
    </style>
</x-layout-admin>
