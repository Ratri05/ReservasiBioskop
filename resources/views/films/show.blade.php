@extends('layouts.app')

@section('content')
<div class="container max-w-xl mx-auto bg-white shadow rounded p-6">
    <h1 class="text-xl font-bold mb-4 text-yellow-700">Detail Film</h1>

    <p><strong>Judul:</strong> {{ $film->judul }}</p>
    <p><strong>Durasi:</strong> {{ $film->durasi }} menit</p>
    <p><strong>Bahasa:</strong> {{ $film->bahasa }}</p>
    <p><strong>Sutradara:</strong> {{ $film->sutradara }}</p>
    <p><strong>Pemeran Utama:</strong> {{ $film->pemeran_utama }}</p>
    <p><strong>Tanggal Rilis:</strong> {{ \Carbon\Carbon::parse($film->tanggal_rilis)->format('d M Y') }}</p>
    <p><strong>Jam Tayang:</strong> {{ \Carbon\Carbon::parse($film->jam_tayang)->format('H:i') }}</p>

    <a href="{{ route('films.index') }}" class="mt-4 inline-block bg-yellow-600 hover:bg-yellow-700 text-white px-4 py-2 rounded">Kembali</a>
</div>
@endsection
