@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-xl font-semibold mb-4 text-yellow-700">Edit Transaksi</h2>
    @include('transaksis.form', ['transaksi' => $transaksi])
</div>
@endsection
