@extends('layouts.app')

@section('content')
<div class="container max-w-xl mx-auto bg-white shadow rounded p-6 text-center">
    <h1 class="text-xl font-bold mb-4 text-red-600">Konfirmasi Hapus Film</h1>

    <p>Apakah Anda yakin ingin menghapus film berikut?</p>
    
    <div class="my-4">
        <p><strong>Judul:</strong> {{ $film->judul }}</p>
        <p><strong>Durasi:</strong> {{ $film->durasi }} menit</p>
        <p><strong>Genre:</strong> {{ $film->genre }}</p>
    </div>

    <form action="{{ route('films.destroy', $film->id) }}" method="POST">
        @csrf
        @method('DELETE')
        
        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded mr-2">
            Hapus
        </button>
        <a href="{{ route('films.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded">
            Batal
        </a>
    </form>
</div>
@endsection
