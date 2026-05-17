@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card page-card">
            <div class="card-body p-5">

                <div class="text-center mb-4">
                    <div class="bg-primary bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                         style="width: 80px; height: 80px;">
                        <i class="bi bi-person-fill text-white fs-1"></i>
                    </div>
                    <h2 class="fw-bold">Welcome Back</h2>
                    <p class="text-muted">Silakan login untuk melanjutkan</p>
                </div>

                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <form method="POST" action="/login">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control form-control-lg" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>

                        <div class="input-group">
                            <input type="password" id="login_password" name="password" class="form-control form-control-lg" required>

                            <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('login_password')">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 fw-semibold">
                        Login
                    </button>
                </form>

                <p class="text-center mt-4 mb-0">
                    Belum punya akun?
                    <a href="/register" class="text-primary fw-semibold">Register</a>
                </p>

            </div>
        </div>
    </div>
</div>
@endsection