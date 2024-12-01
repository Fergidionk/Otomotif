@extends('admin/components.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tabel /</span> Siswa</h4>

        <div class="mb-4">
            <button id="addStudentBtn" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Siswa</button>
        </div>

        <table class="min-w-full bg-white border border-gray-300" id="tabelSiswa">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">No</th>
                    <th class="py-2 px-4 border-b">Nama Siswa</th>
                    <th class="py-2 px-4 border-b">Alamat Siswa</th>
                    <th class="py-2 px-4 border-b">Jenis Kelamin</th>
                    <th class="py-2 px-4 border-b">Tempat Lahir</th>
                    <th class="py-2 px-4 border-b">Tanggal Lahir</th>
                    <th class="py-2 px-4 border-b">No HP</th>
                    <th class="py-2 px-4 border-b">Pendidikan Terakhir</th>
                    <th class="py-2 px-4 border-b">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="py-2 px-4 border-b">1</td>
                    <td class="py-2 px-4 border-b">John Doe</td>
                    <td class="py-2 px-4 border-b">Jl. Contoh No. 1</td>
                    <td class="py-2 px-4 border-b">Laki-laki</td>
                    <td class="py-2 px-4 border-b">Jakarta</td>
                    <td class="py-2 px-4 border-b">01-01-2000</td>
                    <td class="py-2 px-4 border-b">08123456789</td>
                    <td class="py-2 px-4 border-b">SMA</td>
                    <td class="py-2 px-4 border-b">
                        <button class="text-blue-500"
                            onclick="editStudent(1, 'John Doe', 'Jl. Contoh No. 1', 'Laki-laki', 'Jakarta', '2000-01-01', '08123456789', 'SMA')">Edit</button>
                        <button class="text-red-500" onclick="deleteStudent(1)">Hapus</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Modal untuk Tambah/Edit Siswa -->
        <div class="modal fade" id="studentModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitle">Tambah Siswa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="studentForm">
                            <input type="hidden" id="studentId" value="">
                            <div class="mb-3">
                                <label for="studentName" class="form-label">Nama Siswa</label>
                                <input type="text" id="studentName" class="form-control" placeholder="Masukkan Nama"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="studentAddress" class="form-label">Alamat Siswa</label>
                                <input type="text" id="studentAddress" class="form-control" placeholder="Masukkan Alamat"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="studentGender" class="form-label">Jenis Kelamin</label>
                                <select id="studentGender" class="form-select" required>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="studentBirthPlace" class="form-label">Tempat Lahir</label>
                                <input type="text" id="studentBirthPlace" class="form-control"
                                    placeholder="Masukkan Tempat Lahir" required>
                            </div>
                            <div class="mb-3">
                                <label for="studentBirthDate" class="form-label">Tanggal Lahir</label>
                                <input type="date" id="studentBirthDate" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="studentPhone" class="form-label">No HP</label>
                                <input type="text" id="studentPhone" class="form-control" placeholder="Masukkan No HP"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="studentEducation" class="form-label">Pendidikan Terakhir</label>
                                <select id="studentEducation" class="form-select" required>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA">SMA</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary" id="saveChangesBtn">Simpan Perubahan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    

    <script>
        document.getElementById('addStudentBtn').addEventListener('click', function() {
            document.getElementById('modalTitle').innerText = 'Tambah Siswa';
            document.getElementById('studentId').value = '';
            document.getElementById('studentForm').reset();
            var myModal = new bootstrap.Modal(document.getElementById('studentModal'));
            myModal.show();
        });

        function editStudent(id, name, address, gender, birthPlace, birthDate, phone, education) {
            document.getElementById('modalTitle').innerText = 'Edit Siswa';
            document.getElementById('studentId').value = id;
            document.getElementById('studentName').value = name;
            document.getElementById('studentAddress').value = address;
            document.getElementById('studentGender').value = gender;
            document.getElementById('studentBirthPlace').value = birthPlace;
            document.getElementById('studentBirthDate').value = birthDate;
            document.getElementById('studentPhone').value = phone;
            document.getElementById(' studentEducation').value = education;
            var myModal = new bootstrap.Modal(document.getElementById('studentModal'));
            myModal.show();
        }

        document.getElementById('saveChangesBtn').addEventListener('click', function() {
            const id = document.getElementById('studentId').value;
            const name = document.getElementById('studentName').value;
            const address = document.getElementById('studentAddress').value;
            const gender = document.getElementById('studentGender').value;
            const birthPlace = document.getElementById('studentBirthPlace').value;
            const birthDate = document.getElementById('studentBirthDate').value;
            const phone = document.getElementById('studentPhone').value;
            const education = document.getElementById('studentEducation').value;

            if (id) {
                alert('Perbarui siswa: ' + name + ' dengan alamat: ' + address);
            } else {
                alert('Tambah siswa baru: ' + name + ' dengan alamat: ' + address);
            }

            var myModal = bootstrap.Modal.getInstance(document.getElementById('studentModal'));
            myModal.hide();
        });
    </script>
@endsection
