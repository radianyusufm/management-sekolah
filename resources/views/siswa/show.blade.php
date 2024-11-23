@extends('layouts.layout')

@section('content')
<div class="container mt-5">
    <h1 class="display-6 text-center mb-4">Detail Siswa</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <!-- Student Information -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <h5 class="card-title">{{ $siswa->nama }}</h5>
                    <p class="card-text"><strong>ID:</strong> {{ $siswa->id }}</p>
                    <p class="card-text"><strong>Tanggal Lahir:</strong> {{ $siswa->tanggal_lahir }}</p>
                    <p class="card-text"><strong>Tempat Lahir:</strong> {{ $siswa->tempat_lahir }}</p>
                    <p class="card-text"><strong>NIK:</strong> {{ $siswa->nik }}</p>
                    <p class="card-text"><strong>Jenis Kelamin:</strong> {{ $siswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
                </div>
                <div class="col-md-6">
                    <p class="card-text"><strong>Agama:</strong> {{ $siswa->agama }}</p>
                    <p class="card-text"><strong>Alamat:</strong> {{ $siswa->alamat }}</p>
                    <p class="card-text"><strong>Nama Orang Tua:</strong> {{ $siswa->nama_orang_tua }}</p>
                    <p class="card-text"><strong>Tahun Masuk:</strong> {{ $siswa->tahun_masuk }}</p>
                </div>
            </div>

            <hr>

            <!-- Student Grades -->
            <h5 class="mt-4">Nilai Mata Pelajaran</h5>
            
            @for ($kelas = 1; $kelas <= 6; $kelas++)
                <h6 class="text-primary mt-3">Kelas {{ $kelas }}</h6>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Mata Pelajaran</th>
                            <th>Nilai Semester 1</th>
                            <th>Nilai Semester 2</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            // Retrieve all grades for this class
                            $nilaiMataPelajaran = $siswa->nilai()->where('kelas', $kelas)->get();
                        @endphp

                        @if ($nilaiMataPelajaran->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada nilai untuk kelas ini.</td>
                            </tr>
                        @else
                            @foreach ($nilaiMataPelajaran as $index => $nilai)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $nilai->mata_pelajaran }}</td>
                                    <td>{{ $nilai->semester1 ?? 0 }}</td>
                                    <td>{{ $nilai->semester2 ?? 0 }}</td>
                                    <td>
                                        <a href="{{ route('nilai.edit', ['siswa_id' => $nilai->siswa_id, 'nilai_id' => $nilai->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            @endfor

            <div class="mt-4">
                <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                </form>
                <button onclick="window.print()" class="btn btn-secondary btn-sm">Cetak Detail Siswa</button>
            </div>
        </div>
    </div>
</div>
@endsection
