@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-xl font-bold mb-4 text-yellow-700">Detail Transaksi</h2>
    <div class="bg-white p-4 rounded shadow">
        <p><strong>Tanggal Transaksi:</strong> {{ $transaksi->tanggal_transaksi }}</p>
        <p><strong>Metode Pembayaran:</strong> {{ $transaksi->metode_pembayaran }}</p>
        <p><strong>Total:</strong> Rp{{ number_format($transaksi->total_pembayaran, 0, ',', '.') }}</p>
        <p><strong>Pengguna:</strong> {{ $transaksi->pengguna->nama ?? 'N/A' }}</p>
        <p><strong>Tiket:</strong> {{ $transaksi->tiket->nomor_kursi ?? 'N/A' }} ({{ $transaksi->tiket->status ?? 'N/A' }})</p>
    </div>
    <div class="mt-4">
        <a href="{{ route('transaksis.edit', $transaksi->id) }}" class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700">Edit</a>
        <a href="{{ route('transaksis.index') }}" class="ml-2 text-gray-600 hover:underline">Kembali</a>
    </div>
</div>
@endsection
