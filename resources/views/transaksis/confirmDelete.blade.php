@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-lg font-semibold text-red-700">Konfirmasi Hapus Transaksi</h2>
    <p>Apakah Anda yakin ingin menghapus transaksi tanggal <strong>{{ $transaksi->tanggal_transaksi }}</strong> dengan total pembayaran <strong>Rp{{ number_format($transaksi->total_pembayaran, 0, ',', '.') }}</strong>?</p>
    
    <form action="{{ route('transaksis.destroy', $transaksi->id) }}" method="POST" class="mt-4">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Ya, Hapus</button>
        <a href="{{ route('transaksis.index') }}" class="ml-2 text-gray-600 hover:underline">Batal</a>
    </form>
</div>
@endsection
