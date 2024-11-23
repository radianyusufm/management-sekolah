@extends('layouts.layout')

@section('content')
<div class="">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Jumlah Siswa</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <h5 class="text-white">{{ $totalSiswa }}</h5> <!-- Dinamis total siswa -->
                    <div class="small text-white"><i class="fas fa-arrow-circle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Jumlah Pengguna</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <h5 class="text-white">{{ $totalPengguna }}</h5> <!-- Dinamis total pengguna -->
                    <div class="small text-white"><i class="fas fa-arrow-circle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Jumlah Mata Pelajaran</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <h5 class="text-white">{{ $totalMataPelajaran }}</h5> <!-- Dinamis total mata pelajaran -->
                    <div class="small text-white"><i class="fas fa-arrow-circle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
