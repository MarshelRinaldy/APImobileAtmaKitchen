<?php

namespace App\Http\Controllers;

use App\Http\Resources\PesananTransaksi;
use App\Http\Resources\PesananTransaksiResources;
use App\Models\DetailTransaksi;
use App\Models\DukPro;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesananTransaksiController extends Controller
{
    private $pesananTransaksi;

    public function __construct()
    {
        $this->pesananTransaksi = new Transaksi();
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pageSize = $request->query('per_page', 5);
        $pesanan = Transaksi::paginate($pageSize);

        return new PesananTransaksiResources($pesanan);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pesanan = DB::table('detail_transaksi as a')
            ->join('transaksis as b', 'a.transaksi_id', '=', 'b.id')
            ->join('dukpro as c', 'a.produk_id', '=', 'c.id')
            ->join('users as d', 'b.user_id', '=', 'd.id')
            ->select('c.nama', 'a.jumlah_produk', 'b.tanggal_transaksi', 'b.alamat_pengantaran', 'b.total_harga', 'b.status_transaksi')
            ->where('d.id', $id)
            ->get();

        if ($pesanan->isEmpty()) {
            return response()->json(['status' => 404, 'message' => 'Pesanan tidak ditemukan'], 404);
        }

        return new PesananTransaksiResources($pesanan);
    }

    public function showByNameProduk(string $name, string $id)
    {
        $pesanan = DB::table('detail_transaksi as a')
            ->join('transaksis as b', 'a.transaksi_id', '=', 'b.id')
            ->join('dukpro as c', 'a.produk_id', '=', 'c.id')
            ->join('users as d', 'b.user_id', '=', 'd.id')
            ->select('c.nama', 'a.jumlah_produk', 'b.tanggal_transaksi', 'b.alamat_pengantaran', 'b.total_harga', 'b.status_transaksi')
            ->where('c.nama', 'like', '%' . $name . '%')
            ->where('d.id', $id)
            ->get();

        if ($pesanan->isEmpty()) {
            return response()->json(['status' => 404, 'message' => 'Pesanan tidak ditemukan'], 404);
        }

        return new PesananTransaksiResources($pesanan);
    }

    
    public function showByStatus(string $id, string $status = null)
    {
        $pesananQuery = Transaksi::with(['detailTransaksi.produk'])
        ->where('user_id', $id);

        if($status != null) {
            $pesananQuery->where('status_transaksi', 'like', '%' . $status . '%');
        }

        $pesanan = $pesananQuery->get()->map(function ($transaksi) {
            return [
                'id' => $transaksi->id,
                'no_transaksi' => $transaksi->no_transaksi,
                'jumlah_transaksi' => $transaksi->jumlah_transaksi,
                'biaya_ongkir' => $transaksi->biaya_ongkir,
                'total_harga' => $transaksi->total_harga,
                'status_transaksi' => $transaksi->status_transaksi,
                'produk' => $transaksi->detailTransaksi->map(function ($detail) {
                    return [
                        'id' => $detail->produk->id,
                        'nama_produk' => $detail->produk->nama,
                        'deskripsi_produk' => $detail->produk->deskripsi,
                        'jumlah_produk' => $detail->jumlah_produk,
                        'harga' => $detail->produk->harga
                    ];
                })
            ];
        });

        if ($pesanan->isEmpty()) {
            return response()->json(['status' => 404, 'message' => 'Pesanan tidak ditemukan'], 404);
        }

        return new PesananTransaksiResources($pesanan);
    }

    public function updateStatus(Request $request, string $id)
    {
        $pesanan = Transaksi::find($id);

        if (!$pesanan) {
            return response()->json(['status' => 404, 'message' => 'Pesanan tidak ditemukan'], 404);
        }

        $pesanan->status_transaksi = $request->status;
        $pesanan->save();

        return new PesananTransaksiResources($pesanan->toArray());
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
