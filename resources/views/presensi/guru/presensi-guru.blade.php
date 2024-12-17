<x-layout-presensi>
    <!-- Title -->
    <h1 class="text-center inter-font text-primary-custom mb-5">Presensi Guru</h1>

    <!-- Map Section -->
    <div class="map d-flex justify-content-center align-items-center mx-auto mb-4" style="max-width: 800px; height: 400px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);">
        <div id="map" style="width: 100%; height: 100%; border-radius: 8px;"></div>
    </div>

    <!-- Camera Section -->
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

    {{-- Keterangan Presensi --}}
    <div class="form-group justify-content-center align-items-center rounded mx-auto mb-4" style="height: auto; width: 100%; max-width: 600px;">
        <label for="keterangan" class="form-label">Keterangan Presensi</label>
        <textarea id="keterangan" class="form-control rounded-3 shadow-sm" rows="4" placeholder="Masukkan keterangan presensi di sini..." style="resize: none;"></textarea>
    </div>

    <!-- Button -->
    <div class="d-flex justify-content-center">
        <button id="submit-presensi" class="btn button btn-lg mb-4">Presensi</button>
    </div>

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

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
            const capturedImage = sessionStorage.getItem('capturedImage');

            // Menyiapkan data untuk dikirim
            const dataToSend = {
                keterangan: keterangan,
                image: capturedImage,
                coordinates: userCoordinates // Menyertakan koordinat
            };

            // Log data ke console untuk pemeriksaan
            console.log('Data yang akan dikirim:', dataToSend);

            // Tampilkan data di UI (opsional)
            const dataDisplay = document.createElement('div');
            dataDisplay.innerHTML = `
                <h5>Data yang akan dikirim:</h5>
                <p><strong>Keterangan:</strong> ${dataToSend.keterangan}</p>
                <p><strong>Koordinat:</strong> ${dataToSend.coordinates.lat}, ${dataToSend.coordinates.lon}</p>
                <img src="${dataToSend.image}" alt="Hasil Jepretan" class="img-fluid rounded" style="max-width: 200px;" />
            `;
            document.body.appendChild(dataDisplay); // Menambahkan ke body untuk ditampilkan

            // Kirim data ke server
            fetch('/api/presensi', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(dataToSend),
            })
            .then(response => response.json())
            .then(data => {
                console.log('Success:', data);
                // Tindakan setelah berhasil
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        });
    </script>
</x-layout-presensi>