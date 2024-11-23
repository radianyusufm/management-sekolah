@extends('layouts.layout')

@section('content')
<div class="container mt-5">
    <h1 class="display-6 text-center mb-4">Edit Siswa</h1>

    <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nama -->
        <div class="form-group mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $siswa->nama) }}" required>
        </div>

        <!-- Tanggal Lahir -->
        <div class="form-group mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $siswa->tanggal_lahir) }}" required>
        </div>

        <!-- Tempat Lahir -->
        <div class="form-group mb-3">
            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
            <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="{{ old('tempat_lahir', $siswa->tempat_lahir) }}" required>
        </div>

        <!-- NIK -->
        <div class="form-group mb-3">
            <label for="nik" class="form-label">NIK</label>
            <input type="text" name="nik" id="nik" class="form-control" value="{{ old('nik', $siswa->nik) }}" required>
        </div>

        <!-- Jenis Kelamin -->
        <div class="form-group mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                <option value="L" {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <!-- Agama -->
        <div class="form-group mb-3">
            <label for="agama" class="form-label">Agama</label>
            <input type="text" name="agama" id="agama" class="form-control" value="{{ old('agama', $siswa->agama) }}" required>
        </div>

        <!-- Alamat -->
        <div class="form-group mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control" required>{{ old('alamat', $siswa->alamat) }}</textarea>
        </div>

        <!-- Nama Orang Tua -->
        <div class="form-group mb-3">
            <label for="nama_orang_tua" class="form-label">Nama Orang Tua</label>
            <input type="text" name="nama_orang_tua" id="nama_orang_tua" class="form-control" value="{{ old('nama_orang_tua', $siswa->nama_orang_tua) }}" required>
        </div>

        <!-- Tahun Masuk -->
        <div class="form-group mb-3">
            <label for="tahun_masuk" class="form-label">Tahun Masuk</label>
            <input type="number" name="tahun_masuk" id="tahun_masuk" class="form-control" value="{{ old('tahun_masuk', $siswa->tahun_masuk) }}" required min="1900" max="{{ date('Y') }}">
        </div>

        <!-- Kelas -->
        <div class="form-group mb-4">
            <label for="kelas" class="form-label">Kelas</label>
            <select name="kelas" id="kelas" class="form-control" required>
                <option value="" disabled {{ empty(old('kelas', $siswa->kelas)) ? 'selected' : '' }}>Pilih kelas</option>
                <option value="1" {{ old('kelas', $siswa->kelas) == '1' ? 'selected' : '' }}>Kelas 1</option>
                <option value="2" {{ old('kelas', $siswa->kelas) == '2' ? 'selected' : '' }}>Kelas 2</option>
                <option value="3" {{ old('kelas', $siswa->kelas) == '3' ? 'selected' : '' }}>Kelas 3</option>
                <option value="4" {{ old('kelas', $siswa->kelas) == '4' ? 'selected' : '' }}>Kelas 4</option>
                <option value="5" {{ old('kelas', $siswa->kelas) == '5' ? 'selected' : '' }}>Kelas 5</option>
                <option value="6" {{ old('kelas', $siswa->kelas) == '6' ? 'selected' : '' }}>Kelas 6</option>
            </select>
        </div>

        <!-- Submit & Back Buttons -->
        <div class="d-flex justify-content-start">
            <button type="submit" class="btn btn-success mt-3 me-2">Update</button>
            <a href="{{ route('siswa.index') }}" class="btn btn-secondary mt-3">Kembali</a>
        </div>
    </form>
</div>
@endsection
