<?php

namespace App\Http\Controllers\Admin\Supplier;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use App\Http\Requests\Supplier\SupplierRequest;
use App\Http\Requests\Supplier\UpdateSupplierRequest;
use Illuminate\Http\RedirectResponse;
use App\Services\Supplier\SupplierServiceImplement;
use App\Models\Supplier;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
use Inertia\Response;

class SupplierController extends Controller
{
    //
    protected $supplierService;

    public function __construct(SupplierServiceImplement $supplierService) {
        $this->supplierService = $supplierService;
    }

    public function index()
{
    $suppliers = Supplier::paginate(5);
    return Inertia::render('Admin/Supplier/Index', [
        'suppliers' => $suppliers,
    ]);
}

    public function create(){
        return Inertia::render('Components/Forms/CreateSupplier');
    }

    public function store(SupplierRequest $request){
        $this->supplierService->createSupplier($request);
        return Redirect::route('supplier')->with('success', 'Supplier created.');
    }

    public function edit(Supplier $supplier): Response
    {
        return Inertia::render('Components/Forms/Edit/EditSupplier', [
            'supplier' => $supplier,
        ]);
    }

    public function update(UpdateSupplierRequest $request, Supplier $supplier): RedirectResponse
    {
        $supplier->update($request->validated());
        return Redirect::route('supplier')->with('success', 'Supplier created.');
    }

    public function destroy(Supplier $supplier): RedirectResponse
    {
        $supplier->delete();

        return Redirect::back()->with('success', 'Supplier berhasil dihapus.');
    }

}
