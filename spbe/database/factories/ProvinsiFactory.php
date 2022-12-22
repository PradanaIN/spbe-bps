<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Provinsi>
 */
class ProvinsiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_provinsi' => fake()->name(),
            'slug_provinsi' => $this->faker->slug(),
            'created_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'area_id' => mt_rand(1, 8),
            'pic_id' => mt_rand(1, 8),
            'kabkota_id' => mt_rand(1,5),
            'perencanaan_id' => mt_rand(1,10),
            'pengelolaan_id' => mt_rand(1,10),
            'usulan_id' => mt_rand(1,10)

        ];
    }
}
