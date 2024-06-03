<?php

namespace Database\Factories;

use App\Models\DetailTransaksi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetailTransaksi>
 */
class DetailTransaksiFactory extends Factory
{
    protected $model = DetailTransaksi::class;

    public function definition()
    {
        return [
            'transaksi_id' => $this->faker->numberBetween(1, 3),
            'produk_id' => $this->faker->numberBetween(1, 3),
            'jumlah_produk' => $this->faker->numberBetween(1, 10),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
