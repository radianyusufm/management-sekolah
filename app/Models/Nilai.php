<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $table = 'nilai';

    // Tentukan field yang dapat diisi secara massal
    protected $fillable = [
        'siswa_id',
        'kelas',
        'mata_pelajaran',
        'semester1',
        'semester2',
    ];

    // Hubungan dengan model Siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
