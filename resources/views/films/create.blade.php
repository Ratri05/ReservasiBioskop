@extends('layouts.app')

@section('content')
<div class="container max-w-xl mx-auto bg-white shadow rounded p-6">
    <h1 class="text-xl font-bold mb-4 text-yellow-700">Tambah Film</h1>
    @include('films.form', ['action' => route('films.store'), 'method' => 'POST', 'film' => null])
</div>
@endsection
