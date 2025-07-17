@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Pengguna Baru</h1>
    <form action="{{ route('penggunas.store') }}" method="POST">
        @include('penggunas.form')
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
