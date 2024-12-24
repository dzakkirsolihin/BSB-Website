<Head>
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
</Head>

<x-presensi-layout>
    <!-- Title -->
    <h1 class="text-center inter-font text-primary-custom mb-5">Presensi Guru</h1>

    <!-- Map Section -->
    <div class="map d-flex justify-content-center align-items-center mx-auto mb-4" style="max-width: 800px; height: 400px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);">
        <div id="map" style="width: 100%; height: 100%; border-radius: 8px;"></div>
    </div>

    {{-- @if (!$message && $buttonType === 'masuk') --}}
    @if (!$message)
        <div class="camera-section d-flex justify-content-center align-items-center mb-4">
            <div class="camera-container bg-light rounded p-4 shadow" style="max-width: 600px; width: 100%;">
                <div class="camera d-flex justify-content-center align-items-center rounded" style="height: 400px; position: relative; overflow: hidden;">
                    <video id="video" autoplay playsinline class="w-100 h-100"></video>
                    <canvas id="canvas" class="d-none"></canvas>
                    <button id="capture" class="btn btn-primary rounded-5 position-absolute" style="bottom: 10px; right: 10px;">
                        <i class="bi bi-camera"></i>
                    </button>
                </div>
                <div id="photo-preview" class="mt-3 d-none">
                    <h5>Hasil Jepretan:</h5>
                    <img id="captured-image" class="img-fluid rounded" />
                    <div class="d-flex justify-content-between mt-2">
                        <button id="retake" class="btn btn-warning">Ambil Ulang</button>
                        <button id="continue" class="btn btn-success">Lanjut</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($buttonType === 'pulang' || $buttonType === 'masuk' && !$message)
        {{-- Status Kehadiran --}}
        <div class="form-group justify-content-center align-items-center rounded mx-auto mb-4" style="height: auto; width: 100%; max-width: 600px;">
            <label for="status_kehadiran" class="form-label">Status Kehadiran</label>
            <select id="status_kehadiran" class="form-select form-select-lg">
                <option value="Hadir">Hadir</option>
                <option value="Izin">Izin</option>
                <option value="Sakit">Sakit</option>
            </select>
        </div>

        {{-- Keterangan Presensi --}}
        <div class="form-group justify-content-center align-items-center rounded mx-auto mb-4" style="height: auto; width: 100%; max-width: 600px;">
            <label for="keterangan" class="form-label">Keterangan Presensi</label>
            <textarea id="keterangan" class="form-control rounded-3 shadow-sm" rows="4" placeholder="Masukkan keterangan tambahan presensi di sini. Kosongkan jika tidak ada keterangan tambahan." style="resize: none;"></textarea>
        </div>
    @endif

    <!-- Button -->
    <div class="d-flex justify-content-center">
        @if($message)
            <div class="alert alert-info">{{ $message }}</div>
        @else
            <button id="submit-presensi"
                    class="btn button btn-lg mb-4"
                    data-type="{{ $buttonType }}">
                {{ $buttonType === 'masuk' ? 'Presensi Datang' : 'Presensi Pulang' }}
            </button>
        @endif
    </div>

    <script>
        // Geolocation API
        // Mengecek apakah browser mendukung Geolocation API
        if (navigator.geolocation) {
            // Meminta lokasi pengguna
            navigator.geolocation.getCurrentPosition(showPosition, showError);
        } else {
            // Memberitahukan jika browser tidak mendukung Geolocation API
            alert("Geolocation is not supported by this browser.");
        }

        // Fungsi untuk menampilkan posisi pengguna
        function showPosition(position) {
            // Mendapatkan latitude dan longitude pengguna
            const lat = position.coords.latitude;
            const lon = position.coords.longitude;

            userCoordinates = {
                lat: lat,
                lon: lon
            };

            // Membuat peta menggunakan Leaflet dengan koordinat pengguna
            const map = L.map('map').setView([lat, lon], 13);

            // Menambahkan layer peta dari OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19, // Maksimal zoom level
            }).addTo(map);

            // Menambahkan marker pada peta di lokasi pengguna
            L.marker([lat, lon]).addTo(map)
                .bindPopup('Anda berada di sini.') // Menampilkan pesan pada marker
                .openPopup(); // Membuka popup secara otomatis
        }

        // Fungsi untuk menangani error saat meminta lokasi
        function showError(error) {
            // Memeriksa jenis error yang terjadi
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    // Pengguna menolak permintaan lokasi
                    alert("User denied the request for Geolocation.");
                    break;
                case error.POSITION_UNAVAILABLE:
                    // Informasi lokasi tidak tersedia
                    alert("Location information is unavailable.");
                    break;
                case error.TIMEOUT:
                    // Permintaan lokasi melebihi batas waktu
                    alert("The request to get user location timed out.");
                    break;
                case error.UNKNOWN_ERROR:
                    // Kesalahan tidak dikenal terjadi
                    alert("An unknown error occurred.");
                    break;
            }
        }

        // MediaDevices API
        // Mengakses elemen video, canvas, dan tombol tangkap pada DOM
        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const captureButton = document.getElementById('capture');

        // Mengecek apakah browser mendukung MediaDevices API dan akses kamera
        if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
            // Meminta akses ke kamera dengan opsi video diaktifkan
            navigator.mediaDevices.getUserMedia({ video: true })
                .then((stream) => {
                    // Menampilkan stream kamera pada elemen video
                    video.srcObject = stream;
                })
                .catch((error) => {
                    // Menampilkan error jika gagal mengakses kamera
                    console.error("Error accessing the camera: ", error);
                });
        }

        // Event listener untuk tombol tangkap gambar
        captureButton.addEventListener('click', () => {
            const context = canvas.getContext('2d');
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            context.drawImage(video, 0, 0, canvas.width, canvas.height);
            video.style.display = 'none';
            canvas.style.display = 'block';

            // Menampilkan hasil jepretan
            const capturedImage = document.getElementById('captured-image');
            capturedImage.src = canvas.toDataURL('image/png');
            document.getElementById('photo-preview').classList.remove('d-none');
        });

        // Event listener untuk tombol ambil ulang
        document.getElementById('retake').addEventListener('click', () => {
            video.style.display = 'block';
            canvas.style.display = 'none';
            document.getElementById('photo-preview').classList.add('d-none');
        });

        // Event listener untuk tombol lanjut
        document.getElementById('continue').addEventListener('click', () => {
            const imageData = canvas.toDataURL('image/png');
            sessionStorage.setItem('capturedImage', imageData); // Simpan gambar di sessionStorage
            alert("Gambar telah disimpan, silakan lanjutkan ke proses presensi.");
        });

        // Event listener untuk tombol presensi
        document.getElementById('submit-presensi').addEventListener('click', () => {
            const keterangan = document.getElementById('keterangan').value;
            const status_kehadiran = document.getElementById('status_kehadiran').value;
            const capturedImage = sessionStorage.getItem('capturedImage');
            const buttonType = document.getElementById('submit-presensi').dataset.type;

            if (!capturedImage && buttonType === 'masuk') {
                alert('Harap ambil foto terlebih dahulu!');
                return;
            }

            if (!userCoordinates.lat || !userCoordinates.lon) {
                alert('Lokasi belum tersedia. Mohon tunggu sebentar.');
                return;
            }

            const dataToSend = {
                keterangan: keterangan,
                status_kehadiran: status_kehadiran,
                image: capturedImage,
                koordinat: `${userCoordinates.lat},${userCoordinates.lon}`,
                latitude: userCoordinates.lat,
                longitude: userCoordinates.lon
            };

            const url = buttonType === 'masuk' ? '/dashboard-guru/presensi-guru' : '/dashboard-guru/presensi-guru/update';
            const method = buttonType === 'masuk' ? 'POST' : 'PATCH';

            fetch(url, {
                method: method,
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify(dataToSend),
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
    </script>
</x-presensi-layout>
