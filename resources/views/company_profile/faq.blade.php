<x-app-layout>
  <head>
    <title>FAQ | Yayasan Baitush Sholihin</title>
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        outline: none;
        border: none;
        text-decoration: none;
      }

      .hero {
        min-height: 100vh;
        display: flex;
        align-items: center;
      }

      .hero .content {
        z-index: 2;
        padding: 1.4rem 7%;
        max-width: 50rem;
        color: white;
      }

      .hero .content .nav-link {
        display: inline-block;
        font-size: 1.1rem;
        padding: 0.8rem 2rem;
        color: white;
        background-color: #008000;
        border-radius: 0.5rem;
      }

      /* Styling untuk FAQ Section */
      .hero-faq {
        padding: 50px 0;
        background-color: #f8f8f8;
        color: #008000;
        text-align: center;
      }

      .hero-faq .container img {
        margin-bottom: 40px;
      }

      .faq-divider {
        width: 80px;
        height: 2px;
        background-color: #008000;
        margin: 10px auto 30px;
      }

      .faq {
        max-width: 700px;
        margin: 0 auto;
      }

      .faq-item {
        margin-bottom: 20px;
      }

      .faq-question {
        width: 100%;
        text-align: left;
        background-color: #008000;
        color: white;
        padding: 15px;
        border: none;
        font-size: 1rem;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s ease;
      }

      .faq-question:hover {
        background-color: #006400;
      }

      .faq-answer {
        background-color: #90ee90;
        padding: 15px;
        margin-top: 10px;
        border-radius: 5px;
        display: none;
        font-size: 0.9rem;
        text-align: left;
      }
    </style>
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
