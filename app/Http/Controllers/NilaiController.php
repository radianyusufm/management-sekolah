<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function mataPelajaran()
    {
        $nilai = Nilai::with('siswa')->get();
        return view('nilai.mata_pelajaran', compact('nilai'));
    }

    public function create()
    {
        $siswa = Siswa::all(); // Mengambil semua data siswa
        return view('nilai.create', compact('siswa'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'kelas' => 'required|string|max:10',
            'mata_pelajaran' => 'required|string|max:100',
            'semester1' => 'required|integer|min:0|max:100',
            'semester2' => 'required|integer|min:0|max:100',
        ], [
            'kelas.required' => 'Kelas wajib diisi.',
            'mata_pelajaran.required' => 'Mata pelajaran wajib diisi.',
            'semester1.required' => 'Nilai semester 1 wajib diisi.',
            'semester1.integer' => 'Nilai semester 1 harus berupa angka.',
            'semester1.min' => 'Nilai semester 1 tidak boleh kurang dari 0.',
            'semester1.max' => 'Nilai semester 1 tidak boleh lebih dari 100.',
            'semester2.required' => 'Nilai semester 2 wajib diisi.',
            'semester2.integer' => 'Nilai semester 2 harus berupa angka.',
            'semester2.min' => 'Nilai semester 2 tidak boleh kurang dari 0.',
            'semester2.max' => 'Nilai semester 2 tidak boleh lebih dari 100.',
        ]);

        // Mengambil semua siswa
        $students = Siswa::all();

        // Loop untuk setiap siswa dan membuat entri nilai
        foreach ($students as $siswa) {
            Nilai::updateOrCreate(
                [
                    'siswa_id' => $siswa->id,
                    'kelas' => $request->kelas,
                    'mata_pelajaran' => $request->mata_pelajaran,
                ],
                [
                    'semester1' => $request->semester1,
                    'semester2' => $request->semester2,
                ]
            );
        }

        return redirect()->route('nilai.mata_pelajaran')->with('success', 'Mata pelajaran dan nilai berhasil ditambahkan untuk semua siswa di kelas ' . $request->kelas);
    }

    public function edit($siswa_id, $nilai_id)
    {
        // Mencari nilai berdasarkan ID
        $nilai = Nilai::findOrFail($nilai_id);

        // Validasi kepemilikan nilai dengan siswa
        if ($nilai->siswa_id != $siswa_id) {
            abort(403, 'Unauthorized action.');
        }

        $siswa = Siswa::all();
        return view('nilai.edit', compact('nilai', 'siswa'));
    }

    public function update(Request $request, $siswa_id, $nilai_id)
    {
        // Validasi input dari request
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'kelas' => 'required|string|max:10',
            'mata_pelajaran' => 'required|string|max:100',
            'semester1' => 'required|integer|min:0|max:100',
            'semester2' => 'required|integer|min:0|max:100',
        ], [
            'siswa_id.required' => 'Siswa wajib dipilih.',
            'siswa_id.exists' => 'Siswa tidak ditemukan.',
            'kelas.required' => 'Kelas wajib diisi.',
            'mata_pelajaran.required' => 'Mata pelajaran wajib diisi.',
            'semester1.required' => 'Nilai semester 1 wajib diisi.',
            'semester1.integer' => 'Nilai semester 1 harus berupa angka.',
            'semester1.min' => 'Nilai semester 1 tidak boleh kurang dari 0.',
            'semester1.max' => 'Nilai semester 1 tidak boleh lebih dari 100.',
            'semester2.required' => 'Nilai semester 2 wajib diisi.',
            'semester2.integer' => 'Nilai semester 2 harus berupa angka.',
            'semester2.min' => 'Nilai semester 2 tidak boleh kurang dari 0.',
            'semester2.max' => 'Nilai semester 2 tidak boleh lebih dari 100.',
        ]);

        // Mencari nilai berdasarkan ID
        $nilai = Nilai::findOrFail($nilai_id);

        // Pastikan nilai tersebut terkait dengan siswa yang diberikan
        if ($nilai->siswa_id != $siswa_id) {
            abort(403, 'Unauthorized action.');
        }

        // Update nilai berdasarkan input dari request
        $nilai->update($request->only(['kelas', 'mata_pelajaran', 'semester1', 'semester2']));

        // Redirect dengan pesan sukses
        return redirect()->route('siswa.show', $siswa_id)->with('success', 'Nilai berhasil diperbarui.');
    }

    public function destroy(Nilai $nilai)
    {
        $nilai->delete();
        return redirect()->route('nilai.mata_pelajaran')->with('success', 'Nilai berhasil dihapus.');
    }
}
