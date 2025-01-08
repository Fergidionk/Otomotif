@extends('admin/components.app')
@section('content')
<div class="container">
    <h4 class="fw-bold my-4 text-xl"><span class="text-muted fw-light">Modal /</span> Paket</h4>
    <div class="my-4">
        <button id="addPaketBtn" class="btn btn-primary">Tambah Paket</button>
    </div>
    <div class="card">
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Paket</th>
                        <th>Harga Paket</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($paket as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p->nama_paket }}</td>
                        <td>Rp {{ $p->harga_paket }}</td>
                        <td>
                            <button type="button" class="btn btn-primary" onclick="editPaket({{ $p->id }}, '{{ $p->nama_paket }}', '{{ $p->harga_paket }}')"><i class="fas fa-edit text-white"></i></button>
                            <form action="{{ route('paket.destroy', $p->id) }}" method="POST" style="display:inline;" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash text-white"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
                <form id="addPaketForm">
                    <input type="hidden" id="addPaketId" value="">
                    <div class="mb-3">
                        <label for="addPaketName" class="form-label">Nama Paket</label>
                        <input type="text" id="addPaketName" class="form-control" placeholder="Masukkan Nama Paket" required>
                    </div>
                    <div class="mb-3">
                        <label for="addPaketPrice" class="form-label">Harga Paket</label>
                        <input type="number" id="addPaketPrice" class="form-control" placeholder="Masukkan Harga Paket" required>
                    </div>
                    <div class="alert alert-info">
                        Pastikan Anda mengisi semua field dengan benar.
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="saveAddPaketBtn">Simpan Paket</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk Edit Paket -->
<div class="modal fade" id="editPaketModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalTitle">Edit Paket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editPaketForm">
                    <input type="hidden" id="editPaketId" value="">
                    <div class="mb-3">
                        <label for="editPaketName" class="form-label">Nama Paket</label>
                        <input type="text" id="editPaketName" class="form-control" placeholder="Masukkan Nama Paket" required>
                    </div>
                    <div class="mb-3">
                        <label for="editPaketPrice" class="form-label">Harga Paket</label>
                        <input type="number" id="editPaketPrice" class="form-control" placeholder="Masukkan Harga Paket" required>
                    </div>
                    <div class="alert alert-info">
                        Pastikan Anda mengisi semua field dengan benar.
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="saveEditPaketBtn">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.getElementById('addPaketBtn').addEventListener('click', function() {
        document.getElementById('addModalTitle').innerText = 'Tambah Paket';
        document.getElementById('addPaketForm').reset();
        var myModal = new bootstrap.Modal(document.getElementById('addPaketModal'));
        myModal.show();
    });

    document.getElementById('saveAddPaketBtn').addEventListener('click', function() {
        const name = document.getElementById('addPaketName').value;
        const price = document.getElementById('addPaketPrice').value;

        // Mengirim data ke server
        const formData = new FormData();
        formData.append('nama_paket', name);
        formData.append('harga_paket', price);

        fetch('{{ route("paket.store") }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            alert(data.success ? 'Data berhasil disimpan!' : 'Gagal menyimpan data.');
            if (data.success) {
                var myModal = bootstrap.Modal.getInstance(document.getElementById('addPaketModal'));
                myModal.hide(); // Menyembunyikan modal setelah simpan
                location.reload(); // Reload halaman untuk melihat perubahan
            }
        })
        .catch(error => console.error('Error:', error));
    });

    // Mengubah fungsi editPaket untuk menggunakan modal edit
    function editPaket(id, name, price) {
        document.getElementById('editPaketId').value = id;
        document.getElementById('editPaketName').value = name;
        document.getElementById('editPaketPrice').value = price;
        var myModal = new bootstrap.Modal(document.getElementById('editPaketModal'));
        myModal.show();
    }

    document.getElementById('saveEditPaketBtn').addEventListener('click', function() {
        const id = document.getElementById('editPaketId').value;
        const name = document.getElementById('editPaketName').value;
        const price = document.getElementById('editPaketPrice').value;

        // Mengirim data ke server
        const formData = new FormData();
        formData.append('paketId', id);
        formData.append('nama_paket', name);
        formData.append('harga_paket', price);

        fetch('{{ route("paket.store") }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            alert(data.success ? 'Data berhasil disimpan!' : 'Gagal menyimpan data.');
            if (data.success) {
                var myModal = bootstrap.Modal.getInstance(document.getElementById('editPaketModal'));
                myModal.hide(); // Menyembunyikan modal setelah simpan
                location.reload(); // Reload halaman untuk melihat perubahan
            }
        })
        .catch(error => console.error('Error:', error));
    });

    // Menambahkan konfirmasi sebelum menghapus
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault(); // Mencegah pengiriman form langsung
            Swal.fire({
                title: 'Konfirmasi',
                text: "Apakah Anda yakin ingin menghapus paket ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit(); // Mengirim form jika dikonfirmasi
                }
            });
        });
    });
</script>
@endsection