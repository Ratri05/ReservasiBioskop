@extends('layouts.app')

@section('content')
<div class="container bg-light rounded shadow p-4">
    <h2 class="text-brown mb-4">Edit Studio</h2>
    @include('studios.form', [
        'action' => route('studios.update', $studio->id),
        'method' => 'PUT',
        'studio' => $studio
    ])
</div>
@endsection
