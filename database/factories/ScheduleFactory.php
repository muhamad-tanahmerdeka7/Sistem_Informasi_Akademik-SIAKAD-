<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'subject_id' => \App\Models\Subject::factory(),
            'hari' => $this->faker->word,
            'jam_mulai' => $this->faker->randomElement(['07:00', '08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00']),
            'jam_selesai' => $this->faker->randomElement(['08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00']),
            // kode absensi
            'kode_absensi' => $this->faker->word,
            'ruangan' => $this->faker->word,
            'tahun_akademik' => $this->faker->word,
            'semester' => $this->faker->randomDigit(1),
            'created_by' => $this->faker->word,
            'updated_by' => $this->faker->word,
            'deleted_by' => $this->faker->word,
        ];
    }
}
