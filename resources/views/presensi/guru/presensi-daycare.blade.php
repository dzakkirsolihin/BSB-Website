<x-presensi-layout>
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

        .presensi-info small {
            font-size: 0.85em;
            color: #666;
        }
    </style>
    <main class="container py-4">
        <h1 class="text-center inter-font text-primary-custom mb-5">Presensi Daycare</h1>

        <div class="table-responsive">
            <table class="table custom-table" id="attendance-table">
                <thead class="bg-primary-custom text-white">
                    <tr>
                        <th class="text-center col-3">Nama</th>
                        <th class="text-center col-3">Status</th>
                        <th class="text-center col-3">Aksi</th>
                        <th class="text-center col-3">Pengantar/Penjemput</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataMuridDaycare as $murid)
                    @php
                        $presensi = $presensiHariIni[$murid->no_induk] ?? null;
                        $status = $presensi ? $presensi->status_kehadiran : 'tidak_hadir';
                        $sudahPresensiDatang = $presensi && $presensi->waktu_datang;
                        $sudahPresensiPulang = $presensi && $presensi->waktu_pulang;
                    @endphp
                    <tr data-student-id="{{ $murid->no_induk }}" class="align-middle">
                        <td class="text-center">{{ $murid->nama_siswa }}</td>
                        <td class="text-center">
                            <span class="badge {{ $status === 'hadir' ? 'bg-success' : 'bg-danger' }}">
                                {{ ucfirst($status) }}
                            </span>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-link p-0 text-primary-custom" 
                                    id="signIn-{{ $murid->no_induk }}" 
                                    onclick="handleSignIn('{{ $murid->no_induk }}')"
                                    {{ $sudahPresensiDatang ? 'disabled' : '' }}>
                                <i class="fas fa-sign-in-alt"></i>
                            </button>
                            <button class="btn btn-link p-0 ms-2 text-primary-custom" 
                                    id="signOut-{{ $murid->no_induk }}" 
                                    onclick="handleSignOut('{{ $murid->no_induk }}')"
                                    {{ !$sudahPresensiDatang || $sudahPresensiPulang ? 'disabled' : '' }}>
                                <i class="fas fa-sign-out-alt"></i>
                            </button>
                        </td>
                        <td>
                            <!-- Form Pengantar -->
                            <div class="row g-2 d-none" id="pengantar-form-{{ $murid->no_induk }}">
                                <div class="col-12">
                                    <select class="form-select form-select-sm pengantar-select" 
                                            id="pengantar-{{ $murid->no_induk }}">
                                        <option value="">Pilih Pengantar...</option>
                                        <option value="ayah">Ayah</option>
                                        <option value="ibu">Ibu</option>
                                        <option value="keluarga">Keluarga</option>
                                    </select>
                                    <input type="text"
                                        class="form-control form-control-sm mt-1 pengantar-detail d-none"
                                        id="pengantar-detail-{{ $murid->no_induk }}"
                                        placeholder="Siapa?">
                                    <button class="btn btn-sm btn-primary mt-1 w-100" 
                                            onclick="submitPengantar('{{ $murid->no_induk }}')">
                                        Konfirmasi Kedatangan
                                    </button>
                                </div>
                            </div>

                            <!-- Form Penjemput -->
                            <div class="row g-2 d-none" id="penjemput-form-{{ $murid->no_induk }}">
                                <div class="col-12">
                                    <select class="form-select form-select-sm penjemput-select" 
                                            id="penjemput-{{ $murid->no_induk }}">
                                        <option value="">Pilih Penjemput...</option>
                                        <option value="ayah">Ayah</option>
                                        <option value="ibu">Ibu</option>
                                        <option value="keluarga">Keluarga</option>
                                    </select>
                                    <input type="text"
                                        class="form-control form-control-sm mt-1 penjemput-detail d-none"
                                        id="penjemput-detail-{{ $murid->no_induk }}"
                                        placeholder="Siapa?">
                                    <button class="btn btn-sm btn-primary mt-1 w-100" 
                                            onclick="submitPenjemput('{{ $murid->no_induk }}')">
                                        Konfirmasi Kepulangan
                                    </button>
                                </div>
                            </div>

                            @if($presensi && $presensi->status_kehadiran === 'hadir')
                            <div class="presensi-info">
                                @if($presensi->waktu_datang)
                                <small class="d-block">
                                    Datang: {{ \Carbon\Carbon::parse($presensi->waktu_datang)->format('H:i') }}
                                    ({{ $presensi->pengantar }}
                                    @if($presensi->detail_pengantar)
                                        - {{ $presensi->detail_pengantar }}
                                    @endif)
                                </small>
                                @endif
                                
                                @if($presensi->waktu_pulang)
                                <small class="d-block">
                                    Pulang: {{ \Carbon\Carbon::parse($presensi->waktu_pulang)->format('H:i') }}
                                    ({{ $presensi->penjemput }}
                                    @if($presensi->detail_penjemput)
                                        - {{ $presensi->detail_penjemput }}
                                    @endif)
                                </small>
                                @endif
                            </div>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

    <script>
        function handleSignIn(noInduk) {
            // Sembunyikan form penjemput jika terbuka
            document.getElementById(`penjemput-form-${noInduk}`).classList.add('d-none');
            
            // Tampilkan form pengantar
            document.getElementById(`pengantar-form-${noInduk}`).classList.remove('d-none');
        }

        function handleSignOut(noInduk) {
            // Sembunyikan form pengantar jika terbuka
            document.getElementById(`pengantar-form-${noInduk}`).classList.add('d-none');
            
            // Tampilkan form penjemput
            document.getElementById(`penjemput-form-${noInduk}`).classList.remove('d-none');
        }

        function submitPengantar(noInduk) {
            const pengantar = document.getElementById(`pengantar-${noInduk}`).value;
            const pengantarDetail = document.getElementById(`pengantar-detail-${noInduk}`).value;

            if (!pengantar) {
                alert('Silakan pilih pengantar terlebih dahulu!');
                return;
            }

            if (pengantar === 'keluarga' && !pengantarDetail) {
                alert('Silakan isi detail pengantar!');
                return;
            }

            // Kirim data ke server
            fetch('/dashboard-guru/presensi-daycare/datang', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    no_induk: noInduk,
                    pengantar: pengantar,
                    detail_pengantar: pengantarDetail
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    // Sembunyikan form
                    document.getElementById(`pengantar-form-${noInduk}`).classList.add('d-none');
                    
                    // Update UI
                    const statusBadge = document.querySelector(`tr[data-student-id="${noInduk}"] .badge`);
                    statusBadge.classList.remove('bg-danger');
                    statusBadge.classList.add('bg-success');
                    statusBadge.textContent = 'Hadir';

                    // Nonaktifkan tombol presensi datang
                    document.getElementById(`signIn-${noInduk}`).disabled = true;
                    
                    // Aktifkan tombol presensi pulang
                    document.getElementById(`signOut-${noInduk}`).disabled = false;

                    // Refresh halaman untuk menampilkan info presensi
                    location.reload();
                } else {
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat memproses presensi');
            });
        }

        function submitPenjemput(noInduk) {
            const penjemput = document.getElementById(`penjemput-${noInduk}`).value;
            const penjemputDetail = document.getElementById(`penjemput-detail-${noInduk}`).value;

            if (!penjemput) {
                alert('Silakan pilih penjemput terlebih dahulu!');
                return;
            }

            if (penjemput === 'keluarga' && !penjemputDetail) {
                alert('Silakan isi detail penjemput!');
                return;
            }

            // Kirim data ke server
            fetch('/dashboard-guru/presensi-daycare/pulang', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    no_induk: noInduk,
                    penjemput: penjemput,
                    detail_penjemput: penjemputDetail
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    // Sembunyikan form
                    document.getElementById(`penjemput-form-${noInduk}`).classList.add('d-none');
                    
                    // Nonaktifkan tombol presensi pulang
                    document.getElementById(`signOut-${noInduk}`).disabled = true;

                    // Refresh halaman untuk menampilkan info presensi
                    location.reload();
                } else {
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat memproses presensi');
            });
        }

        // Event listeners untuk dropdown pengantar dan penjemput
        document.querySelectorAll('.pengantar-select, .penjemput-select').forEach(select => {
            select.addEventListener('change', function() {
                const row = this.closest('tr');
                const studentId = row.dataset.studentId;
                const isSignIn = this.classList.contains('pengantar-select');
                const detailInput = row.querySelector(
                    isSignIn ? '.pengantar-detail' : '.penjemput-detail'
                );

                if (this.value === 'keluarga') {
                    detailInput.classList.remove('d-none');
                } else {
                    detailInput.classList.add('d-none');
                    detailInput.value = '';
                }
            });
        });
    </script>
</x-presensi-layout>