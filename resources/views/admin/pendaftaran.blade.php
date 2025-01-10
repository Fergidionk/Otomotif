@extends('admin/components.app')

@section('content')
    <div class="container">
        <h4 class="fw-bold my-4 text-xl"><span class="text-muted fw-light">Data</span> Pendaftaran</h4>

        <div class="my-4">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPendaftaranModal">Tambah
                Pendaftaran</button>
        </div>

        <div class="card p-8">
            <div class="table-responsive text-nowrap">
                <table id="pendaftaranTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Nama Paket</th>
                            <th>Tanggal Daftar</th>
                            <th>Metode Pembayaran</th>
                            <th>Status Pembayaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($pendaftaran as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->siswa->all }}</td>
                                <td>{{ $p->paket->all }}</td>
                                <td>{{ $p->tanggal_daftar }}</td>
                                <td>{{ $p->metode_pembayaran }}</td>
                                <td>{{ $p->status_pembayaran }}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#editPendaftaranModal" data-id="{{ $p->id }}"
                                        data-siswa_id="{{ $p->siswa_id }}" 
                                        data-paket_id="{{ $p->paket_id }}"
                                        data-tanggal_daftar="{{ $p->tanggal_daftar }}"
                                        data-metode_pembayaran="{{ $p->metode_pembayaran }}"
                                        data-status_pembayaran="{{ $p->status_pembayaran }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger delete-btn" data-id="{{ $p->id }}">
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

    <!-- Add Pendaftaran Modal -->
    <div class="modal fade" id="addPendaftaranModal" tabindex="-1" aria-labelledby="addPendaftaranModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('pendaftaran.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addPendaftaranModalLabel">Tambah Pendaftaran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="siswa_id" class="form-label">Nama Siswa</label>
                            <select name="siswa_id" id="siswa_id" class="form-select">
                                @foreach ($siswa as $s)
                                    <option value="{{ $s->id }}">{{ $s->nama_siswa }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="paket_id" class="form-label">Nama Paket</label>
                            <select name="paket_id" id="paket_id" class="form-select">
                                @foreach ($paket as $p)
                                    <option value="{{ $p->id }}">{{ $p->nama_paket }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_daftar" class="form-label">Tanggal Daftar</label>
                            <input type="date" name="tanggal_daftar" id="tanggal_daftar" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
                            <select name="metode_pembayaran" id="metode_pembayaran" class="form-select">
                                <option value="UangTunai">Uang Tunai</option>
                                <option value="Transfer">Transfer</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="status_pembayaran" class="form-label">Status Pembayaran</label>
                            <select name="status_pembayaran" id="status_pembayaran" class="form-select">
                                <option value="SudahDibayar">Sudah Dibayar</option>
                                <option value="BelumDibayar">Belum Dibayar</option>
                            </select>
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

    <!-- Edit Pendaftaran Modal -->
    <div class="modal fade" id="editPendaftaranModal" tabindex="-1" aria-labelledby="editPendaftaranModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('pendaftaran.update', '') }}" method="POST" id="editPendaftaranForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editPendaftaranModalLabel">Edit Pendaftaran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="edit_siswa_id" class="form-label">Nama Siswa</label>
                            <select name="siswa_id" id="edit_siswa_id" class="form-select">
                                @foreach ($siswa as $s)
                                    <option value="{{ $s->id }}">{{ $s->nama_lengkap }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="edit_paket_id" class="form-label">Nama Paket</label>
                            <select name="paket_id" id="edit_paket_id" class="form-select">
                                @foreach ($paket as $p)
                                    <option value="{{ $p->id }}">{{ $p->nama_paket }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="edit_tanggal_daftar" class="form-label">Tanggal Daftar</label>
                            <input type="date" name="tanggal_daftar" id="edit_tanggal_daftar" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="edit_metode_pembayaran" class="form-label">Metode Pembayaran</label>
                            <select name="metode_pembayaran" id="edit_metode_pembayaran" class="form-select">
                                <option value="UangTunai">Uang Tunai</option>
                                <option value="Transfer">Transfer</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="edit_status_pembayaran" class="form-label">Status Pembayaran</label>
                            <select name="status_pembayaran" id="edit_status_pembayaran" class="form-select">
                                <option value="SudahDibayar">Sudah Dibayar</option>
                                <option value="BelumDibayar">Belum Dibayar</option>
                            </select>
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
        const editPendaftaranModal = document.getElementById('editPendaftaranModal');
        editPendaftaranModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');
            const siswa_id = button.getAttribute('data-siswa_id');
            const paket_id = button.getAttribute('data-paket_id');
            const tanggal_daftar = button.getAttribute('data-tanggal_daftar');
            const metode_pembayaran = button.getAttribute('data-metode_pembayaran');
            const status_pembayaran = button.getAttribute('data-status_pembayaran');

            const modalTitle = editPendaftaranModal.querySelector('.modal-title');
            modalTitle.textContent = 'Edit Pendaftaran - ' +
                siswa_id; // You can replace this with the actual student name if available

            const editSiswaName = document.getElementById('edit_siswa_id');
            const editPaketName = document.getElementById('edit_paket_id');
            const editTanggalDaftar = document.getElementById('edit_tanggal_daftar');
            const editMetodePembayaran = document.getElementById('edit_metode_pembayaran');
            const editStatusPembayaran = document.getElementById('edit_status_pembayaran');

            editSiswaName.value = siswa_id;
            editPaketName.value = paket_id;
            editTanggalDaftar.value = tanggal_daftar;
            editMetodePembayaran.value = metode_pembayaran;
            editStatusPembayaran.value = status_pembayaran;

            const form = document.getElementById('editPendaftaranForm');
            form.action = '/admin/pendaftaran/' + id;
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
                        form.action = '/admin/pendaftaran/' + id;
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
