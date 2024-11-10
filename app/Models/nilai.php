<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nilai extends Model
{
    use HasFactory;

    protected $table = 'nilaipelajaran';
   
    protected $fillable = [
        'siswa_id',
        'ipa',
        'matematika',
        'biologi',
         'total_nilai', 
         'ranking'
    ];

    protected static function booted()
    {
        static::saved(function ($nilai) {
            $totalNilai = $nilai->ipa + $nilai->matematika + $nilai->biologi;
            $nilai->update(['total_nilai' => $totalNilai]);

            $allNilai = Nilai::orderByDesc('total_nilai')->get();
            $ranking = $allNilai->search(fn($item) => $item->id == $nilai->id) + 1;

            $nilai->update(['ranking' => $ranking]);
        });
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
