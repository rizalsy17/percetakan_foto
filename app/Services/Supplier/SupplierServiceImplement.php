<?php 
namespace App\Services\Supplier;
use App\Http\Requests\Supplier\SupplierRequest;
use App\Models\Supplier;
use App\Repositories\Supplier\SupplierRepository;

class SupplierServiceImplement implements SupplierService {

    protected $SupplierRepository;

    public function __construct(SupplierRepository $SupplierRepository) {
        $this->SupplierRepository = $SupplierRepository;
    }

    public function createSupplier(SupplierRequest $request){
        $supplierData = [
            'nama_supplier' => $request->input('nama_supplier'),
            'perusahaan' => $request->input('perusahaan'),
            'telepon' => $request->input('telepon'),
            'domisili' => $request->input('domisili'),
            'alamat' => $request->input('alamat'),
        ];
        $this->SupplierRepository->create($supplierData);
    }
}
