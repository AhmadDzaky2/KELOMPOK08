@extends('layout')

@section('title', 'Login - Kelompok 8')

@section('content')
<div class="card" style="max-width: 400px; margin: auto;">
    <h2 class="text-center">Login</h2>

    @if(session('error'))
        <p style="color: red; text-align: center;">
            {{ session('error') }}
        </p>
    @endif

    <form method="POST" action="/login">
        @csrf

        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>

        <button type="submit" class="btn btn-dark" style="width: 100%; margin-top: 10px;">
            Login
        </button>
    </form>

    <p class="text-center" style="margin-top: 15px;">
        Belum punya akun? <a href="/register">Register</a>
    </p>
</div>
@endsection
