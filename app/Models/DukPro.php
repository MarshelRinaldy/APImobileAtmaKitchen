<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DukPro extends Model
{
    use HasFactory;

    protected $table = 'dukpro';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'id',
        'nama',
        'harga',
        'stok',
        'status',
        'keterangan',
        'tangal_kadaluarsa',
        'deskripsi',
        'image',
        'kategori',
        'created_at',
        'updated_at'
    ];

    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class, 'produk_id');
    }
}
