<?php

namespace App\Http\Controllers\Api\Admin\Barang;

use App\Http\Controllers\Controller;
use App\Http\Requests\Barang\BarangRequest;
use App\Http\Requests\Barang\UpdateBarangRequest;
use App\Models\Barang;
use App\Models\Supplier;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BarangApiController extends Controller
{
    public function index(): JsonResponse
    {
        $barangs = Barang::all(); // Use all() instead of paginate() for API
        return response()->json($barangs);
    }

    public function show(Barang $barang): JsonResponse
    {
        return response()->json($barang);
    }

    public function store(BarangRequest $request): JsonResponse
    {
        $data = array_merge($request->validated(), ['stok' => 0]);
        $barang = Barang::create($data);

        return response()->json($barang, 201);
    }

    public function update(UpdateBarangRequest $request, Barang $barang): JsonResponse
    {
        $barang->update($request->validated());
        return response()->json($barang);
    }

    public function destroy(Barang $barang): JsonResponse
    {
        $barang->delete();
        return response()->json(null, 204);
    }
}
