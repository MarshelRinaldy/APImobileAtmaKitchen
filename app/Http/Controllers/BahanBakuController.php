<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BahanBaku;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class BahanBakuController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        if ($request->has('q')) {
            $bahanbaku = BahanBaku::where('nama_bahan_baku', 'LIKE',
                '%'.$request->query('q').'%')->get();
        } else {
            $bahanbaku = BahanBaku::all();
        }

        return response()->json([
            'data' => $bahanbaku,
        ]);
    }
    public function show($id): JsonResponse
    {
        $bahanbaku = BahanBaku::find($id);

        return response()->json([
            'data' => $bahanbaku,
        ]);
    }
}
