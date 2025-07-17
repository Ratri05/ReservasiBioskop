@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Konfirmasi Hapus Pengguna</h1>
    <div class="alert alert-danger">
        <p>Apakah Anda yakin ingin menghapus pengguna <strong>{{ $pengguna->nama }}</strong>?</p>
    </div>
    <form action="{{ route('penggunas.destroy', $pengguna->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Hapus</button>
        <a href="{{ route('penggunas.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
