<?php

namespace App\Http\Controllers;

use App\Models\BahanBakuUsage;
use Illuminate\Http\Request;

class BahanBakuUsageController extends Controller
{
    // report
    public function report($start, $end)
    {
        // Memeriksa apakah start lebih besar dari end
        if ($start > $end) {
            return response()->json([
                'error' => 'Tanggal mulai tidak boleh lebih besar dari tanggal akhir.'
            ], 400); // Mengembalikan status kode 400 Bad Request
        }

        // Query data berdasarkan rentang tanggal
        $data = BahanBakuUsage::with('bahanBaku')
            ->whereBetween('tanggal_transaksi', [$start, $end])
            ->get();

        // Jika data tidak ditemukan, ambil semua data
        if ($data->isEmpty()) {
            $data = BahanBakuUsage::with('bahanBaku')->get();
        }

        // Map data untuk menampilkan informasi bahan baku yang dibutuhkan
        $result = $data->map(function ($usage) {
            return [
                'bahan_baku_id' => $usage->bahan_baku_id,
                'transaksi_id' => $usage->transaksi_id,
                'tanggal_transaksi' => $usage->tanggal_transaksi,
                'jumlah_digunakan' => $usage->jumlah_digunakan,
                'nama_bahan_baku' => $usage->bahanBaku->nama_bahan_baku,
                'stok_bahan_baku' => $usage->bahanBaku->stok_bahan_baku,
                'satuan_bahan_baku' => $usage->bahanBaku->satuan_bahan_baku,
            ];
        });

        return response()->json([
            'data' => $result,
        ]);
    }
}
