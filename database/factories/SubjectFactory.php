<?php

namespace Database\Factories;

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

        // $table->string('title');
        // $table->bigInteger('lecturer_id')->unsigned();
        // // smester
        // $table->string('semesters');
        // // tahun akademik
        // $table->string('academic_year');
        // // sks
        // $table->integer('sks');
        // // kode matakuliah
        // $table->string('code');
        // // deskripsi
        // $table->text('description');
        return [
            'title' => $this->faker->sentence(3),
            'lecturer_id' => \App\Models\User::factory(),
            // 'semesters' => 'Ganjil',
            'semesters' => $this->faker->numberBetween(1, 8),
            'academic_year' => $this->faker->numberBetween(2010, 2020),
            'sks' => $this->faker->numberBetween(2, 6),
            'code' => $this->faker->sentence(3),
            'description' => $this->faker->sentence(3),
        ];
    }
}
