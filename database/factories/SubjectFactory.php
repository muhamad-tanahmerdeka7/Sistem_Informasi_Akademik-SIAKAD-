<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {


       // Pastikan ada user di database atau buat user baru jika belum ada
       if (User::count() === 0) {
        User::factory()->count(10)->create(); // Buat 10 user sebagai contoh
    }

    return [
        'title' => $this->faker->sentence(3),
        'lecturer_id' => User::inRandomOrder()->first()->id,
        'semesters' => $this->faker->numberBetween(1, 8),
        'academic_year' => $this->faker->numberBetween(2010, 2020),
        'sks' => $this->faker->numberBetween(2, 6),
        'code' => strtoupper($this->faker->lexify('???')), // Menghasilkan kode seperti 'ABC'
        'description' => $this->faker->sentence(10),
    ];
    }
}
