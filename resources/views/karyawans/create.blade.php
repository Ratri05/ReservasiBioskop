@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-xl font-bold mb-4 text-yellow-700">Tambah Karyawan</h1>
    @include('karyawans.form', ['route' => route('karyawans.store'), 'method' => 'POST', 'karyawan' => null])
</div>
@endsection
