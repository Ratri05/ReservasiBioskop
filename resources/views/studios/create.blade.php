@extends('layouts.app')

@section('content')
<div class="container bg-light rounded shadow p-4">
    <h2 class="text-brown mb-4">Tambah Studio</h2>
    @include('studios.form', ['action' => route('studios.store'), 'method' => 'POST', 'studio' => null])
</div>
@endsection
