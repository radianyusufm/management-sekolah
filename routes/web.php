<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AuthController;

// Rute dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');


Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'postLogin'])->name('login.post');

Route::get('register', [AuthController::class, 'registration'])->name('register');
Route::post('register', [AuthController::class, 'postRegistration'])->name('register.post');


// Rute dengan middleware auth
Route::middleware('auth')->group(function () {

    // Rute logout
    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/login')->with('success', 'You have been logged out.');
    })->name('logout');

    // Rute pencarian siswa
    Route::get('/siswa/search', [SiswaController::class, 'showSearchForm'])->name('siswa.search');
    Route::post('/siswa/search', [SiswaController::class, 'search'])->name('siswa.search.submit');

    // Rute untuk Siswa
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index'); // Menampilkan daftar siswa
    Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create'); // Form untuk membuat siswa baru
    Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store'); // Menyimpan siswa baru
    Route::get('/siswa/{id}', [SiswaController::class, 'show'])->name('siswa.show'); // Menampilkan detail siswa
    Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit'])->name('siswa.edit'); // Form untuk mengedit siswa
    Route::put('/siswa/{id}', [SiswaController::class, 'update'])->name('siswa.update'); // Memperbarui siswa
    Route::delete('/siswa/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy'); // Menghapus siswa

    // Rute untuk Nilai
    Route::get('/nilai/mata_pelajaran', [NilaiController::class, 'mataPelajaran'])->name('nilai.mata_pelajaran'); // Menampilkan daftar nilai
    Route::get('/nilai/create', [NilaiController::class, 'create'])->name('nilai.create'); // Form untuk membuat nilai baru
    Route::post('/nilai', [NilaiController::class, 'store'])->name('nilai.store'); // Menyimpan nilai baru
    Route::get('/nilai/{id}', [NilaiController::class, 'mata_pelajaran'])->name('nilai.show'); // Menampilkan detail nilai
    Route::get('/nilai/{id}/edit', [NilaiController::class, 'edit'])->name('nilai.edit'); // Form untuk mengedit nilai
    Route::put('/nilai/{id}', [NilaiController::class, 'update'])->name('nilai.update'); // Memperbarui nilai
    Route::delete('/nilai/{id}', [NilaiController::class, 'destroy'])->name('nilai.destroy'); // Menghapus nilai

    // Rute khusus untuk nilai berdasarkan siswa_id dan nilai_id
    Route::get('/siswa/{siswa_id}/nilai/{nilai_id}/edit', [NilaiController::class, 'edit'])->name('nilai.edit');
    Route::put('/siswa/{siswa_id}/nilai/{nilai_id}', [NilaiController::class, 'update'])->name('nilai.update');
});
