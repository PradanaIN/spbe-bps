<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kabkota>
 */
class KabkotaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_kabkota' => fake()->name(),
            'slug_kabkota' => $this->faker->slug(),
            'created_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'area_id' => mt_rand(1, 8),
            'pic_id' => mt_rand(1, 8),
            'provinsi_id' => mt_rand(1,5),
            'perencanaan_id' => mt_rand(1,10),
            'pengelolaan_id' => mt_rand(1,10),
            'usulan_id' => mt_rand(1,10)
        ];
    }
}
