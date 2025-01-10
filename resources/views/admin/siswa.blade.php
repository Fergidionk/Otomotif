@extends('admin/components.app')
@section('content')
    <div class="container">
        <h4 class="fw-bold my-4 text-xl"><span class="text-muted fw-light">Data </span> Siswa</h4>
        <div class="my-4">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSiswaModal">Tambah Siswa</button>
        </div>
        <div class="card p-8">
            <div class="table-responsive text-nowrap">
                <table id="siswaTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Jenis Kelamin</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>No HP</th>
                            <th>Pendidikan Terakhir</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($siswa as $s)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $s->nama_siswa }}</td>
                                <td>{{ $s->alamat_siswa }}</td>
                                <td>{{ $s->jenis_kelamin }}</td>
                                <td>{{ $s->tempat_lahir }}</td>
                                <td>{{ $s->tanggal_lahir }}</td>
                                <td>{{ $s->no_hp }}</td>
                                <td>{{ $s->pendidikan_terakhir }}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editSiswaModal"
                                        data-id="{{ $s->id }}"
                                        data-nama="{{ $s->nama_siswa }}"
                                        data-alamat="{{ $s->alamat_siswa }}"
                                        data-jenis_kelamin="{{ $s->jenis_kelamin }}"
                                        data-tempat="{{ $s->tempat_lahir }}"
                                        data-tanggal="{{ $s->tanggal_lahir }}"
                                        data-no_hp="{{ $s->no_hp }}"
                                        data-pendidikan="{{ $s->pendidikan_terakhir }}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger delete-btn" data-id="{{ $s->id }}">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal untuk Tambah Siswa -->
    <div class="modal fade" id="addSiswaModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalTitle">Tambah Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('siswa.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="addNamaSiswa" class="form-label">Nama</label>
                            <input type="text" id="addNamaSiswa" name="nama_siswa" class="form-control" placeholder="Masukkan Nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="addAlamatSiswa" class="form-label">Alamat</label>
                            <input type="text" id="addAlamatSiswa" name="alamat_siswa" class="form-control" placeholder="Masukkan Alamat" required>
                        </div>
                        <div class="mb-3">
                            <label for="addJenisKelamin" class="form-label">Jenis Kelamin</label>
                            <select id="addJenisKelamin" name="jenis_kelamin" class="form-control" required>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="addTempatLahir" class="form-label">Tempat Lahir</label>
                            <input type="text" id="addTempatLahir" name="tempat_lahir" class="form-control" placeholder="Masukkan Tempat Lahir" required>
                        </div>
                        <div class="mb-3">
                            <label for="addTanggalLahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" id="addTanggalLahir" name="tanggal_lahir" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="addNoHP" class="form-label">No HP</label>
                            <input type="text" id="addNoHP" name="no_hp" class="form-control" placeholder="Masukkan No HP" required>
                        </div>
                        <div class="mb-3">
                            <label for="addPendidikan" class="form-label">Pendidikan Terakhir</label>
                            <select id="addPendidikan" name="pendidikan_terakhir" class="form-control" required>
                                <option value="TidakBersekolah">Tidak Bersekolah</option>
                                <option value="SD">SD</option>
                                <option value="SMP">SMP</option>
                                <option value="SMA">SMA</option>
                                <option value="PerguruanTinggi">Perguruan Tinggi</option>
                            </select>
                        </div>
                        <div class="alert alert-info">
                            Pastikan Anda mengisi semua field dengan benar.
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan Siswa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal untuk Edit Siswa -->
    <div class="modal fade" id="editSiswaModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSiswaModalTitle">Edit Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editSiswaForm" action="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="editNamaSiswa" class="form-label">Nama</label>
                            <input type="text" id="editNamaSiswa" name="nama_siswa" class="form-control" placeholder="Masukkan Nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="editAlamatSiswa" class="form-label">Alamat</label>
                            <input type="text" id="editAlamatSiswa" name="alamat_siswa" class="form-control" placeholder="Masukkan Alamat" required>
                        </div>
                        <div class="mb-3">
                            <label for="editJenisKelamin" class="form-label">Jenis Kelamin</label>
                            <select id="editJenisKelamin" name="jenis_kelamin" class="form-control" required>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="editTempatLahir" class="form-label">Tempat Lahir</label>
                            <input type="text" id="editTempatLahir" name="tempat_lahir" class="form-control" placeholder="Masukkan Tempat Lahir" required>
                        </div>
                        <div class="mb-3">
                            <label for="editTanggalLahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" id="editTanggalLahir" name="tanggal_lahir" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="editNoHP" class="form-label">No HP</label>
                            <input type="text" id="editNoHP" name="no_hp" class="form-control" placeholder="Masukkan No HP" required>
                        </div>
                        <div class="mb-3">
                            <label for="editPendidikan" class="form-label">Pendidikan Terakhir</label>
                            <select id="editPendidikan" name="pendidikan_terakhir" class="form-control" required>
                                <option value="TidakBersekolah">Tidak Bersekolah</option>
                                <option value="SD">SD</option>
                                <option value="SMP">SMP</option>
                                <option value="SMA">SMA</option>
                                <option value="PerguruanTinggi">Perguruan Tinggi</option>
                            </select>
                        </div>
                        <div class="alert alert-info">
                            Pastikan Anda mengisi semua field dengan benar.
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.tailwindcss.com/"></script>
    <script src="https://cdn.datatables.net/2.2.0/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.0/js/dataTables.tailwindcss.js"></script>

    <script>
        new DataTable('#siswaTable');
    </script>

    <script>
        const editSiswaModal = document.getElementById('editSiswaModal');
        editSiswaModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');
            const nama = button.getAttribute('data-nama');
            const alamat = button.getAttribute('data-alamat');
            const jenis_kelamin = button.getAttribute('data-jenis_kelamin');
            const tempat = button.getAttribute('data-tempat');
            const tanggal = button.getAttribute('data-tanggal');
            const no_hp = button.getAttribute('data-no_hp');
            const pendidikan = button.getAttribute('data-pendidikan');

            // Populate the form with existing data
            const editForm = document.getElementById('editSiswaForm');
            editForm.action = `/admin/siswa/${id}`; // Assuming the route for updating is /admin/siswa/{id}

            document.getElementById('editNamaSiswa').value = nama;
            document.getElementById('editAlamatSiswa').value = alamat;
            document.getElementById('editJenisKelamin').value = jenis_kelamin;
            document.getElementById('editTempatLahir').value = tempat;
            document.getElementById('editTanggalLahir').value = tanggal;
            document.getElementById('editNoHP').value = no_hp;
            document.getElementById('editPendidikan').value = pendidikan;
        });

        // Delete button functionality with confirmation
        const deleteButtons = document.querySelectorAll('.delete-btn');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                Swal.fire({
                    title: 'Yakin ingin menghapus?',
                    text: 'Data yang dihapus tidak dapat dikembalikan!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Send delete request
                        fetch(`/admin/siswa/${id}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                            }
                        }).then(response => {
                            if (response.ok) {
                                Swal.fire('Berhasil!', 'Data telah dihapus.', 'success')
                                    .then(() => location.reload());
                            } else {
                                Swal.fire('Gagal!', 'Terjadi kesalahan saat menghapus data.', 'error');
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
