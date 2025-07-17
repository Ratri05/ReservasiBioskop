@extends('layouts.app')

@section('content')
<div class="container bg-white shadow p-6 rounded">
    <h1 class="text-xl font-bold text-red-600 mb-4">Konfirmasi Hapus</h1>
    <p>Apakah Anda yakin ingin menghapus karyawan <strong>{{ $karyawan->nama }}</strong>?</p>

    <form action="{{ route('karyawans.destroy', $karyawan->id) }}" method="POST" class="mt-4">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Ya, Hapus</button>
        <a href="{{ route('karyawans.index') }}" class="ml-4 text-gray-600 hover:underline">Batal</a>
    </form>
</div>
@endsection
