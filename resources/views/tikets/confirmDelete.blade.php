@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="text-danger mb-4">Konfirmasi Hapus Tiket</h2>

    <div class="alert alert-warning">
        Apakah Anda yakin ingin menghapus tiket <strong>ID: {{ $tiket->id }}</strong>?
    </div>

    <form action="{{ route('tikets.destroy', $tiket->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">Ya, Hapus</button>
        <a href="{{ route('tikets.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
