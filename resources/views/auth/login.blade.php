@extends('layouts.layout')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="display-6 text-center mb-4">Login</h1>
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('login.post') }}" method="POST">
                        @csrf

                        <!-- Email -->
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="form-group mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit & Register -->
                        <div class="d-flex justify-content-between align-items-center">
                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        </div>
                    </form>
                    <div class="text-center mt-3">
                        <a href="{{ route('register') }}" class="text-decoration-none">Belum punya akun? Daftar di sini</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
