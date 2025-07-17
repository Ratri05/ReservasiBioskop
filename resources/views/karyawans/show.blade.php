@extends('layouts.app')

@section('content')
<div class="container bg-white shadow p-6 rounded">
    <h1 class="text-xl font-bold mb-4 text-yellow-700">Detail Karyawan</h1>
    <p><strong>Nama:</strong> {{ $karyawan->nama }}</p>
    <p><strong>Posisi:</strong> {{ $karyawan->posisi }}</p>
    <p><strong>Jadwal Kerja:</strong> {{ $karyawan->jadwal_kerja }}</p>
    <p><strong>No Telepon:</strong> {{ $karyawan->no_telepon }}</p>
    <p><strong>Alamat:</strong> {{ $karyawan->alamat }}</p>
    <a href="{{ route('karyawans.index') }}" class="text-blue-600 hover:underline mt-4 inline-block">← Kembali</a>
</div>
@endsection
