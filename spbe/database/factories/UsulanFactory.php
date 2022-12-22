<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usulan>
 */
class UsulanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_usulan' => $this->faker->sentence(mt_rand(2, 5)),
            'slug_usulan' => $this->faker->slug(),
            'status_usulan' => $this->faker->numberBetween(0,0),
            'satuankerja' => $this->faker->sentence(mt_rand(2, 3)),
            'deskripsi' => collect($this->faker->paragraphs(mt_rand(3, 5))),
            'tujuan' => $this->faker->sentence(mt_rand(4, 5)),
            'peserta' => $this->faker->numberBetween(10,100),
            'lama' => $this->faker->numberBetween(0,4),
            'tanggalAwalPelaksanaan' => $this->faker->date(),
            'tanggalAkhirPelaksanaan' => $this->faker->date(),
            'created_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
            // 'user_id' => mt_rand(1, 3),
            'area_id' => mt_rand(1, 8),
            'pic_id' => mt_rand(1, 8),
            'provinsi_id' => mt_rand(1,5),
            'kabkota_id' => mt_rand(1,5)
        ];
    }
}
