<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Perencanaan>
 */
class PerencanaanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_kegiatan' => $this->faker->sentence(mt_rand(2, 5)),
            'slug_kegiatan' => $this->faker->slug(),
            'deskripsi' => collect($this->faker->paragraphs(mt_rand(3, 5))),
            'tujuan' => $this->faker->sentence(mt_rand(2, 5)),
            'peserta' => $this->faker->numberBetween(10,100),
            'lama' => $this->faker->numberBetween(0,4),
            'tanggalAwalPelaksanaan' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'tanggalAkhirPelaksanaan' => $this->faker->dateTimeBetween('-1 years', 'now'),
            // 'status_kegiatan' => $this->faker->numberBetween(0,1),
            'status_persetujuan' => $this->faker->numberBetween(-1,2),
            'deskripsi_tolak' => collect($this->faker->paragraphs(mt_rand(3, 5))),
            'created_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'area_id' => mt_rand(1, 8),
            'pic_id' => mt_rand(1, 8)

        ];
    }
}
