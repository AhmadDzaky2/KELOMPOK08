@extends('layout')

@section('title', 'Register - Kelompok 8')

@section('content')
<div class="card" style="max-width: 400px; margin: auto;">
    <h2 class="text-center">Register</h2>

    <form method="POST" action="/register">
        @csrf

        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>

        <button type="submit" class="btn btn-green" style="width: 100%; margin-top: 10px;">
            Register
        </button>
    </form>

    <p class="text-center" style="margin-top: 15px;">
        Sudah punya akun? <a href="/login">Login</a>
    </p>
</div>
@endsection
