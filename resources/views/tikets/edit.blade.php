@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="text-warning mb-4">Edit Tiket</h2>
    @include('tikets.form', [
    'action' => route('tikets.update', $tiket->id),
    'method' => 'PUT',
    'tiket' => $tiket,
    'studios' => $studios,
    'films' => $films
])
</div>
@endsection
