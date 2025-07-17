@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Pengguna</h1>
    <a href="{{ route('penggunas.create') }}" class="btn btn-primary mb-3">+ Tambah Pengguna</a>
    <table class="table table-striped table-hover table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Nama</th>
                <th>No. Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penggunas as $pengguna)
            <tr>
                <td>{{ $pengguna->nama }}</td>
                <td>{{ $pengguna->email }}</td>
                <td>{{ $pengguna->no_telepon }}</td>
                <td>
                    <a href="{{ route('penggunas.show', $pengguna->id) }}" class="btn btn-sm btn-info">Detail</a>
                    <a href="{{ route('penggunas.edit', $pengguna->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <a href="{{ route('penggunas.confirmDelete', $pengguna->id) }}" class="btn btn-sm btn-danger">Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
