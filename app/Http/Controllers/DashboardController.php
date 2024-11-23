<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Nilai;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSiswa = Siswa::count(); // Hitung jumlah siswa
        $totalPengguna = 0; // Ganti dengan logika yang sesuai untuk menghitung pengguna
        $totalMataPelajaran = Nilai::distinct('mata_pelajaran')->count('mata_pelajaran'); // Hitung jumlah mata pelajaran yang berbeda di tabel nilai

        return view('dashboard', compact('totalSiswa', 'totalPengguna', 'totalMataPelajaran'));
    }
}
