<?php

namespace App\Http\Controllers;
use App\Models\DukPro;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DukproController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        if ($request->has('q')) {
            $dukpro = DukPro::where('nama', 'LIKE',
                '%'.$request->query('q').'%')->get();
        } else {
            $dukpro = DukPro::all();
        }

        return response()->json([
            'data' => $dukpro,
        ]);
    }

    public function show($id): JsonResponse
    {
        $dukpro = DukPro::find($id);

        return response()->json([
            'data' => $dukpro,
        ]);
    }

}
