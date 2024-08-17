<?php

namespace App\Http\Controllers\Api\Admin\Supplier;

use App\Http\Controllers\Controller;
use App\Http\Requests\Supplier\SupplierRequest;
use App\Http\Requests\Supplier\UpdateSupplierRequest;
use App\Models\Supplier;
use App\Http\Resources\SupplierResource;
use Illuminate\Http\JsonResponse;

class SupplierApiController extends Controller
{
    /**
     * Display a listing of the suppliers.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        // Menggunakan SupplierResource untuk mengemas koleksi data
        $suppliers = SupplierResource::collection(Supplier::all());
        return response()->json($suppliers);
    }

    /**
     * Display the specified supplier.
     *
     * @param Supplier $supplier
     * @return JsonResponse
     */
    public function show(Supplier $supplier): JsonResponse
    {
        // Menggunakan SupplierResource untuk mengemas satu data supplier
        return response()->json(new SupplierResource($supplier));
    }

    /**
     * Store a newly created supplier in storage.
     *
     * @param SupplierRequest $request
     * @return JsonResponse
     */
    public function store(SupplierRequest $request): JsonResponse
    {
        $supplier = Supplier::create($request->validated());

        // Menggunakan SupplierResource untuk mengemas data supplier yang baru dibuat
        return response()->json(new SupplierResource($supplier), 201);
    }

    /**
     * Update the specified supplier in storage.
     *
     * @param UpdateSupplierRequest $request
     * @param Supplier $supplier
     * @return JsonResponse
     */
    public function update(UpdateSupplierRequest $request, Supplier $supplier): JsonResponse
    {
        $supplier->update($request->validated());

        // Menggunakan SupplierResource untuk mengemas data supplier yang diperbarui
        return response()->json(new SupplierResource($supplier));
    }

    /**
     * Remove the specified supplier from storage.
     *
     * @param Supplier $supplier
     * @return JsonResponse
     */
    public function destroy(Supplier $supplier): JsonResponse
    {
        $supplier->delete();

        return response()->json(null, 204);
    }
}

