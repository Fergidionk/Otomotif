@if(isset($users))
    <!-- {{ count($users) }} users available -->
@endif

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
                            <th>Email User</th>
                            <th>Alamat</th>
                            <th>Jenis Kelamin</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>No HP</th>
                            <th>Pendidikan Terakhir</th>
                            <th>Berkas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($siswa as $s)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $s->nama_siswa }}</td>
                                <td>{{ $s->user->email }}</td>
                                <td>{{ $s->alamat_siswa }}</td>
                                <td>{{ $s->jenis_kelamin }}</td>
                                <td>{{ $s->tempat_lahir }}</td>
                                <td>{{ $s->tanggal_lahir }}</td>
                                <td>{{ $s->no_hp }}</td>
                                <td>{{ $s->pendidikan_terakhir }}</td>
                                <td>
                                    @if ($s->berkas_pdf)
                                        <a href="{{ asset('storage/' . $s->berkas_pdf) }}" target="_blank"
                                            class="btn btn-sm btn-info">
                                            <i class="fa-solid fa-file-pdf"></i>
                                        </a>
                                    @else
                                        <span class="badge bg-warning">Tidak ada berkas</span>
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-info" data-bs-toggle="modal" 
                                        data-bs-target="#detailSiswaModal" data-id="{{ $s->id }}"
                                        data-nama="{{ $s->nama_siswa }}" data-alamat="{{ $s->alamat_siswa }}"
                                        data-jenis_kelamin="{{ $s->jenis_kelamin }}" data-tempat="{{ $s->tempat_lahir }}"
                                        data-tanggal="{{ $s->tanggal_lahir }}" data-no_hp="{{ $s->no_hp }}"
                                        data-pendidikan="{{ $s->pendidikan_terakhir }}">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#editSiswaModal" data-id="{{ $s->id }}"
                                        data-nama="{{ $s->nama_siswa }}" data-alamat="{{ $s->alamat_siswa }}"
                                        data-jenis_kelamin="{{ $s->jenis_kelamin }}" data-tempat="{{ $s->tempat_lahir }}"
                                        data-tanggal="{{ $s->tanggal_lahir }}" data-no_hp="{{ $s->no_hp }}"
                                        data-pendidikan="{{ $s->pendidikan_terakhir }}" data-email="{{ $s->user->email }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger delete-btn" data-id="{{ $s->id }}" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
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

    <!-- Modal untuk Detail Siswa -->
    <div class="modal fade" id="detailSiswaModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailSiswaModalTitle">Detail Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama</label>
                        <p id="detailNamaSiswa"></p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Alamat</label>
                        <p id="detailAlamatSiswa"></p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Jenis Kelamin</label>
                        <p id="detailJenisKelamin"></p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Tempat Lahir</label>
                        <p id="detailTempatLahir"></p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Tanggal Lahir</label>
                        <p id="detailTanggalLahir"></p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">No HP</label>
                        <p id="detailNoHP"></p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Pendidikan Terakhir</label>
                        <p id="detailPendidikan"></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk Tambah Siswa -->
    <div class="modal fade" id="addSiswaModal" tabindex="-1" role="dialog" aria-labelledby="addModalTitle">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalTitle">Tambah Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addSiswaForm" action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="addNamaSiswa" class="form-label">Nama</label>
                            <input type="text" id="addNamaSiswa" name="nama_siswa" class="form-control"
                                placeholder="Masukkan Nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="addEmailUser" class="form-label">Email User</label>
                            <select id="addEmailUser" name="email" class="form-control" required>
                                <option class="text-muted" disabled selected>Pilih Email User</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->email }}">{{ $user->email }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="addAlamatSiswa" class="form-label">Alamat</label>
                            <input type="text" id="addAlamatSiswa" name="alamat_siswa" class="form-control"
                                placeholder="Masukkan Alamat" required>
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
                            <input type="text" id="addTempatLahir" name="tempat_lahir" class="form-control"
                                placeholder="Masukkan Tempat Lahir" required>
                        </div>
                        <div class="mb-3">
                            <label for="addTanggalLahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" id="addTanggalLahir" name="tanggal_lahir" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="addNoHP" class="form-label">No HP</label>
                            <input type="text" id="addNoHP" name="no_hp" class="form-control"
                                placeholder="Masukkan No HP" required>
                        </div>
                        <div class="mb-3">
                            <label for="addPendidikan" class="form-label">Pendidikan Terakhir</label>
                            <select id="addPendidikan" name="pendidikan_terakhir" class="form-control" required>
                                <option value="">Pilih Pendidikan Terakhir</option>
                                <option value="TidakBersekolah">Tidak Bersekolah</option>
                                <option value="SD">SD/MI</option>
                                <option value="SMP">SMP/MTs</option>
                                <option value="SMA">SMA/SMK</option>
                                <option value="PerguruanTinggi">Perguruan Tinggi/Universitas</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="addBerkasPDF" class="form-label">Berkas PDF</label>
                            <input type="file" id="addBerkasPDF" name="berkas_pdf" class="form-control"
                                accept=".pdf" required>
                            <small class="text-muted">Upload file PDF (Maks. 5MB)</small>
                        </div>
                        <div class="alert alert-info">
                            Pastikan Anda mengisi semua field dengan benar.
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" id="submitBtn">Simpan Siswa</button>
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
                            <input type="text" id="editNamaSiswa" name="nama_siswa" class="form-control"
                                placeholder="Masukkan Nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="editEmailUser" class="form-label">Email User</label>
                            <select id="editEmailUser" name="email" class="form-control" required>
                                <option value="">Pilih Email User</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->email }}">{{ $user->email }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="editAlamatSiswa" class="form-label">Alamat</label>
                            <input type="text" id="editAlamatSiswa" name="alamat_siswa" class="form-control"
                                placeholder="Masukkan Alamat" required>
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
                            <input type="text" id="editTempatLahir" name="tempat_lahir" class="form-control"
                                placeholder="Masukkan Tempat Lahir" required>
                        </div>
                        <div class="mb-3">
                            <label for="editTanggalLahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" id="editTanggalLahir" name="tanggal_lahir" class="form-control"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="editNoHP" class="form-label">No HP</label>
                            <input type="text" id="editNoHP" name="no_hp" class="form-control"
                                placeholder="Masukkan No HP" required>
                        </div>
                        <div class="mb-3">
                            <label for="editPendidikan" class="form-label">Pendidikan Terakhir</label>
                            <select id="editPendidikan" name="pendidikan_terakhir" class="form-control" required>
                                <option value="TidakBersekolah">Tidak Bersekolah</option>
                                <option value="SD">SD/MI</option>
                                <option value="SMP">SMP/MTs</option>
                                <option value="SMA">SMA/SMK</option>
                                <option value="PerguruanTinggi">Perguruan Tinggi/Universitas</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="editBerkasPDF" class="form-label">Berkas PDF</label>
                            <input type="file" id="editBerkasPDF" name="berkas_pdf" class="form-control"
                                accept=".pdf">
                            <small class="text-muted">Upload file PDF baru jika ingin mengubah (Maks. 5MB)</small>
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

    <!-- Modal Konfirmasi Hapus -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-lg shadow-lg">
                <div class="modal-header border-b border-gray-200">
                    <h5 class="modal-title text-lg font-semibold" id="confirmDeleteModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <p class="text-gray-700">Apakah Anda yakin ingin menghapus data ini? Data yang dihapus tidak dapat dikembalikan.</p>
                </div>
                <div class="modal-footer border-t border-gray-200">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Notifikasi dengan Tailwind -->
    <div class="modal fade" id="notificationModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-white rounded-xl shadow-2xl transform transition-all">
                <div class="modal-header flex items-center justify-between p-4 border-b border-gray-200">
                    <h5 class="modal-title text-xl font-semibold text-gray-800" id="notifTitle"></h5>
                    <button type="button" class="text-gray-400 hover:text-gray-500 focus:outline-none" data-bs-dismiss="modal" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="modal-body p-6">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0" id="notifIcon">
                            <!-- Icon akan diisi melalui JavaScript -->
                        </div>
                        <p class="text-gray-600 text-base" id="notifMessage"></p>
                    </div>
                </div>
                <div class="modal-footer bg-gray-50 px-6 py-3 flex justify-end space-x-2 rounded-b-xl">
                    <button type="button" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-md focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-blue-500" data-bs-dismiss="modal">OK</button>
                </div>
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
        // Detail Modal
        const detailSiswaModal = document.getElementById('detailSiswaModal');
        detailSiswaModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const nama = button.getAttribute('data-nama');
            const alamat = button.getAttribute('data-alamat');
            const jenis_kelamin = button.getAttribute('data-jenis_kelamin');
            const tempat = button.getAttribute('data-tempat');
            const tanggal = button.getAttribute('data-tanggal');
            const no_hp = button.getAttribute('data-no_hp');
            const pendidikan = button.getAttribute('data-pendidikan');

            // Populate detail modal
            document.getElementById('detailNamaSiswa').textContent = nama;
            document.getElementById('detailAlamatSiswa').textContent = alamat;
            document.getElementById('detailJenisKelamin').textContent = jenis_kelamin;
            document.getElementById('detailTempatLahir').textContent = tempat;
            document.getElementById('detailTanggalLahir').textContent = tanggal;
            document.getElementById('detailNoHP').textContent = no_hp;
            document.getElementById('detailPendidikan').textContent = pendidikan;
        });

        // Edit Modal
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
            const berkas = button.getAttribute('data-berkas');
            const email = button.getAttribute('data-email');

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

            if (berkas) {
                const berkasInfo = document.createElement('div');
                berkasInfo.className = 'mt-2 text-sm text-gray-600';
                berkasInfo.textContent = `Berkas saat ini: ${berkas}`;
                document.getElementById('editBerkasPDF').parentNode.appendChild(berkasInfo);
            }

            document.getElementById('editEmailUser').value = email;
        });

        let deleteId;

        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function() {
                deleteId = this.getAttribute('data-id');
            });
        });

        document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '/admin/siswa/' + deleteId;
            form.innerHTML = `
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="DELETE">
            `;
            document.body.appendChild(form);
            form.submit();
        });

        $(document).ready(function() {
            const modal = $('#addSiswaModal');
            const form = $('#addSiswaForm');
            const submitBtn = $('#submitBtn');

            // Hapus pesan error saat input berubah
            form.find('input, select').on('change', function() {
                $(this).removeClass('is-invalid');
                $(this).siblings('.invalid-feedback').remove();
            });

            // Handler untuk form tambah siswa
            $('#addSiswaForm').on('submit', function(e) {
                e.preventDefault();
                const form = $(this);
                const submitBtn = $('#submitBtn');
                submitBtn.prop('disabled', true);

                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success) {
                            $('#addSiswaModal').modal('hide');
                            form[0].reset();
                            // Langsung reload setelah modal tertutup
                            $('#addSiswaModal').on('hidden.bs.modal', function () {
                                window.location.reload();
                            });
                        }
                    },
                    error: function(xhr) {
                        submitBtn.prop('disabled', false);
                        
                        if (xhr.status === 422) {
                            const errors = xhr.responseJSON.errors;
                            Object.keys(errors).forEach(function(key) {
                                const input = $(`[name="${key}"]`);
                                input.addClass('is-invalid');
                                const feedback = $('<div>')
                                    .addClass('invalid-feedback')
                                    .text(errors[key][0]);
                                input.after(feedback);
                            });
                            showNotification('Error', 'Mohon periksa kembali input Anda');
                        } else if (xhr.status === 500) {
                            const response = xhr.responseJSON;
                            console.error('Server Error:', response.error);
                            showNotification('Error', response.message);
                        } else {
                            showNotification('Error', 'Terjadi kesalahan saat menyimpan data');
                        }
                    },
                    complete: function() {
                        submitBtn.prop('disabled', false);
                    }
                });
            });

            // Reset form dan error messages saat modal dibuka/ditutup
            modal.on('show.bs.modal', function() {
                form[0].reset();
                submitBtn.prop('disabled', false);
                $('.is-invalid').removeClass('is-invalid');
                $('.invalid-feedback').remove();
            });

            modal.on('hidden.bs.modal', function() {
                form[0].reset();
                submitBtn.prop('disabled', false);
                $('.is-invalid').removeClass('is-invalid');
                $('.invalid-feedback').remove();
            });

            // Handler untuk form edit siswa
            $('#editSiswaForm').on('submit', function(e) {
                e.preventDefault();
                const form = $(this);
                
                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success) {
                            $('#editSiswaModal').modal('hide');
                            // Langsung reload setelah modal tertutup
                            $('#editSiswaModal').on('hidden.bs.modal', function () {
                                window.location.reload();
                            });
                        }
                    },
                    error: function(xhr) {
                        showNotification('Error', 'Gagal memperbarui data siswa');
                    }
                });
            });

            // Handler untuk hapus siswa
            $('#confirmDeleteBtn').click(function() {
                if (deleteId) {
                    $.ajax({
                        url: `/admin/siswa/${deleteId}`,
                        type: 'DELETE',
                        data: {
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function(response) {
                            if (response.success) {
                                $('#confirmDeleteModal').modal('hide');
                                // Langsung reload setelah modal tertutup
                                $('#confirmDeleteModal').on('hidden.bs.modal', function () {
                                    window.location.reload();
                                });
                            }
                        },
                        error: function(xhr) {
                            $('#confirmDeleteModal').modal('hide');
                            showNotification('Error', 'Gagal menghapus data siswa');
                        }
                    });
                }
            });

            // Tambahkan validasi input nomor HP untuk hanya menerima angka
            $('#addNoHP, #editNoHP').on('input', function() {
                this.value = this.value.replace(/[^0-9]/g, '');
            });

            // Inisialisasi modal notifikasi
            const notifModal = new bootstrap.Modal(document.getElementById('notificationModal'));
            
            // Fungsi untuk menampilkan notifikasi
            function showNotification(title, message) {
                $('#notifTitle').text(title);
                $('#notifMessage').text(message);
                
                const isSuccess = !title.toLowerCase().includes('error');
                const icon = isSuccess ? `
                    <div class="flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                        <svg class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                ` : `
                    <div class="flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                        <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </div>
                `;
                
                $('#notifIcon').html(icon);
                notifModal.show();
            }
        });
    </script>

    <style>
        select.form-control {
            appearance: auto !important;
            -webkit-appearance: auto !important;
            -moz-appearance: auto !important;
            background-repeat: no-repeat !important;
            background-position: right 0.75rem center !important;
            background-size: 16px 12px !important;
            padding-right: 2rem !important;
        }

        .invalid-feedback {
            display: block;
            width: 100%;
            margin-top: 0.25rem;
            font-size: 0.875em;
            color: #dc3545;
        }

        .is-invalid {
            border-color: #dc3545;
        }
    </style>
@endsection
