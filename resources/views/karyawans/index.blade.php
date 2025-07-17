@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4 text-yellow-700">Daftar Karyawan</h1>
    <a href="{{ route('karyawans.create') }}" class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700">+ Tambah Karyawan</a>
    <table class="table-auto w-full mt-4 bg-white shadow rounded-lg">
        <thead class="bg-yellow-200 text-yellow-900">
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Nama</th>
                <th class="px-4 py-2">Posisi</th>
                <th class="px-4 py-2">Jadwal Kerja</th>
                <th class="px-4 py-2">No Telepon</th>
                <th class="px-4 py-2">Alamat</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($karyawans as $karyawan)
            <tr class="text-center border-b">
                <td class="px-4 py-2">{{ $karyawan->id }}</td>
                <td class="px-4 py-2">{{ $karyawan->nama }}</td>
                <td class="px-4 py-2">{{ $karyawan->posisi }}</td>
                <td class="px-4 py-2">{{ $karyawan->jadwal_kerja }}</td>
                <td class="px-4 py-2">{{ $karyawan->no_telepon }}</td>
                <td class="px-4 py-2">{{ $karyawan->alamat }}</td>
                <td class="px-4 py-2 flex justify-center gap-2">
                    <a href="{{ route('karyawans.show', $karyawan->id) }}" class="text-blue-600 hover:underline">Lihat</a>
                    <a href="{{ route('karyawans.edit', $karyawan->id) }}" class="text-yellow-600 hover:underline">Edit</a>
                    <a href="{{ route('karyawans.confirmDelete', $karyawan->id) }}" class="text-red-600 hover:underline">Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
