@extends('layouts.layout')

@section('content')
<div class="container mt-5">
    <h1 class="display-6 text-center">Daftar Mata Pelajaran</h1>

    @foreach ($nilai->groupBy('kelas') as $kelas => $nilaiKelas)
        <h3>Kelas {{ $kelas }}</h3>
        <table class="table table-success table-striped" style="max-width: 460px;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Mata Pelajaran</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($nilaiKelas->unique('mata_pelajaran') as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->mata_pelajaran }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach
</div>
@endsection
