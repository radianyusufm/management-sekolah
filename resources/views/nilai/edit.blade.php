@extends('layouts.layout')

@section('content')
<div class="container">
    <h1 class="display-6 text-center">Edit Nilai</h1>
    <form action="{{ route('nilai.update', ['siswa_id' => $nilai->siswa_id, 'nilai_id' => $nilai->id]) }}" method="POST">
        @csrf
        @method('PUT')
    
        <div class="form-group">
            <label for="siswa_id">Siswa</label>
            <select name="siswa_id" id="siswa_id" class="form-control @error('siswa_id') is-invalid @enderror" required>
                @foreach ($siswa as $s)
                    <option value="{{ $s->id }}" {{ $s->id == $nilai->siswa_id ? 'selected' : '' }}>
                        {{ $s->nama }}
                    </option>
                @endforeach
            </select>
            @error('siswa_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    
        <div class="form-group">
            <label for="kelas">Kelas</label>
            <input type="text" name="kelas" id="kelas" class="form-control @error('kelas') is-invalid @enderror" value="{{ $nilai->kelas }}" required>
            @error('kelas')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    
        <div class="form-group">
            <label for="mata_pelajaran">Mata Pelajaran</label>
            <input type="text" name="mata_pelajaran" id="mata_pelajaran" class="form-control @error('mata_pelajaran') is-invalid @enderror" value="{{ $nilai->mata_pelajaran }}" required>
            @error('mata_pelajaran')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    
        <div class="form-group">
            <label for="semester1">Nilai Semester 1</label>
            <input type="number" name="semester1" id="semester1" class="form-control @error('semester1') is-invalid @enderror" value="{{ $nilai->semester1 }}" required>
            @error('semester1')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    
        <div class="form-group">
            <label for="semester2">Nilai Semester 2</label>
            <input type="number" name="semester2" id="semester2" class="form-control @error('semester2') is-invalid @enderror" value="{{ $nilai->semester2 }}" required>
            @error('semester2')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    
        <button type="submit" class="btn btn-primary">Update Nilai</button>
    </form>
</div>
@endsection
