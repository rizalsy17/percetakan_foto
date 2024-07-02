<?php
namespace App\Repositories\Supplier;
use App\Repositories\Supplier\SupplierRepository;
use App\Models\Supplier;

class SupplierRepositoryImplement implements SupplierRepository {
    public function create(array $supplierData){
        $supplier = new Supplier($supplierData);
        $supplier->save();
    }

}