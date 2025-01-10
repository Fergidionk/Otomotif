@extends('admin/components.app')

@section('content')
    <div class="container">
        <h4 class="fw-bold my-4 text-xl"><span class="text-muted fw-light">Data</span> Absensi</h4>

        <div class="my-4">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAbsensiModal">Tambah Absensi</button>
        </div>

        <div class="card p-8">
            <div class="table-responsive text-nowrap">
                <table id="absensiTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Paket</th>
                            <th>Pertemuan Ke</th>
                            <th>Status Kehadiran</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($absensi as $a)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $a->pendaftar->siswa->nama_lengkap }}</td>
                                <td>{{ $a->pendaftar->paket->nama_paket }}</td>
                                <td>{{ $a->pertemuan_ke }}</td>
                                <td>{{ $a->hadir ? 'Hadir' : 'Tidak Hadir' }}</td>
                                <td>{{ $a->created_at->format('d-m-Y') }}</td>
                                <td>
                                    <button class="btn btn-sm btn-info" data-bs-toggle="modal" 
                                        data-bs-target="#detailAbsensiModal" data-id="{{ $a->id }}"
                                        data-nama="{{ $a->pendaftar->siswa->nama_lengkap }}"
                                        data-paket="{{ $a->pendaftar->paket->nama_paket }}"
                                        data-pertemuan="{{ $a->pertemuan_ke }}"
                                        data-hadir="{{ $a->hadir }}"
                                        data-tanggal="{{ $a->created_at->format('d-m-Y') }}">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#editAbsensiModal" data-id="{{ $a->id }}"
                                        data-jadwal_id="{{ $a->jadwal_id }}" data-pertemuan_ke="{{ $a->pertemuan_ke }}"
                                        data-hadir="{{ $a->hadir }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger delete-btn" data-id="{{ $a->id }}">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Detail Absensi Modal -->
        <div class="modal fade" id="detailAbsensiModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail Absensi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nama Siswa</label>
                            <p id="detail_nama" class="form-control"></p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Paket</label>
                            <p id="detail_paket" class="form-control"></p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pertemuan Ke</label>
                            <p id="detail_pertemuan" class="form-control"></p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status Kehadiran</label>
                            <p id="detail_hadir" class="form-control"></p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal</label>
                            <p id="detail_tanggal" class="form-control"></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Absensi Modal -->
        <div class="modal fade" id="addAbsensiModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('absensi.store') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Absensi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="jadwal_id" class="form-label">Siswa</label>
                                <select name="jadwal_id" id="jadwal_id" class="form-select">
                                    @foreach ($absensi as $a)
                                        <option value="{{ $p->id }}">
                                            {{ $a->$jadwal->$pendaftaran->$siswa->nama_lengkap }} -
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="pertemuan_ke" class="form-label">Pertemuan Ke</label>
                                <input type="number" name="pertemuan_ke" id="pertemuan_ke" class="form-control"
                                    min="1">
                            </div>

                            <div class="mb-3">
                                <label for="hadir" class="form-label">Status Kehadiran</label>
                                <select name="hadir" id="hadir" class="form-select">
                                    <option value="1">Hadir</option>
                                    <option value="0">Tidak Hadir</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Edit Absensi Modal -->
        <div class="modal fade" id="editAbsensiModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="" method="POST" id="editAbsensiForm">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Absensi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="jadwal_id" class="form-label">Siswa</label>
                                <select name="jadwal_id" id="jadwal_id" class="form-select">
                                    @foreach ($absensi as $a)
                                        <option value="{{ $p->id }}">
                                            {{ $a->$jadwal->$pendaftaran->$siswa->nama_lengkap }} -
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="pertemuan_ke" class="form-label">Pertemuan Ke</label>
                                <input type="number" name="pertemuan_ke" id="pertemuan_ke" class="form-control"
                                    min="1">
                            </div>

                            <div class="mb-3">
                                <label for="hadir" class="form-label">Status Kehadiran</label>
                                <select name="hadir" id="hadir" class="form-select">
                                    <option value="1">Hadir</option>
                                    <option value="0">Tidak Hadir</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="https://cdn.tailwindcss.com/"></script>
        <script src="https://cdn.datatables.net/2.2.0/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.2.0/js/dataTables.tailwindcss.js"></script>

        <script>
            new DataTable('#absensiTable');
        </script>

        <script>
            new DataTable('#absensiTable');

            const detailAbsensiModal = document.getElementById('detailAbsensiModal');
            detailAbsensiModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const nama = button.getAttribute('data-nama');
                const paket = button.getAttribute('data-paket');
                const pertemuan = button.getAttribute('data-pertemuan');
                const hadir = button.getAttribute('data-hadir');
                const tanggal = button.getAttribute('data-tanggal');

                document.getElementById('detail_nama').textContent = nama;
                document.getElementById('detail_paket').textContent = paket;
                document.getElementById('detail_pertemuan').textContent = pertemuan;
                document.getElementById('detail_hadir').textContent = hadir == 1 ? 'Hadir' : 'Tidak Hadir';
                document.getElementById('detail_tanggal').textContent = tanggal;
            });

            const editAbsensiModal = document.getElementById('editAbsensiModal');
            editAbsensiModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const id = button.getAttribute('data-id');
                const jadwal_id = button.getAttribute('data-jadwal_id');
                const pertemuan_ke = button.getAttribute('data-pertemuan_ke');
                const hadir = button.getAttribute('data-hadir');

                document.getElementById('edit_jadwal_id').value = jadwal_id;
                document.getElementById('edit_pertemuan_ke').value = pertemuan_ke;
                document.getElementById('edit_hadir').value = hadir;

                const form = document.getElementById('editAbsensiForm');
                form.action = '/admin/absensi/' + id;
            });

            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Anda tidak akan dapat mengembalikan ini!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#6a11cb',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const form = document.createElement('form');
                            form.method = 'POST';
                            form.action = '/admin/jadwal/' + id;
                            form.innerHTML = `
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="DELETE">
                        `;
                            document.body.appendChild(form);
                            form.submit();
                        }
                    });
                });
            });
        </script>
@endsection
