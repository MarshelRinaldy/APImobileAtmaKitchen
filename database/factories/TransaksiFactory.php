<?php

namespace Database\Factories;

use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransaksiFactory extends Factory
{
    protected $model = Transaksi::class;

    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 4),
            'metode_pembayaran' => $this->faker->randomElement(['Cash', 'Credit Card']),
            'tanggal_transaksi' => $this->faker->date,
            'jumlah_transaksi' => $this->faker->numberBetween(1, 5),
            'bukti_pembayaran' => $this->faker->word . '.jpg',
            'status_pembayaran' => 'Completed',
            'jenis_delivery' => $this->faker->randomElement(['Express', 'Regular']),
            'jarak_delivery' => $this->faker->randomFloat(2, 1, 20),
            'alamat_pengantaran' => $this->faker->address,
            'total_harga' => $this->faker->numberBetween(50000, 200000),
            'status_transaksi' => 'Delivered',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
