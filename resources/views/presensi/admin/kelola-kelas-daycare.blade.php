<x-admin-layout>
    <div class="container">
        <div class="text-center my-4">
            <h1 class="text-center inter-font text-primary-custom mb-5">Kelola Murid Daycare</h1>
        </div>

        <x-error-notification />
        <x-success-notification />
        <x-admin-alert />
        <div class="table-responsive">
            <table class="table custom-table">
                <thead>
                    <tr>
                        <th class="text-center">Nama</th>
                        <th class="text-center">No Induk</th>
                        <th class="text-center">No Telepon Orang Tua</th>
                        <th class="text-center">Jenis Kelamin</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataMuridDaycare as $murid)
                        <tr>
                            <td class="text-center">{{ $murid->nama_siswa }}</td>
                            <td class="text-center">{{ $murid->no_induk }}</td>
                            <td class="text-center">{{ $murid->no_telp_orang_tua }}</td>
                            <td class="text-center">
                                {{ $murid->jk === 'L' ? 'Laki-laki' : ($murid->jk === 'P' ? 'Perempuan' : 'Tidak Diketahui') }}
                            </td>
                            <td class="d-flex justify-content-center gap-2">
                                <button class="btn btn-link p-0 edit-daycare-btn" 
                                    data-murid="{{ json_encode($murid) }}">
                                    <i class="fas fa-edit text-success"></i>
                                </button>
                                <button class="btn btn-link p-0 delete-daycare-btn" data-bs-toggle="modal"
                                    data-bs-target="#deleteMuridModal" 
                                    data-murid-no-induk="{{ $murid->no_induk }}">
                                    <i class="fas fa-trash text-danger"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="text-center my-4">
            <button class="btn btn-danger btn-mg" data-bs-toggle="modal" data-bs-target="#deleteAllMuridModal">HAPUS SEMUA MURID</button>
        </div>

        <x-modals.delete-all-murid 
            :kelas_id="1" 
            :route="route('muridDaycare.destroyAll', ['kelas_id' => 1])" 
        />

        <x-modals.edit-daycare />
        <x-modals.delete-murid />
    </div>
    <x-scripts.edit-modal-handler />
</x-admin-layout>
