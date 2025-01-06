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
                        <th>ID</th>
                        <th>Nama Paket</th>
                        <th>Harga Paket</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($paket as $p)
                    <tr>
                        <td>{{ $p->id }}</td>
                        <td>{{ $p->nama_paket }}</td>
                        <td>{{ $p->harga_paket }}</td>
                        <td>
                            <a href="{{ route('paket.edit', $p->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('paket.destroy', $p->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal untuk Tambah/Edit Paket -->
<div class="modal fade" id="paketModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Tambah Paket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="paketForm">
                    <input type="hidden" id="paketId" value="">
                    <div class="mb-3">
                        <label for="paketName" class="form-label">Nama Paket</label>
                        <input type="text" id="paketName" class="form-control" placeholder="Masukkan Nama Paket" required>
                    </div>
                    <div class="mb-3">
                        <label for="paketPrice" class="form-label">Harga Paket</label>
                        <input type="text" id="paketPrice" class="form-control" placeholder="Masukkan Harga Paket" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="savePaketChangesBtn">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('addPaketBtn').addEventListener('click', function() {
        document.getElementById('modalTitle').innerText = 'Tambah Paket';
        document.getElementById('paketId').value = '';
        document.getElementById('paketForm').reset();
        var myModal = new bootstrap.Modal(document.getElementById('paketModal'));
        myModal.show();
    });

    document.getElementById('savePaketChangesBtn').addEventListener('click', function() {
        const id = document.getElementById('paketId').value;
        const name = document.getElementById('paketName').value;
        const price = document.getElementById('paketPrice').value;

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
            if (data.success) {
                alert(data.message);
                location.reload(); // Reload halaman untuk melihat perubahan
            }
        })
        .catch(error => console.error('Error:', error));
    });
</script>
@endsection