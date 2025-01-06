@extends('admin/components.app')

@section('content')
<div class="container">
    <h1>Data Pendaftaran</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Siswa</th>
                <th>Tanggal Daftar</th>
                <th>ID Paket</th>
                <th>Metode Pembayaran</th>
                <th>Status Pembayaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pendaftaran as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->siswa_id }}</td>
                <td>{{ $p->tanggal_daftar }}</td>
                <td>{{ $p->paket_id }}</td>
                <td>{{ $p->metode_pembayaran }}</td>
                <td>{{ $p->status_pembayaran }}</td>
                <td>
                    <a href="{{ route('pendaftaran.edit', $p->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('pendaftaran.destroy', $p->id) }}" method="POST" style="display:inline;">
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
@endsection