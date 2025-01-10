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
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#editJadwalModal" data-id="{{ $j->id }}"
                                        data-siswa_id="{{ $j->pendaftaran->siswa_id }}"
                                        data-paket_id="{{ $j->pendaftaran->paket_id }}"
                                        data-tanggal_daftar="{{ $j->pendaftaran->tanggal_daftar }}"
                                        data-metode_pembayaran="{{ $j->pendaftaran->metode_pembayaran }}"
                                        data-status_pembayaran="{{ $j->pendaftaran->status_pembayaran }}"
                                        data-hari="{{ $j->hari }}"
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
                                @foreach ($jadwal as $j)
                                    <option value="{{ $j->$pendaftaran->$id }}">{{ $j->$pendaftaran->siswa->nama_lengkap }} - {{ $j->$pendaftaran->paket->nama_paket }} - {{ $j->$pendaftaran->tanggal_daftar }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="hari" class="form-label">Hari Pelatihan</label>
                            <input type="text" name="hari" id="hari" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="jam_pelatihan" class="form-label">Jam Pelatihan</label>
                            <input type="text" name="jam_pelatihan" id="jam_pelatihan" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
                <form action="{{ route('jadwal.update', '') }}" method="POST" id="editPendaftaranForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editJadwalModalLabel">Edit Pendaftaran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="edit_pendaftaran_id" class="form-label">Data Pendaftaran</label>
                            <select name="pendaftaran_id" id="edit_pendaftaran_id" class="form-select">
                                @foreach ($jadwal as $j)
                                    <option value="{{ $p->id }}">{{ $p->siswa->nama_lengkap }} - {{ $p->paket->nama_paket }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="edit_hari" class="form-label">Hari Pelatihan</label>
                            <input type="text" name="hari" id="edit_hari" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="edit_jam_pelatihan" class="form-label">Jam Pelatihan</label>
                            <input type="text" name="jam_pelatihan" id="edit_jam_pelatihan" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
        const editJadwalModal = document.getElementById('editJadwalModal');
        editJadwalModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');
            const pendaftaran_id = button.getAttribute('data-pendaftaran_id');
            const hari = button.getAttribute('data-hari');
            const jam_pelatihan = button.getAttribute('data-jam_pelatihan');

            const modalTitle = editJadwalModal.querySelector('.modal-title');
            modalTitle.textContent = 'Edit Jadwal';

            const editPendaftaranId = document.getElementById('edit_pendaftaran_id');
            const editHari = document.getElementById('edit_hari');
            const editJamPelatihan = document.getElementById('edit_jam_pelatihan');

            editPendaftaranId.value = pendaftaran_id;
            editHari.value = hari;
            editJamPelatihan.value = jam_pelatihan;

            const form = document.getElementById('editPendaftaranForm');
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
