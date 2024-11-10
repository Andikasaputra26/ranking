<?php

namespace Database\Seeders;

use App\Models\nilai;
use App\Models\Siswa; // Pastikan Siswa model sudah ada
use Illuminate\Database\Seeder;

class NilaiPelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil beberapa siswa dari database (misalnya 10 siswa)
        $siswas = Siswa::all();

        foreach ($siswas as $siswa) {
            // Tambahkan data nilai untuk setiap siswa
            nilai::create([
                'siswa_id' => $siswa->id, // Relasi ke siswa
                'ipa' => rand(60, 100), // Nilai IPA acak antara 60-100
                'matematika' => rand(60, 100), // Nilai Matematika acak antara 60-100
                'biologi' => rand(60, 100),
                 // Nilai Biologi acak antara 60-100
            ]);
        }
    }
}
