<?php 
namespace App\Services\Supplier;
use App\Http\Requests\Supplier\SupplierRequest;
use App\Models\Supplier;

Interface SupplierService {
    
    public function createSupplier(SupplierRequest $request);
}