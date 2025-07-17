@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4 text-yellow-700">Daftar Transaksi</h1>
    <a href="{{ route('transaksis.create') }}" class="bg-yellow-600 text-white px-4 py-2 rounded mb-4 inline-block hover:bg-yellow-700">Tambah Transaksi</a>
    <table class="min-w-full bg-white rounded shadow-md">
        <thead class="bg-yellow-100 text-yellow-800">
            <tr>
                <th class="py-2 px-4">Tanggal</th>
                <th class="py-2 px-4">Metode Pembayaran</th>
                <th class="py-2 px-4">Total</th>
                <th class="py-2 px-4">Pengguna</th>
                <th class="py-2 px-4">Tiket</th>
                <th class="py-2 px-4">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaksis as $transaksi)
                <tr class="border-b">
                    <td class="py-2 px-4">{{ $transaksi->tanggal_transaksi }}</td>
                    <td class="py-2 px-4">{{ $transaksi->metode_pembayaran }}</td>
                    <td class="py-2 px-4">Rp{{ number_format($transaksi->total_pembayaran, 0, ',', '.') }}</td>
                    <td class="py-2 px-4">{{ $transaksi->pengguna->nama ?? 'N/A' }}</td>
                    <td class="py-2 px-4">{{ $transaksi->tiket->nomor_kursi ?? 'N/A' }}</td>
                    <td class="py-2 px-4 space-x-2">
                        <a href="{{ route('transaksis.show', $transaksi->id) }}" class="text-blue-600 hover:underline">Lihat</a>
                        <a href="{{ route('transaksis.edit', $transaksi->id) }}" class="text-yellow-600 hover:underline">Edit</a>
                        <form action="{{ route('transaksis.destroy', $transaksi->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin hapus transaksi ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
