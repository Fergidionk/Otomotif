@extends('admin/components.app')

@section('content')
    <div class="container">
        <h4 class="fw-bold my-4 text-xl"><span class="text-muted fw-light">Data</span> Absensi</h4>

        <div class="card p-8">
            <div class="table-responsive text-nowrap">
                <table id="absensiTable" class="table table-striped table-bordered">
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
                        @foreach ($pendaftaran as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->siswa->nama_siswa }}</td>
                                <td>{{ $p->paket->nama_paket }}</td>
                                <td>{{ $p->paket->jumlah_pertemuan }}</td>
                                <td>
                                    @if ($p->jadwal && $p->jadwal->count() > 0)
                                        <span class="badge bg-success">Jadwal Tersedia</span>
                                    @else
                                        <span class="badge bg-warning">Belum Ada Jadwal</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($p->jadwal && $p->jadwal->count() > 0)
                                        <button class="btn btn-primary btn-sm"
                                            onclick="showAbsensiModal({{ $p->id }})">
                                            Isi Absensi
                                        </button>
                                    @else
                                        <a href="{{ route('jadwal.index') }}" class="btn btn-warning btn-sm">
                                            Buat Jadwal
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Absensi -->
    <div class="modal fade" id="absensiModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Absensi Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="absensiForm" action="{{ route('absensi.store') }}" method="POST">
                        @csrf
                        <input type="hidden" id="pendaftarId" name="pendaftar_id" value="">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Pertemuan</th>
                                        <th>Tanggal</th>
                                        <th>Jam</th>
                                        <th>Keterangan</th>
                                        <th>Status Kehadiran</th>
                                    </tr>
                                </thead>
                                <tbody id="pertemuanList">
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan Absensi</button>
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
        function showErrorModal(title, message) {
            const modalHtml = `
                <div class="modal fade" id="errorModal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-danger">${title}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <p>${message}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            `;

            // Hapus modal lama jika ada
            const oldModal = document.getElementById('errorModal');
            if (oldModal) {
                oldModal.remove();
            }

            // Tambahkan modal baru
            document.body.insertAdjacentHTML('beforeend', modalHtml);
            const modal = new bootstrap.Modal(document.getElementById('errorModal'));
            modal.show();
        }

        function showSuccessModal(title, message, callback = null) {
            const modalHtml = `
                <div class="modal fade" id="successModal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-success">${title}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <p>${message}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                            </div>
                        </div>
                    </div>
                </div>
            `;

            // Hapus modal lama jika ada
            const oldModal = document.getElementById('successModal');
            if (oldModal) {
                oldModal.remove();
            }

            // Tambahkan modal baru
            document.body.insertAdjacentHTML('beforeend', modalHtml);
            const modal = new bootstrap.Modal(document.getElementById('successModal'));
            
            if (callback) {
                const modalElement = document.getElementById('successModal');
                modalElement.addEventListener('hidden.bs.modal', callback);
            }
            
            modal.show();
        }

        function showConfirmModal(title, message, confirmCallback) {
            const modalHtml = `
                <div class="modal fade" id="confirmModal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">${title}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <p>${message}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="button" class="btn btn-primary" id="confirmButton">Ya</button>
                            </div>
                        </div>
                    </div>
                </div>
            `;

            // Hapus modal lama jika ada
            const oldModal = document.getElementById('confirmModal');
            if (oldModal) {
                oldModal.remove();
            }

            // Tambahkan modal baru
            document.body.insertAdjacentHTML('beforeend', modalHtml);
            const modal = new bootstrap.Modal(document.getElementById('confirmModal'));
            
            document.getElementById('confirmButton').addEventListener('click', () => {
                modal.hide();
                confirmCallback();
            });
            
            modal.show();
        }

        function showAbsensiModal(pendaftarId) {
            document.getElementById('pendaftarId').value = pendaftarId;
            
            fetch(`{{ url('/admin/absensi/jadwal') }}/${pendaftarId}`)
                .then(response => response.json())
                .then(jadwal => {
                    console.log('Data Jadwal:', jadwal);

                    const pertemuanList = document.getElementById('pertemuanList');
                    pertemuanList.innerHTML = '';

                    jadwal.forEach((j, index) => {
                        const pertemuanKe = index + 1;
                        const date = new Date(j.tanggal);
                        const formattedDate = date.toLocaleDateString('id-ID', {
                            weekday: 'long',
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric'
                        });

                        const jamPelatihan = j.jam_pelatihan || '-';

                        pertemuanList.innerHTML += `
                            <tr>
                                <td>Pertemuan ${pertemuanKe}</td>
                                <td>${formattedDate}</td>
                                <td>${jamPelatihan}</td>
                                <td>
                                    <textarea class="form-control" 
                                        name="keterangan[${j.id}]"
                                        rows="1">${j.absensi?.keterangan || ''}</textarea>
                                </td>
                                <td class="text-center">
                                    <select class="form-select" name="hadir[${j.id}]" required>
                                        <option value="tidak_hadir" ${j.absensi?.hadir === 'tidak_hadir' ? 'selected' : ''} class="fw-bold text-danger">
                                            Tidak Hadir
                                        </option>
                                        <option value="hadir" ${j.absensi?.hadir === 'hadir' ? 'selected' : ''} class="fw-bold text-primary">
                                            Hadir
                                        </option>
                                    </select>
                                </td>
                            </tr>
                        `;
                    });

                    const modal = new bootstrap.Modal(document.getElementById('absensiModal'));
                    modal.show();
                })
                .catch(error => {
                    console.error('Error:', error);
                    showErrorModal('Kesalahan', 'Terjadi kesalahan saat mengambil data jadwal');
                });
        }

        const absensiForm = document.getElementById('absensiForm');
        absensiForm.onsubmit = function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const pendaftarId = document.getElementById('pendaftarId').value;
            
            const absensiData = {
                _token: formData.get('_token'),
                pendaftar_id: pendaftarId,
                absensi: []
            };

            // Validasi apakah ada data yang dipilih
            let hasData = false;
            document.querySelectorAll('select[name^="hadir["]').forEach(select => {
                if (select.value !== '') {
                    hasData = true;
                    const jadwalId = select.name.match(/\[(\d+)\]/)[1];
                    const keteranganInput = document.querySelector(`[name="keterangan[${jadwalId}]"]`);

                    absensiData.absensi.push({
                        jadwal_id: parseInt(jadwalId),
                        hadir: select.value,
                        keterangan: keteranganInput ? keteranganInput.value : ''
                    });
                }
            });

            if (!hasData) {
                showErrorModal('Peringatan', 'Silakan pilih minimal satu status kehadiran');
                return;
            }

            fetch(this.action, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': formData.get('_token'),
                    'Accept': 'application/json'
                },
                body: JSON.stringify(absensiData)
            })
            .then(async response => {
                const data = await response.json();
                if (!response.ok) {
                    throw new Error(data.message || `Gagal menyimpan absensi: ${response.statusText}`);
                }
                return data;
            })
            .then(data => {
                console.log('Response sukses:', data);
                showSuccessModal('Berhasil', 'Data absensi berhasil disimpan', () => {
                    location.reload();
                });
            })
            .catch(error => {
                console.error('Error detail:', error);
                showErrorModal('Gagal', error.message);
            });
        };
    </script>
@endsection
