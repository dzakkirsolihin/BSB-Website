<x-app-layout>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="{{ asset('css/faq-style.css') }}" />
    

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"
      rel="stylesheet"
    />

    <link
      href="https://fonts.googleapis.com/css2?family=Inknut+Antiqua:wght@400;700&display=swap"
      rel="stylesheet"
    />

    <script src="https://unpkg.com/feather-icons"></script>

    <title>FAQ | Yayasan Baitush Sholihin</title>
  </head>
  <body>
    <!--hero start-->
    <section class="hero-faq">
      <div class="container">
        <h2 class="faq text-center fw-bold mb-3" style="color: #ccff33">
          FREQUENTLY ASKED QUESTION (FAQ)
        </h2>
        <img
          src="{{ asset('Assets/img/garis.png') }}"
          alt="Separator"
          style="width: 200px; height: auto"
        />
        <div class="faq">
          <div class="faq-item">
            <button class="faq-question">
              + Berapa jumlah siswa per kelas?
            </button>
            <div class="faq-answer">
              Jumlah siswa per kelas yaitu maksimal 15 siswa
            </div>
          </div>
          <div class="faq-item">
            <button class="faq-question">+ Apa saja berkas pendaftaran?</button>
            <div class="faq-answer">
              Berkas yang perlu dipersiapkan untuk pendaftaran antara lain:
              <br />
              1. (1 Lembar) Fotokopi Akte Kelahiran Anak <br />
              2. (1 Lembar) Fotokopi Raport Bila Ada <br />
              3. (1 Lembar) Fotokopi KTP Orang Tua, Ayah dan ibu <br />
              4. (1 Lembar) Fotokopi Kartu Keluarga <br />
              5. (1 Lembar) Fotokopi Riwayat Imunisasi / Kesehatan <br />
              6. (4 Lembar) Pas Foto 2x3 <br />
              7. (4 Lembar) 3x4 <br />
              8. (1 Lembar) foto bersama orang tua/keluarga <br />
              9. (1 Buah) Buku Cerita / Bacaan Anak Yang Masih Layak <br />
              10. Membawa Pot Dan Bunga 1 Buah Untuk Program Penghijauan <br />
            </div>
          </div>
          <div class="faq-item">
            <button class="faq-question">+ Kegiatan nya ada apa aja ?</button>
            <div class="faq-answer">
              1. Daycare <br />
              Beberapa kegiatan utama harian di daycare adalah berbaris,
              memeriksa kebersihan bagian tubuh seperti kuku, membaca doa sehari
              sehari, bernyanyi bersama, kegiatan inti pembelajaran, sholat
              dzuhur, makan, tidur siang, mandi sore sembari menunggu dijemput
              orang tua. <br />
              2. TK <br />
              Kegiatan harian di TK antara lain adalah berbaris, memeriksa
              kebersihan, membaca doa belajar, membaca asmaul husna, doa-doa
              harian, membaca surat pendek, kegiatan inti sesuai tema
              pembelajaran, dan persiapan pulang.
            </div>
          </div>
          <div class="faq-item">
            <button class="faq-question">
              + Maksimal anak yang dititip di daycare berapa orang ?
            </button>
            <div class="faq-answer">maksimal 20 anak</div>
          </div>
        </div>
      </div>
    </section>
    <!--hero end-->

    <script>
      // JavaScript untuk FAQ Toggle
      document.querySelectorAll(".faq-question").forEach((btn) => {
        btn.addEventListener("click", () => {
          const answer = btn.nextElementSibling;

          // Tutup semua jawaban lainnya
          document.querySelectorAll(".faq-answer").forEach((ans) => {
            if (ans !== answer) ans.style.display = "none";
          });
          document.querySelectorAll(".faq-question").forEach((otherBtn) => {
            if (otherBtn !== btn)
              otherBtn.textContent = "+ " + otherBtn.textContent.slice(2);
          });

          // Toggle jawaban ini
          if (answer.style.display === "block") {
            answer.style.display = "none";
            btn.textContent = "+ " + btn.textContent.slice(2);
          } else {
            answer.style.display = "block";
            btn.textContent = "- " + btn.textContent.slice(2);
          }
        });
      });

      feather.replace();
    </script>
  </body>
</x-app-layout>