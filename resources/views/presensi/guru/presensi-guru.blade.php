<head>
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
</head>

<x-presensi-layout>
    <!-- Title -->
    <h1 class="text-center inter-font text-primary-custom mb-5">Presensi Guru</h1>

    <div class="container">
        @if($message)
            <div class="row justify-content-center mb-4">
                <div class="col-12 col-lg-8">
                    <div class="alert alert-info text-center">{{ $message }}</div>
                </div>
            </div>
        @else
            @if($mode === 'default')
                <!-- Mode Selection -->
                <div class="row justify-content-center mb-4">
                    <div class="col-12 col-lg-8">
                        <div class="card shadow-sm">
                            <div class="card-body p-4">
                                <h5 class="text-primary-custom mb-4">Pilih Mode Presensi</h5>
                                <div class="d-grid gap-3">
                                    <button class="btn button btn-lg" id="show-present">
                                        <i class="fas fa-user-check me-2"></i>Presensi Datang
                                    </button>
                                    <button class="btn btn-warning btn-lg" id="show-absent">
                                        <i class="fas fa-user-times me-2"></i>Lapor Tidak Hadir
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Present Form (Hidden by default) -->
                <div id="present-form" class="d-none">
                    <!-- Map Section -->
                    <div class="row justify-content-center mb-4">
                        <div class="col-12 col-lg-8">
                            <div class="card shadow-sm">
                                <div class="card-body p-0">
                                    <div id="map" class="rounded-3" style="height: 400px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Camera Section -->
                    <div class="row justify-content-center mb-4">
                        <div class="col-12 col-lg-8">
                            <div class="card bg-light shadow-sm">
                                <div class="card-body p-4">
                                    <div class="camera position-relative bg-dark rounded-3 overflow-hidden mb-3">
                                        <video id="video" autoplay playsinline class="w-100" style="height: 400px; object-fit: cover;"></video>
                                        <canvas id="canvas" class="d-none"></canvas>
                                        <button id="capture" class="btn button position-absolute bottom-0 end-0 m-3 rounded-circle">
                                            <i class="fas fa-camera"></i>
                                        </button>
                                    </div>
                                    <div id="photo-preview" class="d-none">
                                        <h5 class="text-primary-custom mb-3">Hasil Jepretan:</h5>
                                        <div class="rounded-3 overflow-hidden mb-3">
                                            <img id="captured-image" class="w-100" style="max-height: 400px; object-fit: cover;" />
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label text-primary-custom fw-bold">Keterangan (opsional)</label>
                                            <textarea id="keterangan_hadir" class="form-control" rows="3" 
                                                placeholder="Masukkan keterangan tambahan (opsional)"
                                                style="resize: none;"></textarea>
                                        </div>
                                        <div class="d-flex justify-content-between gap-3">
                                            <button id="retake" class="btn btn-warning flex-grow-1">
                                                <i class="fas fa-redo me-2"></i>Ambil Ulang
                                            </button>
                                            <button id="submit-present" class="btn button flex-grow-1">
                                                <i class="fas fa-check me-2"></i>Kirim Presensi
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Absent Form (Hidden by default) -->
                <div id="absent-form" class="d-none">
                    <div class="row justify-content-center mb-4">
                        <div class="col-12 col-lg-8">
                            <div class="card shadow-sm">
                                <div class="card-body p-4">
                                    <div class="mb-4">
                                        <label class="form-label text-primary-custom fw-bold">Status Ketidakhadiran</label>
                                        <select id="status_kehadiran" class="form-select form-select-lg">
                                            <option value="Izin">Izin</option>
                                            <option value="Sakit">Sakit</option>
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label text-primary-custom fw-bold">Keterangan</label>
                                        <textarea id="keterangan" class="form-control" rows="4" 
                                            placeholder="Masukkan alasan ketidakhadiran Anda"
                                            style="resize: none;"></textarea>
                                    </div>
                                    <div class="d-grid">
                                        <button id="submit-absent" class="btn button btn-lg">
                                            <i class="fas fa-paper-plane me-2"></i>Kirim Laporan
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @elseif($mode === 'pulang')
                <!-- Map Section for Pulang -->
                <div class="row justify-content-center mb-4">
                    <div class="col-12 col-lg-8">
                        <div class="card shadow-sm">
                            <div class="card-body p-0">
                                <div id="map" class="rounded-3" style="height: 400px;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pulang Button -->
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-8">
                        <button id="submit-pulang" class="btn button btn-lg w-100">
                            <i class="fas fa-sign-out-alt me-2"></i>Presensi Pulang
                        </button>
                    </div>
                </div>
            @endif
        @endif
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Global variable for storing coordinates
            let userCoordinates = {
                lat: null,
                lon: null
            };
        
            // Map initialization and geolocation
            const mapElement = document.getElementById('map');
            
            if (mapElement) { // Check if map element exists
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition, showError);
                } else {
                    alert("Geolocation is not supported by this browser.");
                }
            }
        
            function showPosition(position) {
                const lat = position.coords.latitude;
                const lon = position.coords.longitude;

                userCoordinates = {
                    lat: lat,
                    lon: lon
                };

                if (mapElement) {
                    // Hapus map yang ada jika sudah diinisialisasi sebelumnya
                    if (window.currentMap) {
                        window.currentMap.remove();
                    }

                    // Inisialisasi map baru dengan style yang lebih baik
                    window.currentMap = L.map('map', {
                        zoomControl: true,
                        attributionControl: true
                    }).setView([lat, lon], 17); // Zoom level dinaikkan untuk detail lebih baik

                    // Gunakan style OpenStreetMap yang lebih bagus
                    L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                        maxZoom: 19
                    }).addTo(window.currentMap);

                    // Marker dengan style yang lebih baik
                    const marker = L.marker([lat, lon], {
                        title: 'Lokasi Anda',
                        draggable: false
                    }).addTo(window.currentMap);

                    // Popup dengan informasi yang lebih informatif
                    marker.bindPopup(`
                        <b>Lokasi Anda Saat Ini</b>
                    `).openPopup();

                    // Tambahkan circle radius untuk akurasi
                    L.circle([lat, lon], {
                        color: 'blue',
                        fillColor: '#3388ff',
                        fillOpacity: 0.1,
                        radius: 50 // 50 meter radius
                    }).addTo(window.currentMap);
                }
            }
        
            function showError(error) {
                let errorMessage;
                switch (error.code) {
                    case error.PERMISSION_DENIED:
                        errorMessage = "Akses lokasi ditolak oleh pengguna.";
                        break;
                    case error.POSITION_UNAVAILABLE:
                        errorMessage = "Informasi lokasi tidak tersedia.";
                        break;
                    case error.TIMEOUT:
                        errorMessage = "Waktu permintaan lokasi habis.";
                        break;
                    case error.UNKNOWN_ERROR:
                        errorMessage = "Terjadi kesalahan yang tidak diketahui.";
                        break;
                }
                alert(errorMessage);
            }
        
            // Camera handling - Only initialize if present form is shown
            if (document.getElementById('video')) {
                const video = document.getElementById('video');
                const canvas = document.getElementById('canvas');
                const captureButton = document.getElementById('capture');
                const photoPreview = document.getElementById('photo-preview');
                const capturedImage = document.getElementById('captured-image');
                const retakeButton = document.getElementById('retake');
        
                // Initialize camera
                if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                    navigator.mediaDevices.getUserMedia({ video: true })
                        .then((stream) => {
                            video.srcObject = stream;
                        })
                        .catch((error) => {
                            console.error("Error accessing camera:", error);
                            alert("Gagal mengakses kamera. Pastikan kamera tersedia dan izin diberikan.");
                        });
                }
        
                // Capture photo
                captureButton?.addEventListener('click', () => {
                    canvas.width = video.videoWidth;
                    canvas.height = video.videoHeight;
                    const context = canvas.getContext('2d');
                    context.drawImage(video, 0, 0, canvas.width, canvas.height);
                    
                    video.style.display = 'none';
                    captureButton.style.display = 'none';
                    photoPreview.classList.remove('d-none');
                    capturedImage.src = canvas.toDataURL('image/png');
                });
        
                // Retake photo
                retakeButton?.addEventListener('click', () => {
                    video.style.display = 'block';
                    captureButton.style.display = 'block';
                    photoPreview.classList.add('d-none');
                });
            }
        
            // Mode selection handlers
            document.getElementById('show-present')?.addEventListener('click', function() {
                document.getElementById('present-form').classList.remove('d-none');
                document.getElementById('absent-form').classList.add('d-none');
            });
        
            document.getElementById('show-absent')?.addEventListener('click', function() {
                document.getElementById('absent-form').classList.remove('d-none');
                document.getElementById('present-form').classList.add('d-none');
            });
        
            // Submit handlers
            document.getElementById('submit-present')?.addEventListener('click', function() {
                if (!userCoordinates.lat || !userCoordinates.lon) {
                    alert('Lokasi belum tersedia. Mohon tunggu sebentar.');
                    return;
                }
        
                const imageData = canvas.toDataURL('image/png');
                const keterangan = document.getElementById('keterangan_hadir').value;
    
                fetch('/dashboard-guru/presensi-guru/present', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        image: imageData,
                        koordinat: `${userCoordinates.lat},${userCoordinates.lon}`,
                        latitude: userCoordinates.lat,
                        longitude: userCoordinates.lon,
                        keterangan: keterangan
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        alert(data.message);
                        location.reload();
                    } else {
                        alert(data.message || 'Terjadi kesalahan saat menyimpan presensi');
                    }
                })
                .catch((error) => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat menyimpan presensi');
                });
            });
        
            document.getElementById('submit-absent')?.addEventListener('click', function() {
                const statusKehadiran = document.getElementById('status_kehadiran').value;
                const keterangan = document.getElementById('keterangan').value;
        
                if (!keterangan.trim()) {
                    alert('Mohon isi keterangan ketidakhadiran');
                    return;
                }
        
                fetch('/dashboard-guru/presensi-guru/absent', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        status_kehadiran: statusKehadiran,
                        keterangan: keterangan
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        alert(data.message);
                        location.reload();
                    } else {
                        alert(data.message || 'Terjadi kesalahan saat menyimpan ketidakhadiran');
                    }
                })
                .catch((error) => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat menyimpan ketidakhadiran');
                });
            });
        
            document.getElementById('submit-pulang')?.addEventListener('click', function() {
                if (!userCoordinates.lat || !userCoordinates.lon) {
                    alert('Lokasi belum tersedia. Mohon tunggu sebentar.');
                    return;
                }
        
                fetch('/dashboard-guru/presensi-guru/pulang', {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({})
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        alert(data.message);
                        location.reload();
                    } else {
                        alert(data.message || 'Terjadi kesalahan saat menyimpan presensi pulang');
                    }
                })
                .catch((error) => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat menyimpan presensi pulang');
                });
            });
        });
    </script>
    @endpush
</x-presensi-layout>