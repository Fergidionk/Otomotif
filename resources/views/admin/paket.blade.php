@extends('admin/components.app')
@section('content')
    <div class="container">
        <h4 class="fw-bold my-4 text-xl"><span class="text-muted fw-light">Data </span> Paket</h4>
        <div class="my-4">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPaketModal">Tambah Paket</button>
        </div>
        <div class="card p-8">
            <div class="table-responsive text-nowrap">
                <table id="paketTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Paket</th>
                            <th>Harga Paket</th>
                            <th>Jumlah Pertemuan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($paket as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->nama_paket }}</td>
                                <td>Rp {{ $p->harga_paket }}</td>
                                <td>{{ $p->jumlah_pertemuan }} Pertemuan</td>
                                <td>
                                    <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#detailPaketModal"
                                        data-id="{{ $p->id }}"
                                        data-nama="{{ $p->nama_paket }}"
                                        data-harga="{{ $p->harga_paket }}"
                                        data-jumlah="{{ $p->jumlah_pertemuan }}">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editPaketModal"
                                        data-id="{{ $p->id }}"
                                        data-nama="{{ $p->nama_paket }}"
                                        data-harga="{{ $p->harga_paket }}"
                                        data-jumlah="{{ $p->jumlah_pertemuan }}"> 
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

    <!-- Modal untuk Detail Paket -->
    <div class="modal fade" id="detailPaketModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailPaketModalTitle">Detail Paket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <label class="col-sm-4 fw-bold">Nama Paket</label>
                        <div class="col-sm-8" id="detailPaketName"></div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 fw-bold">Harga Paket</label>
                        <div class="col-sm-8" id="detailPaketPrice"></div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 fw-bold">Jumlah Pertemuan</label>
                        <div class="col-sm-8" id="detailPaketJumlah"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk Tambah Paket -->
    <div class="modal fade" id="addPaketModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalTitle">Tambah Paket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('paket.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="addPaketName" class="form-label">Nama Paket</label>
                            <input type="text" id="addPaketName" name="nama_paket" class="form-control" placeholder="Masukkan Nama Paket" required>
                        </div>
                        <div class="mb-3">
                            <label for="addPaketPrice" class="form-label">Harga Paket</label>
                            <input type="number" id="addPaketPrice" name="harga_paket" class="form-control" placeholder="Masukkan Harga Paket" required>
                        </div>
                        <div class="mb-3">
                            <label for="addPaketJumlah" class="form-label">Jumlah Pertemuan</label>
                            <input type="number" id="addPaketJumlah" name="jumlah_pertemuan" class="form-control" placeholder="Masukkan Jumlah Pertemuan" required>
                        </div>
                        <div class="alert alert-info">
                            Pastikan Anda mengisi semua field dengan benar.
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan Paket</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal untuk Edit Paket -->
    <div class="modal fade" id="editPaketModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPaketModalTitle">Edit Paket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editPaketForm" action="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="editPaketName" class="form-label">Nama Paket</label>
                            <input type="text" id="editPaketName" name="nama_paket" class="form-control" placeholder="Masukkan Nama Paket" required>
                        </div>
                        <div class="mb-3">
                            <label for="editPaketPrice" class="form-label">Harga Paket</label>
                            <input type="number" id="editPaketPrice" name="harga_paket" class="form-control" placeholder="Masukkan Harga Paket" required>
                        </div>
                        <div class="mb-3">
                            <label for="editPaketJumlah" class="form-label">Jumlah Pertemuan</label>
                            <input type="number" id="editPaketJumlah" name="jumlah_pertemuan" class="form-control" placeholder="Masukkan Jumlah Pertemuan" required>
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
        new DataTable('#paketTable');
    </script>

    <script>
        const detailPaketModal = document.getElementById('detailPaketModal');
        detailPaketModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const nama = button.getAttribute('data-nama');
            const harga = button.getAttribute('data-harga');
            const jumlah = button.getAttribute('data-jumlah');

            const modalTitle = detailPaketModal.querySelector('.modal-title');
            modalTitle.textContent = 'Detail Paket: ' + nama;

            document.getElementById('detailPaketName').textContent = nama;
            document.getElementById('detailPaketPrice').textContent = 'Rp ' + harga;
            document.getElementById('detailPaketJumlah').textContent = jumlah + ' Pertemuan';
        });

        const editPaketModal = document.getElementById('editPaketModal');
        editPaketModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');
            const nama = button.getAttribute('data-nama');
            const harga = button.getAttribute('data-harga');
            const jumlah = button.getAttribute('data-jumlah');

            const modalTitle = editPaketModal.querySelector('.modal-title');
            modalTitle.textContent = 'Edit Paket: ' + nama;

            document.getElementById('editPaketName').value = nama;
            document.getElementById('editPaketPrice').value = harga;
            document.getElementById('editPaketJumlah').value = jumlah;

            const form = document.getElementById('editPaketForm');
            form.action = '/admin/paket/' + id;
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
                        form.action = '/admin/paket/' + id;
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
