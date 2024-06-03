<?php

namespace Database\Factories;

use App\Models\DukPro;
use Illuminate\Database\Eloquent\Factories\Factory;

class DukProFactory extends Factory
{
    protected $model = DukPro::class;

    public function definition()
    {
        return [
            'nama' => $this->faker->word,
            'harga' => $this->faker->numberBetween(10000, 50000),
            'stok' => $this->faker->numberBetween(10, 100),
            'status' => 'aktif',
            'keterangan' => 'Available',
            'tanggal_kadaluarsa' => $this->faker->date,
            'deskripsi' => $this->faker->sentence,
            'image' => $this->faker->imageUrl,
            'kategori' => $this->faker->word,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
