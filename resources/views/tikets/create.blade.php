@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="text-warning mb-4">Tambah Tiket</h2>
    @include('tikets.form', [
    'action' => route('tikets.store'),
    'method' => 'POST',
    'studios' => $studios,
    'films' => $films
])
</div>
@endsection
