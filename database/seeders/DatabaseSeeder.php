<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat 10 user secara otomatis menggunakan factory
        \App\Models\User::factory(10)->create();

        // Membuat satu user admin dengan data khusus
        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin123'),
        ]);

        // Memanggil seeder Siswa
        $this->call(SiswaSeeder::class);
        $this->call(NilaiPelajaranSeeder::class);
    }
}
