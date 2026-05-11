@extends('layouts.app')

@section('title', 'Kelompok 8')

@section('content')
<div class="card text-center" style="max-width: 700px; margin: auto; padding: 60px;">
    <h1 style="font-size: 48px;">Kelompok 8</h1>
    <p style="font-size: 20px; color: #555;">
        Selamat datang di toko online kami.
    </p>

    <div style="margin-top: 30px;">
        <a href="/login" class="btn btn-dark" style="font-size: 20px; padding: 14px 28px;">Login</a>
        <a href="/register" class="btn btn-green" style="font-size: 20px; padding: 14px 28px;">Register</a>
    </div>
</div>
@endsection