<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Nilai;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';

    // Tentukan field yang dapat diisi secara massal
    protected $fillable = [
        'nama',
        'tanggal_lahir',
        'tempat_lahir',
        'nik',
        'jenis_kelamin',
        'agama',
        'alamat',
        'nama_orang_tua',
        'tahun_masuk',
        'kelas', 
    ];

    // Hubungan dengan model Nilai
    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }

    // Tambahkan event created untuk menambah data nilai otomatis
    protected static function booted()
    {
        static::created(function ($siswa) {
            // Daftar kelas dan mata pelajaran yang akan diisi dengan nilai 0
            $kelasList = ['1', '2', '3', '4', '5', '6'];
            $mataPelajaranList = [
                'Matematika',
                'Bahasa Indonesia',
                'Bahasa Inggris',
                'Ilmu Pengetahuan Alam',
                'Ilmu Pengetahuan Sosial',
                'Pendidikan Kewarganegaraan',
                'Seni Budaya',
                'Pendidikan Jasmani',
                'Teknologi Informasi dan Komunikasi',
                'Agama'
            ];

            foreach ($kelasList as $kelas) {
                foreach ($mataPelajaranList as $mataPelajaran) {
                    Nilai::create([
                        'siswa_id' => $siswa->id,
                        'kelas' => $kelas,
                        'mata_pelajaran' => $mataPelajaran,
                        'semester1' => 0,
                        'semester2' => 0,
                    ]);
                }
            }
        });
    }
}
