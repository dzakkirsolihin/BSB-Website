<x-layout-presensi>
  <div class="container">
      <div class="text-center my-4">
          <h1 class="text-center inter-font text-primary-custom mb-5">Presensi Murid TK B</h1>
      </div>
      <div class="table-responsive">
          <table class="table custom-table">
              <thead>
                  <tr>
                      <th class="text-center">Nama</th>
                      <th class="text-center">Kehadiran</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach (['Aisyah', 'Bagas', 'Bima', 'Dina', 'Fajar', 'Laras', 'Nayla', 'Putri', 'Salsabila', 'Zidan'] as $murid)
                  <tr>
                      <td class="text-center">{{ $murid }}</td>
                      <td class="d-flex justify-content-center">
                          <button class="btn btn-link p-0 check-btn"><i class="fas fa-check-circle" style="color: #4caf50;"></i></button>
                          <button class="btn btn-link p-0 ms-2 times-btn"><i class="fas fa-times-circle" style="color: #9e9e9e;"></i></button>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
      <div class="text-center my-4">
          <button class="btn btn-primary-custom text-light mb-4">EDIT</button>
          <button class="btn btn-primary-custom text-light mb-4">SIMPAN</button>
      </div>
  </div>
  <script>
      // JavaScript untuk tombol kehadiran
      document.querySelectorAll('.check-btn').forEach(button => {
          button.addEventListener('click', function() {
              this.querySelector('i').style.color = '#4caf50'; // Hijau
              this.nextElementSibling.querySelector('i').style.color = '#9e9e9e'; // Abu
          });
      });

      document.querySelectorAll('.times-btn').forEach(button => {
          button.addEventListener('click', function() {
              this.querySelector('i').style.color = '#f44336'; // Merah
              this.previousElementSibling.querySelector('i').style.color = '#9e9e9e'; // Abu
          });
      });
  </script>
</x-layout-presensi>