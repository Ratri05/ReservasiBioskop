@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-xl font-semibold mb-4 text-yellow-700">Tambah Transaksi</h2>
    @include('transaksis.form', ['transaksi' => new \App\Models\Transaksi()])
</div>
@endsection
