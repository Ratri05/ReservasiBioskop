@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Pengguna</h1>
    <form action="{{ route('penggunas.update', $pengguna->id) }}" method="POST">
        @method('PUT')
        @include('penggunas.form')
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
