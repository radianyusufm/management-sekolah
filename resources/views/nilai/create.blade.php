@extends('layouts.layout')

@section('content')
<div class="container">
    <h1 class="display-6 text-center mb-4">Tambah Mata Pelajaran</h1>

    <form action="{{ route('nilai.store') }}" method="POST">
        @csrf

        <!-- Kelas -->
        <div class="form-group mb-3">
            <label for="kelas">Kelas</label>
            <select name="kelas" id="kelas" class="form-control @error('kelas') is-invalid @enderror" required>
                <option value="" disabled selected>Pilih kelas</option>
                <option value="1">Kelas 1</option>
                <option value="2">Kelas 2</option>
                <option value="3">Kelas 3</option>
                <option value="4">Kelas 4</option>
                <option value="5">Kelas 5</option>
                <option value="6">Kelas 6</option>
            </select>
            @error('kelas')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Mata Pelajaran -->
        <div class="form-group mb-3">
            <label for="mata_pelajaran">Mata Pelajaran</label>
            <input type="text" name="mata_pelajaran" class="form-control @error('mata_pelajaran') is-invalid @enderror" required>
            @error('mata_pelajaran')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Nilai Semester 1 -->
        <div class="form-group mb-3">
            <label for="semester1">Nilai Semester 1</label>
            <input type="number" name="semester1" class="form-control @error('semester1') is-invalid @enderror" min="0" max="100" required>
            @error('semester1')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Nilai Semester 2 -->
        <div class="form-group mb-4">
            <label for="semester2">Nilai Semester 2</label>
            <input type="number" name="semester2" class="form-control @error('semester2') is-invalid @enderror" min="0" max="100" required>
            @error('semester2')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Tombol Submit & Kembali -->
        <div class="d-flex justify-content-start mt-4">
            <button type="submit" class="btn btn-primary me-3">Simpan</button>
            <a href="{{ route('nilai.mata_pelajaran') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>
@endsection
