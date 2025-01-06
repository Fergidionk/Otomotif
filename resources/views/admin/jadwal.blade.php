@extends('admin/components.app')

@section('content')
<div class="container">
    <h1>Data Jadwal</h1>
    <div class="mb-4">
        <button id="addJadwalBtn" class="btn btn-primary">Tambah Jadwal</button>
    </div>
    <div class="card">
        <h5 class="card-header">Table Jadwal</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ID Pendaftar</th>
                        <th>Hari</th>
                        <th>Jam Pelatihan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($jadwal as $j)
                    <tr>
                        <td>{{ $j->id }}</td>
                        <td>{{ $j->pendaftar_id }}</td>
                        <td>{{ $j->hari }}</td>
                        <td>{{ $j->jam_pelatihan }}</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('jadwal.edit', $j->id) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                    <form action="{{ route('jadwal.destroy', $j->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item"><i class="bx bx-trash me-1"></i> Delete</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal untuk Tambah/Edit Jadwal -->
<div class="modal fade" id="jadwalModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Tambah Jadwal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="jadwalForm">
                    <input type="hidden" id="jadwalId" value="">
                    <div class="mb-3">
                        <label for="pendaftarId" class="form-label">ID Pendaftar</label>
                        <input type="text" id="pendaftarId" class="form-control" placeholder="Masukkan ID Pendaftar" required>
                    </div>
                    <div class="mb-3">
                        <label for="hari" class="form-label">Hari</label>
                        <select id="hari" class="form-select" required>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                            <option value="Sabtu">Sabtu</option>
                            <option value="Minggu">Minggu</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="jamPelatihan" class="form-label">Jam Pelatihan</label>
                        <input type="time" id="jamPelatihan" class="form-control" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="saveJadwalChangesBtn">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('addJadwalBtn').addEventListener('click', function() {
        document.getElementById('modalTitle').innerText = 'Tambah Jadwal';
        document.getElementById('jadwalId').value = '';
        document.getElementById('jadwalForm').reset();
        var myModal = new bootstrap.Modal(document.getElementById('jadwalModal'));
        myModal.show();
    });

    document.getElementById('saveJadwalChangesBtn').addEventListener('click', function() {
        const id = document.getElementById('jadwalId').value;
        const pendaftarId = document.getElementById('pendaftarId').value;
        const hari = document.getElementById('hari').value;
        const jamPelatihan = document.getElementById('jamPelatihan').value;

        if (id) {
            alert('Perbarui jadwal untuk pendaftar ID: ' + pendaftarId + ' pada hari: ' + hari);
        } else {
            alert('Tambah jadwal baru untuk pendaftar ID: ' + pendaftarId + ' pada hari: ' + hari);
        }

        var myModal = bootstrap.Modal.getInstance(document.getElementById('jadwalModal'));
        myModal.hide();
    });
</script>
@endsection