@extends('admin/components.app')

@section('content')
    <div class="container">
        <h4 class="fw-bold my-4 text-xl"><span class="text-muted fw-light">Data</span> Users</h4>

        <div class="my-4">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">Tambah User</button>
        </div>

        <div class="card p-8">
            <div class="table-responsive text-nowrap">
                <table id="userTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <span class="badge {{ $user->role === 'admin' ? 'bg-primary' : 'bg-success' }}">
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-info" data-bs-toggle="modal" 
                                        data-bs-target="#detailUserModal" 
                                        data-id="{{ $user->id }}"
                                        data-name="{{ $user->name }}"
                                        data-email="{{ $user->email }}"
                                        data-role="{{ $user->role }}">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#editUserModal"
                                        data-id="{{ $user->id }}"
                                        data-name="{{ $user->name }}"
                                        data-email="{{ $user->email }}"
                                        data-role="{{ $user->role }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger delete-btn" data-id="{{ $user->id }}" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
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

    <!-- Add User Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('users.store') }}" method="POST" id="addUserForm">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Role</label>
                            <select name="role" class="form-select" required>
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
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

    <!-- Edit User Modal -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editUserForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="name" id="editName" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" id="editEmail" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengubah password">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Role</label>
                            <select name="role" id="editRole" class="form-select" required>
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Detail User Modal -->
    <div class="modal fade" id="detailUserModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="detailLoading" class="text-center">
                        <div class="spinner-border" role="status"></div>
                    </div>
                    <div id="detailContent" style="display: none;">
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <p id="detailName" class="form-control-static"></p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <p id="detailEmail" class="form-control-static"></p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Role</label>
                            <p id="detailRole" class="form-control-static"></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Hapus -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-lg shadow-lg">
                <div class="modal-header border-b border-gray-200">
                    <h5 class="modal-title text-lg font-semibold" id="confirmDeleteModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <p class="text-gray-700">Apakah Anda yakin ingin menghapus data ini? Data yang dihapus tidak dapat dikembalikan.</p>
                </div>
                <div class="modal-footer border-t border-gray-200">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Notifikasi dengan Tailwind -->
    <div class="modal fade" id="notificationModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-white rounded-xl shadow-2xl transform transition-all">
                <div class="modal-header flex items-center justify-between p-4 border-b border-gray-200">
                    <h5 class="modal-title text-xl font-semibold text-gray-800" id="notifTitle"></h5>
                    <button type="button" class="text-gray-400 hover:text-gray-500 focus:outline-none" data-bs-dismiss="modal" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="modal-body p-6">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0" id="notifIcon">
                            <!-- Icon akan diisi melalui JavaScript -->
                        </div>
                        <p class="text-gray-600 text-base" id="notifMessage"></p>
                    </div>
                </div>
                <div class="modal-footer bg-gray-50 px-6 py-3 flex justify-end space-x-2 rounded-b-xl">
                    <button type="button" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-md focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-blue-500" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.tailwindcss.com/"></script>
    <script src="https://cdn.datatables.net/2.2.0/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.0/js/dataTables.tailwindcss.js"></script>

    <script>
        new DataTable('#userTable');
    </script>

    <script>
        $(document).ready(function() {
            // Inisialisasi modal notifikasi
            const notifModal = new bootstrap.Modal(document.getElementById('notificationModal'));
            
            // Fungsi untuk menampilkan notifikasi
            function showNotification(title, message, callback = null) {
                const successIcon = `
                    <div class="flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                        <svg class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                `;
                
                const errorIcon = `
                    <div class="flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                        <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </div>
                `;

                $('#notifTitle').text(title);
                $('#notifMessage').text(message);
                $('#notifIcon').html(title.toLowerCase().includes('error') ? errorIcon : successIcon);
                
                notifModal.show();
                
                if (callback) {
                    $('#notificationModal').on('hidden.bs.modal', function() {
                        callback();
                        $('#notificationModal').off('hidden.bs.modal');
                    });
                }
            }

            // Handler untuk modal tambah
            const addModal = new bootstrap.Modal(document.getElementById('addUserModal'));
            $('#addUserForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        addModal.hide();
                        showNotification('Berhasil', 'Data user berhasil ditambahkan', () => {
                            window.location.reload();
                        });
                    },
                    error: function(xhr) {
                        showNotification('Error', xhr.responseJSON.message || 'Terjadi kesalahan!');
                    }
                });
            });

            // Handler untuk modal edit
            const editModal = new bootstrap.Modal(document.getElementById('editUserModal'));
            $('#editUserModal').on('show.bs.modal', function(event) {
                const button = $(event.relatedTarget);
                const modal = $(this);
                const userId = button.data('id');
                
                modal.find('#editName').val(button.data('name'));
                modal.find('#editEmail').val(button.data('email'));
                modal.find('#editRole').val(button.data('role'));
                modal.find('form').attr('action', `/admin/users/${userId}`);
            });

            // Update handler untuk modal edit
            $('#editUserForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        editModal.hide();
                        showNotification('Berhasil', 'Data user berhasil diperbarui', () => {
                            window.location.reload();
                        });
                    },
                    error: function(xhr) {
                        showNotification('Error', xhr.responseJSON.message || 'Terjadi kesalahan!');
                    }
                });
            });

            // Handler untuk modal detail
            $('#detailUserModal').on('show.bs.modal', function(event) {
                const button = $(event.relatedTarget);
                const modal = $(this);
                
                // Tampilkan loading dan sembunyikan konten
                $('#detailLoading').show();
                $('#detailContent').hide();
                
                // Ambil detail user dari server
                $.get(`/admin/users/${button.data('id')}`, function(response) {
                    $('#detailName').text(response.name);
                    $('#detailEmail').text(response.email);
                    $('#detailRole').text(response.role.charAt(0).toUpperCase() + response.role.slice(1));
                    
                    // Sembunyikan loading dan tampilkan konten
                    $('#detailLoading').hide();
                    $('#detailContent').show();
                }).fail(function(xhr) {
                    // Tangani error
                    $('#detailLoading').html('<div class="alert alert-danger">Gagal memuat data user</div>');
                });
            });

            // Handler untuk hapus
            let deleteId;
            $('.delete-btn').on('click', function() {
                deleteId = $(this).data('id');
            });

            // Update handler untuk delete
            $('#confirmDeleteBtn').click(function() {
                if (deleteId) {
                    $.ajax({
                        url: `/admin/users/${deleteId}`,
                        type: 'DELETE',
                        data: {
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function(response) {
                            $('#confirmDeleteModal').modal('hide');
                            showNotification('Berhasil', 'User berhasil dihapus', () => {
                                window.location.reload();
                            });
                        },
                        error: function(xhr) {
                            if (xhr.status === 401 || xhr.status === 419) {
                                window.location.href = '{{ route("login") }}';
                            } else {
                                $('#confirmDeleteModal').modal('hide');
                                showNotification('Error', 'Gagal menghapus user!');
                            }
                        }
                    });
                }
            });
        });
    </script>
@endsection