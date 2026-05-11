@extends('layouts.app')

@section('title', 'Login - Kelompok 8')

@section('content')
<div class="card" style="max-width: 400px; margin:auto;">
    <h2 class="text-center">Login</h2>

    <form method="POST" action="/login">
        @csrf

        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>

        <button type="submit" class="btn btn-dark" style="width:100%;">Login</button>
    </form>

    <p class="text-center">
        Belum punya akun? <a href="/register">Register</a>
    </p>
</div>
@endsection