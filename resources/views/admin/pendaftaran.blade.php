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
                                <td>{{ $p->siswa->nama_siswa }}</td>
                                <td>{{ $p->paket->nama_paket }}</td>
                                <td>{{ date('Y-m-d', strtotime($p->tanggal_daftar)) }}</td>
                                <td>{{ $p->metode_pembayaran }}</td>
                                <td>{{ $p->status_pembayaran }}</td>
                                <td>
                                    <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                                        data-bs-target="#detailPendaftaranModal" data-id="{{ $p->id }}"
                                        data-siswa_id="{{ $p->siswa->nama_siswa }}"
                                        data-paket_id="{{ $p->paket->nama_paket }}"
                                        data-tanggal_daftar="{{ date('Y-m-d', strtotime($p->tanggal_daftar)) }}"
                                        data-metode_pembayaran="{{ $p->metode_pembayaran }}"
                                        data-status_pembayaran="{{ $p->status_pembayaran }}">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#editPendaftaranModal" data-id="{{ $p->id }}"
                                        data-siswa_id="{{ $p->siswa_id }}" data-paket_id="{{ $p->paket_id }}"
                                        data-tanggal_daftar="{{ date('Y-m-d', strtotime($p->tanggal_daftar)) }}"
                                        data-metode_pembayaran="{{ $p->metode_pembayaran }}"
                                        data-status_pembayaran="{{ $p->status_pembayaran }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger delete-btn" data-id="{{ $p->id }}"
                                        data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
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
                                <option value="Uang Tunai">Uang Tunai</option>
                                <option value="Transfer Bank">Transfer Bank</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="status_pembayaran" class="form-label">Status Pembayaran</label>
                            <select name="status_pembayaran" id="status_pembayaran" class="form-select">
                                <option value="Belum Dibayar">Belum Dibayar</option>
                                <option value="Sudah Dibayar">Sudah Dibayar</option>
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

    <!-- Detail Pendaftaran Modal -->
    <div class="modal fade" id="detailPendaftaranModal" tabindex="-1" aria-labelledby="detailPendaftaranModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailPendaftaranModalLabel">Detail Pendaftaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Siswa</label>
                        <p id="detail_siswa_id" class="form-control-static"></p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Paket</label>
                        <p id="detail_paket_id" class="form-control-static"></p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Daftar</label>
                        <p id="detail_tanggal_daftar" class="form-control-static"></p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Metode Pembayaran</label>
                        <p id="detail_metode_pembayaran" class="form-control-static"></p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status Pembayaran</label>
                        <p id="detail_status_pembayaran" class="form-control-static"></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
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
                                    <option value="{{ $s->id }}">{{ $s->nama_siswa }}</option>
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
                                <option value="Uang Tunai">Uang Tunai</option>
                                <option value="Transfer Bank">Transfer Bank</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="edit_status_pembayaran" class="form-label">Status Pembayaran</label>
                            <select name="status_pembayaran" id="edit_status_pembayaran" class="form-select">
                                <option value="Belum Dibayar">Belum Dibayar</option>
                                <option value="Sudah Dibayar">Sudah Dibayar</option>
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

    <!-- Modal Konfirmasi Hapus -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-lg shadow-lg">
                <div class="modal-header border-b border-gray-200">
                    <h5 class="modal-title text-lg font-semibold" id="confirmDeleteModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <p class="text-gray-700">Apakah Anda yakin ingin menghapus data ini? Data yang dihapus tidak dapat
                        dikembalikan.</p>
                </div>
                <div class="modal-footer border-t border-gray-200">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Hapus</button>
                </div>
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
            modalTitle.textContent = 'Edit Pendaftaran - ' + siswa_id;

            const editSiswaName = document.getElementById('edit_siswa_id');
            const editPaketName = document.getElementById('edit_paket_id');
            const editTanggalDaftar = document.getElementById('edit_tanggal_daftar');
            const editMetodePembayaran = document.getElementById('edit_metode_pembayaran');
            const editStatusPembayaran = document.getElementById('edit_status_pembayaran');

            Array.from(editMetodePembayaran.options).forEach(option => {
                if (option.value === metode_pembayaran) {
                    option.selected = true;
                }
            });

            Array.from(editStatusPembayaran.options).forEach(option => {
                if (option.value === status_pembayaran) {
                    option.selected = true;
                }
            });

            editSiswaName.value = siswa_id;
            editPaketName.value = paket_id;
            editTanggalDaftar.value = tanggal_daftar;

            const form = document.getElementById('editPendaftaranForm');
            form.action = '/admin/pendaftaran/' + id;
        });

        const detailPendaftaranModal = document.getElementById('detailPendaftaranModal');
        detailPendaftaranModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const siswa_id = button.getAttribute('data-siswa_id');
            const paket_id = button.getAttribute('data-paket_id');
            const tanggal_daftar = button.getAttribute('data-tanggal_daftar');
            const metode_pembayaran = button.getAttribute('data-metode_pembayaran');
            const status_pembayaran = button.getAttribute('data-status_pembayaran');

            document.getElementById('detail_siswa_id').textContent = siswa_id;
            document.getElementById('detail_paket_id').textContent = paket_id;
            document.getElementById('detail_tanggal_daftar').textContent = tanggal_daftar;
            document.getElementById('detail_metode_pembayaran').textContent = metode_pembayaran;
            document.getElementById('detail_status_pembayaran').textContent = status_pembayaran;
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
            form.action = '/admin/pendaftaran/' + deleteId;
            form.innerHTML = `
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="DELETE">
            `;
            document.body.appendChild(form);
            form.submit();
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
    </style>
@endsection
