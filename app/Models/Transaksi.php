<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksis';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'id',
        'user_id',
        'metode_pembayaran',
        'tanggal_transaksi',
        'jumlah_transaksi',
        'total_transaksi',
        'bukti_pembayaran',
        'status_pembayaran',
        'jenis_delivery',
        'jarak_delivery',
        'alamat_pengantaran',
        'total_harga',
        'status_transaksi',
        'created_at',
        'updated_at'
    ];

    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class, 'transaksi_id');
    }
}
