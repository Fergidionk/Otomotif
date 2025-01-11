@extends('admin/components.app')

@section('content')
    <div class="container">
        <h4 class="fw-bold my-4 text-xl"><span class="text-muted fw-light">Data</span> Jadwal</h4>

        <div class="my-4">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addJadwalModal">Tambah
                Jadwal</button>
        </div>

        <div class="card p-8">
            <div class="table-responsive text-nowrap">
                <table id="pendaftaranTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Data Siswa</th>
                            <th>Data Paket</th>
                            <th>Tanggal Daftar</th>
                            <th>Metode Pembayaran</th>
                            <th>Status Pembayaran</th>
                            <th>Hari Pelatihan</th>
                            <th>Jam Pelatihan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($jadwal as $j)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $j->pendaftaran->siswa->nama_lengkap }}</td>
                                <td>{{ $j->pendaftaran->paket->nama_paket }}</td>
                                <td>{{ $j->pendaftaran->tanggal_daftar }}</td>
                                <td>{{ $j->pendaftaran->metode_pembayaran }}</td>
                                <td>{{ $j->pendaftaran->status_pembayaran }}</td>
                                <td>{{ $j->hari }}</td>
                                <td>{{ $j->jam_pelatihan }}</td>
                                <td>
                                    <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                                        data-bs-target="#detailJadwalModal" data-id="{{ $j->id }}"
                                        data-siswa="{{ $j->pendaftaran->siswa->nama_lengkap }}"
                                        data-paket="{{ $j->pendaftaran->paket->nama_paket }}"
                                        data-tanggal="{{ $j->pendaftaran->tanggal_daftar }}"
                                        data-metode="{{ $j->pendaftaran->metode_pembayaran }}"
                                        data-status="{{ $j->pendaftaran->status_pembayaran }}"
                                        data-hari="{{ $j->hari }}"
                                        data-jam="{{ $j->jam_pelatihan }}">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#editJadwalModal" data-id="{{ $j->id }}"
                                        data-pendaftaran_id="{{ $j->pendaftaran_id }}"
                                        data-tanggal="{{ $j->tanggal }}"
                                        data-jam_pelatihan="{{ $j->jam_pelatihan }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger delete-btn" data-id="{{ $j->id }}">
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

    <!-- Detail Jadwal Modal -->
    <div class="modal fade" id="detailJadwalModal" tabindex="-1" aria-labelledby="detailJadwalModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailJadwalModalLabel">Detail Jadwal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Siswa</label>
                        <p id="detailSiswa"></p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Paket</label>
                        <p id="detailPaket"></p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Tanggal Daftar</label>
                        <p id="detailTanggal"></p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Metode Pembayaran</label>
                        <p id="detailMetode"></p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Status Pembayaran</label>
                        <p id="detailStatus"></p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Hari Pelatihan</label>
                        <p id="detailHari"></p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Jam Pelatihan</label>
                        <p id="detailJam"></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Jadwal Modal -->
    <div class="modal fade" id="addJadwalModal" tabindex="-1" aria-labelledby="addJadwalModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('jadwal.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addJadwalModalLabel">Tambah Jadwal</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="pendaftaran_id" class="form-label">Data Pendaftaran</label>
                            <select name="pendaftaran_id" id="pendaftaran_id" class="form-select">
                                @foreach ($pendaftaran as $p)
                                    <option value="{{ $p->id }}">{{ $p->siswa->nama_siswa }} - {{ $p->paket->nama_paket }} - {{ date('Y-m-d', strtotime($p->tanggal_daftar)) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal Pelatihan</label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="jam_pelatihan" class="form-label">Jam Pelatihan</label>
                            <input type="time" name="jam_pelatihan" id="jam_pelatihan" class="form-control">
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

    <!-- Edit Jadwal Modal -->
    <div class="modal fade" id="editJadwalModal" tabindex="-1" aria-labelledby="editJadwalModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('jadwal.update', '') }}" method="POST" id="editJadwalForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editJadwalModalLabel">Edit Jadwal</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="edit_pendaftaran_id" class="form-label">Data Pendaftaran</label>
                            <select name="pendaftaran_id" id="edit_pendaftaran_id" class="form-select">
                                @foreach ($jadwal as $j)
                                    <option value="{{ $j->pendaftaran->id }}">{{ $j->pendaftaran->siswa->nama_lengkap }} - {{ $j->pendaftaran->paket->nama_paket }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="edit_tanggal" class="form-label">Tanggal Pelatihan</label>
                            <input type="date" name="tanggal" id="edit_tanggal" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="edit_jam_pelatihan" class="form-label">Jam Pelatihan</label>
                            <input type="time" name="jam_pelatihan" id="edit_jam_pelatihan" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Update</button>
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
        new DataTable('#pendaftaranTable');
    </script>

    <script>
        // Detail Modal
        const detailJadwalModal = document.getElementById('detailJadwalModal');
        detailJadwalModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const siswa = button.getAttribute('data-siswa');
            const paket = button.getAttribute('data-paket');
            const tanggal = button.getAttribute('data-tanggal');
            const metode = button.getAttribute('data-metode');
            const status = button.getAttribute('data-status');
            const hari = button.getAttribute('data-hari');
            const jam = button.getAttribute('data-jam');

            document.getElementById('detailSiswa').textContent = siswa;
            document.getElementById('detailPaket').textContent = paket;
            document.getElementById('detailTanggal').textContent = tanggal;
            document.getElementById('detailMetode').textContent = metode;
            document.getElementById('detailStatus').textContent = status;
            document.getElementById('detailHari').textContent = hari;
            document.getElementById('detailJam').textContent = jam;
        });

        // Edit Modal
        const editJadwalModal = document.getElementById('editJadwalModal');
        editJadwalModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');
            const pendaftaran_id = button.getAttribute('data-pendaftaran_id');
            const tanggal = button.getAttribute('data-tanggal');
            const jam_pelatihan = button.getAttribute('data-jam_pelatihan');

            const modalTitle = editJadwalModal.querySelector('.modal-title');
            modalTitle.textContent = 'Edit Jadwal';

            const editPendaftaranId = document.getElementById('edit_pendaftaran_id');
            const editTanggal = document.getElementById('edit_tanggal');
            const editJamPelatihan = document.getElementById('edit_jam_pelatihan');

            editPendaftaranId.value = pendaftaran_id;
            editTanggal.value = tanggal;
            editJamPelatihan.value = jam_pelatihan;

            const form = document.getElementById('editJadwalForm');
            form.action = '/admin/jadwal/' + id;
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
