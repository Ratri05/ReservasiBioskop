@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-3xl font-bold mb-6 text-yellow-700">Daftar Film</h1>
    <a href="{{ route('films.create') }}" class="bg-yellow-600 hover:bg-yellow-700 text-white px-4 py-2 rounded mb-6 inline-block">+ Tambah Film</a>

    <div class="overflow-x-auto">
        <table class="table-auto w-full bg-white shadow-md rounded-lg">
            <thead class="bg-yellow-200 text-yellow-900 text-left">
                <tr>
                    <th class="px-4 py-3">Judul</th>
                    <th class="px-4 py-3">Durasi</th>
                    <th class="px-4 py-3">Jam Tayang</th>
                    <th class="px-4 py-3">Tanggal Rilis</th>
                    <th class="px-4 py-3">Sutradara</th>
                    <th class="px-4 py-3">Pemeran Utama</th>
                    <th class="px-4 py-3">Bahasa</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($films as $film)
                <tr class="border-b hover:bg-yellow-50 transition">
                    <td class="px-4 py-2">{{ $film->judul }}</td>
                    <td class="px-4 py-2">{{ $film->durasi }} menit</td>
                    <td class="px-4 py-2">{{ $film->jam_tayang }}</td>
                    <td class="px-4 py-2">{{ \Carbon\Carbon::parse($film->tanggal_rilis)->format('d-m-Y') }}</td>
                    <td class="px-4 py-2">{{ $film->sutradara }}</td>
                    <td class="px-4 py-2">{{ $film->pemeran_utama }}</td>
                    <td class="px-4 py-2">{{ $film->bahasa }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('films.show', $film->id) }}" class="text-blue-600 hover:underline">Detail</a> |
                        <a href="{{ route('films.edit', $film->id) }}" class="text-yellow-600 hover:underline">Edit</a> |
                        <a href="{{ route('films.confirmDelete', $film->id) }}" class="text-red-600 hover:underline">Hapus</a>
                    </td>
                </tr>
                @endforeach

                @if ($films->isEmpty())
                <tr>
                    <td colspan="10" class="text-center py-4 text-gray-500">Belum ada data film yang tersedia.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
