@extends('layouts.layout')

@section('content')
<div class="container mt-5">
    <h1 class="display-6 text-center mb-4">Cari Informasi Siswa</h1>

    @if(session('error'))
        <div class="alert alert-danger mb-4">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('siswa.search.submit') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="nik" class="form-label">NIK Siswa</label>
            <input type="text" name="nik" id="nik" class="form-control" required placeholder="Masukkan NIK Siswa" aria-describedby="nikHelp">
            <small id="nikHelp" class="form-text text-muted">Masukkan NIK siswa untuk mencari informasi.</small>
        </div>

        <button type="submit" class="btn btn-primary mt-3 w-100">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search me-2" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
            </svg>
            Cari
        </button>
    </form>
</div>
@endsection
