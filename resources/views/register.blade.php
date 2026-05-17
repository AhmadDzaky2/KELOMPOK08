@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card page-card">
            <div class="card-body p-5">

                <div class="text-center mb-4">
                    <div class="bg-success bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                         style="width: 80px; height: 80px;">
                        <i class="bi bi-person-plus-fill text-white fs-1"></i>
                    </div>
                    <h2 class="fw-bold">Create Account</h2>
                    <p class="text-muted">Daftar akun baru sekarang</p>
                </div>

                <form method="POST" action="/register">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control form-control-lg" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>

                        <div class="input-group">
                            <input type="password" id="reg_password" name="password" class="form-control form-control-lg" required>

                            <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('reg_password')">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Konfirmasi Password</label>

                        <div class="input-group">
                            <input type="password" id="reg_password_confirmation" name="password_confirmation" class="form-control form-control-lg" required>

                            <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('reg_password_confirmation')">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success w-100 fw-semibold">
                        Register
                    </button>
                </form>

                <p class="text-center mt-4 mb-0">
                    Sudah punya akun?
                    <a href="/login" class="text-primary fw-semibold">Login</a>
                </p>

            </div>
        </div>
    </div>
</div>
@endsection