@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Pengguna</h1>
    <div class="card p-3">
        <p><strong>Nama:</strong> {{ $pengguna->nama }}</p>
        <p><strong>No. Telepon:</strong> {{ $pengguna->no_telepon }}</p>
    </div>
    <a href="{{ route('penggunas.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
