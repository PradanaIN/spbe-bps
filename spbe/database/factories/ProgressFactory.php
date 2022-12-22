<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Progress>
 */
class ProgressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'rincian_perkembangan' => $this->faker->sentence(mt_rand(2, 5)),
            'peserta' => $this->faker->numberBetween(10,100),
            'realisasi_kegiatan' => $this->faker->numberBetween(0,100),
            'created_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'pengelolaan_id' => mt_rand(1,2),
            'area_id' => mt_rand(1,2)
        ];
    }
}
