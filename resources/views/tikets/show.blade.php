@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="text-warning mb-4">Detail Tiket</h2>

    <div class="card bg-light p-4">
        <p><strong>ID:</strong> {{ $tiket->id }}</p>
        <p><strong>Harga:</strong> Rp{{ number_format($tiket->harga, 0, ',', '.') }}</p>
        <p><strong>Studio:</strong> {{ $tiket->studio->nomor_studio ?? '-' }}</p>
        <p><strong>Film:</strong> {{ $tiket->film->judul ?? '-' }}</p>
        <a href="{{ route('tikets.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection
