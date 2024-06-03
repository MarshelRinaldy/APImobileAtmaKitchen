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
        'no_transaksi',
        'jumlah_transaksi',
        'biaya_ongkir',
        'total_harga',
        'user_id',
        'metode_pembayaran',
        'tanggal_transaksi',
        'total_transaksi',
        'bukti_pembayaran',
        'status_pembayaran',
        'jenis_delivery',
        'jarak_delivery',
        'alamat_pengantaran',
        'status_transaksi',
        'created_at',
        'updated_at'
    ];


    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class, 'transaksi_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
