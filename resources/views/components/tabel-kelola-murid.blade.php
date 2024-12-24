@props(['students', 'kelas'])

<div class="table-responsive">
    <table class="table custom-table">
        <thead>
            <tr>
                <th class="text-center">Nama</th>
                <th class="text-center">Jenis Kelamin</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr class="align-middle" data-student-id="{{ $student['id'] }}">
                    <td class="text-center">{{ $student['nama'] }}</td>
                    <td class="text-center">{{ $student['jk'] }}</td>
                    <td class="d-flex justify-content-center">
                        <button type="button"
                            class="btn btn-link p-0 edit-btn" 
                            data-student-id="{{ $student['id'] }}"
                            data-student-nama="{{ $student['nama'] }}"
                            data-student-jk="{{ $student['jk'] }}"
                            data-student-kelas="{{ $student['kelas'] }}">
                            <i class="fas fa-edit text-success"></i>
                        </button>
                        <button type="button" class="btn btn-link p-0 ms-2 delete-btn" 
                            data-student-id="{{ $student['id'] }}">
                            <i class="fas fa-trash text-danger"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>