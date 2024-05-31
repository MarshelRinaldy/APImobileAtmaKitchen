<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BahanBaku;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class BahanBakuController extends Controller
{
    public function show($id): JsonResponse
    {
        $bahanbaku = BahanBaku::find($id);

        return response()->json([
            'data' => $bahanbaku,
        ]);
    }
}
