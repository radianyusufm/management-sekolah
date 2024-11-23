<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::all();
        return view('siswa.index', compact('siswa'));
    }

    public function showSearchForm()
    {
        return view('siswa.search');
    }

    public function search(Request $request)
    {
        $request->validate([
            'nik' => 'required|string',
        ]);

        $siswa = Siswa::where('nik', $request->nik)->first();

        if (!$siswa) {
            return redirect()->route('siswa.search')->with('error', 'Siswa dengan NIK tersebut tidak ditemukan.');
        }

        return view('siswa.show', compact('siswa'));
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string|max:100',
            'nik' => 'required|string|max:20|unique:siswa,nik',
            'jenis_kelamin' => 'required|string|max:10',
            'agama' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
            'nama_orang_tua' => 'required|string|max:100',
            'tahun_masuk' => 'required|integer|min:1900|max:' . date('Y'), 
            'kelas' => 'required|string|max:10',
        ]);

        Siswa::create($request->all());
        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil ditambahkan.');
    }

    public function show($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.show', compact('siswa'));
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.edit', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string|max:100',
            'nik' => 'required|string|max:20|unique:siswa,nik,' . $id,
            'jenis_kelamin' => 'required|string|max:10',
            'agama' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
            'nama_orang_tua' => 'required|string|max:100',
            'tahun_masuk' => 'required|integer|min:1900|max:' . date('Y'), // Validasi tahun masuk
            'kelas' => 'required|string|max:10',
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswa->update($request->all());

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $siswa = Siswa::find($id);
        if ($siswa) {
            $siswa->delete();
            return redirect()->route('siswa.index')->with('success', 'Siswa berhasil dihapus.');
        }
        return redirect()->route('siswa.index')->with('error', 'Siswa tidak ditemukan.');
    }
}
