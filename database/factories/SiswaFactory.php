<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_siswa' => $this->faker->name(),
            'kelas_siswa' => $this->faker->randomElement(['1', '2', '3', '4', '5', '6', '7', '8', '9', '10']),
            'status' => $this->faker->randomElement(['aktif', 'tidak aktif']),
        ];
    }
}
