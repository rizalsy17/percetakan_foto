<?php
namespace App\Repositories\Supplier;
use App\Models\Supplier;

interface SupplierRepository {

    public function create(array $supplierData);

}