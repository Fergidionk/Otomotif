@extends('admin/components.app')

@section('content')
    <div class="container">
        <h4 class="fw-bold my-4 text-xl"><span class="text-muted fw-light">Data</span> Jadwal</h4>

        <div class="card p-8">
            <div class="table-responsive text-nowrap">
                <table id="jadwalTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Paket</th>
                            <th>Jumlah Pertemuan</th>
                            <th>Status Jadwal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pendaftaran as $p)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->siswa->nama_siswa }}</td>
                            <td>{{ $p->paket->nama_paket }}</td>
                            <td>{{ $p->paket->jumlah_pertemuan }}</td>
                            <td>
                                @if($p->jadwal && $p->jadwal->count() > 0)
                                    <span class="badge bg-success">Jadwal Tersedia</span>
                                @else
                                    <span class="badge bg-warning">Belum Diatur</span>
                                @endif
                            </td>
                            <td>
                                @if($p->jadwal && $p->jadwal->count() > 0)
                                    @php
                                        $hasSchedule = $p->jadwal->whereNotNull('tanggal')->whereNotNull('jam_pelatihan')->count() > 0;
                                    @endphp
                                    
                                    @if($hasSchedule)
                                        <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                                            data-bs-target="#detailJadwalModal" 
                                            data-pendaftar-id="{{ $p->id }}">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#editJadwalModal" 
                                            data-pendaftar-id="{{ $p->id }}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                    @else
                                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#editJadwalModal" 
                                            data-pendaftar-id="{{ $p->id }}">
                                            Atur Jadwal
                                        </button>
                                    @endif
                                @else
                                    <button class="btn btn-sm btn-warning create-jadwal-btn" 
                                        data-pendaftar-id="{{ $p->id }}">
                                        Buat Jadwal
                                    </button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Detail Jadwal Modal -->
    <div class="modal fade" id="detailJadwalModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Jadwal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 80px">Pertemuan</th>
                                    <th>Hari</th>
                                    <th>Tanggal</th>
                                    <th>Jam</th>
                                </tr>
                            </thead>
                            <tbody id="detailJadwalBody">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Jadwal Modal -->
    <div class="modal fade" id="editJadwalModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content rounded-lg shadow-xl">
                <form id="editJadwalForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header bg-blue-600 text-white rounded-t-lg">
                        <h5 class="modal-title text-lg font-semibold text-white">  
                            <i class="fa-regular fa-calendar-check mr-2"></i>
                            Atur Jadwal Pelatihan
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body p-6">
                        <div class="bg-blue-50 text-blue-700 p-4 rounded-lg mb-6">
                            <i class="fa-solid fa-circle-info mr-2"></i>
                            Silakan atur jadwal untuk setiap pertemuan pelatihan
                        </div>
                        <div id="editJadwalList" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Jadwal inputs will be inserted here -->
                        </div>
                    </div>
                    <div class="modal-footer border-t border-gray-200 p-4">
                        <button type="button" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition-colors" data-bs-dismiss="modal">
                            <i class="fa-solid fa-xmark mr-2"></i>
                            Tutup
                        </button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors ml-3">
                            <i class="fa-solid fa-save mr-2"></i>
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Hapus -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data ini? Data yang dihapus tidak dapat dikembalikan.
                </div>
                <div class="modal-footer">
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
        new DataTable('#jadwalTable');

        // Detail Modal
        const detailJadwalModal = document.getElementById('detailJadwalModal');
        detailJadwalModal.addEventListener('show.bs.modal', async function(event) {
            try {
                const button = event.relatedTarget;
                const pendaftarId = button.getAttribute('data-pendaftar-id');
                const tableBody = document.getElementById('detailJadwalBody');
                tableBody.innerHTML = '';

                // Ambil data jadwal
                const jadwalResponse = await fetch(`/admin/jadwal/detail/${pendaftarId}`);
                if (!jadwalResponse.ok) {
                    throw new Error('Gagal mengambil data jadwal');
                }
                const jadwals = await jadwalResponse.json();

                jadwals.forEach((jadwal, index) => {
                    const date = new Date(jadwal.tanggal);
                    const formattedDate = date.toLocaleDateString('id-ID', {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    });

                    const hari = new Date(jadwal.tanggal).toLocaleDateString('id-ID', { weekday: 'long' });

                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td class="text-center">${index + 1}</td>
                        <td>${hari}</td>
                        <td>${formattedDate}</td>
                        <td>${jadwal.jam_pelatihan}</td>
                    `;
                    tableBody.appendChild(row);
                });
            } catch (error) {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat memuat detail jadwal: ' + error.message);
            }
        });

        // Edit Modal
        const editJadwalModal = document.getElementById('editJadwalModal');
        editJadwalModal.addEventListener('show.bs.modal', async function(event) {
            try {
                const button = event.relatedTarget;
                const pendaftarId = button.getAttribute('data-pendaftar-id');
                const editJadwalList = document.getElementById('editJadwalList');
                editJadwalList.innerHTML = '';

                console.log('Pendaftar ID:', pendaftarId);

                // Ambil data pendaftar
                const pendaftarResponse = await fetch(`/admin/pendaftaran/${pendaftarId}`, {
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });
                
                if (!pendaftarResponse.ok) {
                    throw new Error('Gagal mengambil data pendaftar');
                }
                
                const result = await pendaftarResponse.json();
                const pendaftar = result.data; // Karena kita mengirim data dalam wrapper 'data'
                console.log('Data Pendaftar:', pendaftar);

                if (!pendaftar || !pendaftar.paket) {
                    throw new Error('Data paket tidak ditemukan');
                }

                const jadwalResponse = await fetch(`/admin/jadwal/detail/${pendaftarId}`, {
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });
                
                if (!jadwalResponse.ok) {
                    throw new Error('Gagal mengambil data jadwal');
                }
                
                const jadwalResult = await jadwalResponse.json();
                const jadwals = jadwalResult || []; // Hapus .data karena mungkin response langsung berupa array
                console.log('Raw Jadwals:', jadwals);

                const form = document.getElementById('editJadwalForm');
                form.action = `/admin/jadwal/bulk-update/${pendaftarId}`;

                // Generate form untuk setiap pertemuan
                const jumlahPertemuan = pendaftar.paket.jumlah_pertemuan || 0;
                for (let i = 0; i < jumlahPertemuan; i++) {
                    const jadwal = jadwals[i] || {};
                    console.log(`Jadwal ${i + 1}:`, jadwal);
                    
                    // Format tanggal ke YYYY-MM-DD untuk input date
                    let formattedDate = '';
                    if (jadwal.tanggal) {
                        formattedDate = jadwal.tanggal.split('T')[0]; // Langsung ambil bagian tanggal saja
                        console.log(`Formatted Date ${i + 1}:`, formattedDate);
                    }
                    
                    // Format jam ke HH:mm untuk input time
                    let formattedTime = '';
                    if (jadwal.jam_pelatihan) {
                        formattedTime = jadwal.jam_pelatihan.slice(0, 5); // Gunakan slice untuk konsistensi
                        console.log(`Formatted Time ${i + 1}:`, formattedTime);
                    }

                    const formHtml = `
                        <div class="w-full">
                            <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow duration-300 border border-gray-200">
                                <div class="px-6 py-4 bg-gray-50 rounded-t-xl border-b border-gray-200">
                                    <h6 class="font-bold text-gray-700 flex items-center">
                                        <i class="fa-solid fa-calendar-day text-blue-600 mr-2"></i>
                                        Pertemuan ${i + 1}
                                    </h6>
                                </div>
                                <div class="p-6">
                                    <div class="mb-6">
                                        <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                            <i class="fa-regular fa-calendar text-blue-600 mr-2"></i>
                                            Tanggal Pertemuan
                                        </label>
                                        <input type="date" 
                                            class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors" 
                                            name="jadwal[${i}][tanggal]" 
                                            value="${formattedDate}" 
                                            required>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                            <i class="fa-regular fa-clock text-blue-600 mr-2"></i>
                                            Jam Pelatihan
                                        </label>
                                        <input type="time" 
                                            class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors" 
                                            name="jadwal[${i}][jam_pelatihan]" 
                                            value="${formattedTime}" 
                                            required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    editJadwalList.insertAdjacentHTML('beforeend', formHtml);
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Terjadi kesalahan: ' + error.message);
            }
        });

        // Form submission
        document.getElementById('editJadwalForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            try {
                const formData = new FormData(this);
                const response = await fetch(this.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                });

                if (!response.ok) {
                    throw new Error('Gagal menyimpan jadwal');
                }

                const result = await response.json();
                if (result.success) {
                    window.location.reload();
                } else {
                    throw new Error(result.message || 'Gagal menyimpan jadwal');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Terjadi kesalahan: ' + error.message);
            }
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
            form.action = '/admin/jadwal/' + deleteId;
            form.innerHTML = `
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="DELETE">
            `;
            document.body.appendChild(form);
            form.submit();
        });

        // Tambahkan event listener untuk tombol Buat Jadwal
        document.querySelectorAll('.create-jadwal-btn').forEach(button => {
            button.addEventListener('click', async function() {
                const pendaftarId = this.getAttribute('data-pendaftar-id');
                try {
                    const response = await fetch(`/admin/jadwal/create-empty/${pendaftarId}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        }
                    });

                    const result = await response.json();
                    
                    if (!response.ok) {
                        throw new Error(result.message || 'Gagal membuat jadwal kosong');
                    }

                    if (result.success) {
                        alert('Jadwal berhasil dibuat');
                        window.location.reload();
                    } else {
                        throw new Error(result.message);
                    }
                } catch (error) {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan: ' + error.message);
                }
            });
        });
    </script>
@endsection
