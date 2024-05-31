<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DukPro;
use App\Models\BahanBaku;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory()->create([
            'name' => 'customer',
            'email' => 'customer@gmail.com',
            'username' => 'customer',
            'role' => 'customer',
            'password' => bcrypt('customer123'),
            'address' => 'JL. alibudin',
            'date_of_birth' => '2024-04-29',
            'phone_number' => '08551515523',
            'gender' => 'male',
        ]);

         DukPro::factory()->create([
                'nama' => 'Produk 1',
                'harga' => 20000,
                'stok' => 50,
                'status' => 'Titipan',
                'keterangan' => 'Available',
                'tanggal_kadaluarsa' => '2024-12-31',
                'deskripsi' => 'Deskripsi produk 1',
                'image' => 'gambar_produk_1.jpg',
                'kategori' => 'Kategori 1',
            ]);

            DukPro::factory()->create([
                'nama' => 'Produk 2',
                'harga' => 20000,
                'stok' => 50,
                'status' => 'Titipan',
                'keterangan' => 'Available',
                'tanggal_kadaluarsa' => '2024-12-31',
                'deskripsi' => 'Deskripsi produk 1',
                'image' => 'gambar_produk_1.jpg',
                'kategori' => 'Kategori 1',
            ]);

            BahanBaku::factory()->create([
                'nama_bahan_baku' => 'Tepung', 
                'stok_bahan_baku' => 100, 
                'satuan_bahan_baku' => 'Gram', 
                'harga_bahan_baku' => '10000'

            ]);

            BahanBaku::factory()->create([
                'nama_bahan_baku' => 'Telur', 
                'stok_bahan_baku' => 100, 
                'satuan_bahan_baku' => 'Butir', 
                'harga_bahan_baku' => '15000'

            ]);
            

    }
}
