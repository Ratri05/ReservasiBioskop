@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
<div class="row mt-4">
    <div class="col-12">

        {{-- Pesan Sukses --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Dashboard</h2>
            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-outline-danger">Logout</button>
            </form>
        </div>

        <div class="card shadow">
            <div class="card-body">
                @if(Auth::check())
                    <h5 class="card-title">Selamat Datang, {{ Auth::user()->name }}!</h5>
                    <p class="card-text">Anda berhasil login ke sistem.</p>
                    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                @else
                    <h5 class="card-title">Selamat Datang di Dashboard</h5>
                    <p class="card-text">Silakan login untuk mengakses informasi Anda.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
