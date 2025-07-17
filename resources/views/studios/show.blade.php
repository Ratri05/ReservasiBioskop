@extends('layouts.app')

@section('content')
<div class="container bg-light rounded shadow p-4">
    <h2 class="text-brown mb-4">Detail Studio</h2>
    <ul class="list-group">
        <li class="list-group-item"><strong>Nomor Studio:</strong> {{ $studio->nomor_studio }}</li>
        <li class="list-group-item"><strong>Kapasitas:</strong> {{ $studio->kapasitas }}</li>
        <li class="list-group-item"><strong>Tipe Studio:</strong> {{ $studio->tipe_studio }}</li>
    </ul>
    <a href="{{ route('studios.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
