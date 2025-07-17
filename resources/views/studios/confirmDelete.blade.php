@extends('layouts.app')

@section('content')
<div class="container bg-light rounded shadow p-4 text-center">
    <h2 class="text-danger mb-4">Yakin ingin menghapus Studio?</h2>
    <p class="mb-3">Nomor Studio: <strong>{{ $studio->nomor_studio }}</strong></p>

    <form action="{{ route('studios.destroy', $studio->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Ya, Hapus</button>
        <a href="{{ route('studios.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
