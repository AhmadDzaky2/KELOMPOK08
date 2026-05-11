@extends('layouts.app')

@section('title', 'Kelompok 8')

@section('content')
<div class="card text-center" style="max-width: 700px; margin: auto; padding: 60px 40px;">
    <h1 style="font-size: 48px; margin-bottom: 15px;">🛍 Kelompok 8</h1>
    <p style="font-size: 20px; color: #666; margin-bottom: 30px;">
        Selamat datang di aplikasi toko online kami.
    </p>

    <a href="/login" class="btn btn-dark" style="margin-right: 10px;">
        Login
    </a>

    <a href="/register" class="btn btn-green">
        Register
    </a>
</div>
@endsection