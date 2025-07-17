@extends('layouts.app')

@section('content')
<div class="container bg-light rounded shadow p-4">
    <h2 class="mb-4 text-brown">Daftar Studio</h2>
    <a href="{{ route('studios.create') }}" class="btn btn-warning mb-3">+ Tambah Studio</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="bg-brown text-white">
            <tr>
                <th>No</th>
                <th>Nomor Studio</th>
                <th>Kapasitas</th>
                <th>Tipe Studio</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($studios as $studio)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $studio->nomor_studio }}</td>
                <td>{{ $studio->kapasitas }}</td>
                <td>{{ $studio->tipe_studio }}</td>
                <td>
                    <a href="{{ route('studios.show', $studio->id) }}" class="btn btn-sm btn-info">Detail</a>
                    <a href="{{ route('studios.edit', $studio->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <a href="{{ route('studios.confirmDelete', $studio->id) }}" class="btn btn-sm btn-danger">Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
