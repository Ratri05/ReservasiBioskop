@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 text-warning">Daftar Tiket</h2>
    <a href="{{ route('tikets.create') }}" class="btn btn-warning mb-3">+ Tambah Tiket</a>

    <table class="table table-bordered table-striped bg-light">
        <thead class="table-warning text-center">
            <tr>
                <th>ID</th>
                <th>Harga</th>
                <th>Studio</th>
                <th>Film</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tikets as $tiket)
            <tr>
                <td>{{ $tiket->id }}</td>
                <td>Rp{{ number_format($tiket->harga, 0, ',', '.') }}</td>
                <td>{{ $tiket->studio->nomor_studio ?? '-' }}</td>
                <td>{{ $tiket->film->judul ?? '-' }}</td>
                <td>
                    <a href="{{ route('tikets.show', $tiket->id) }}" class="btn btn-info btn-sm">Lihat</a>
                    <a href="{{ route('tikets.edit', $tiket->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <a href="{{ route('tikets.confirmDelete', $tiket->id) }}" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
