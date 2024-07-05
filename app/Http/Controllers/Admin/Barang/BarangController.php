<?php

namespace App\Http\Controllers\Admin\Barang;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use App\Http\Requests\Barang\BarangRequest;
use App\Http\Requests\Barang\UpdateBarangRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use App\Models\Barang;
use App\Models\Supplier;
use Inertia\Response;


class BarangController extends Controller
{
    //
    public function index(){
        $barangs  = Barang::paginate(5);
        return Inertia::render('Admin/Barang/Index', [
            'barangs' => $barangs, 
        ]);
    }
 
    public function create()
    {
        $suppliers = Supplier::all(); // Fetch all suppliers
        return Inertia::render('Components/Forms/CreateBarang', [
           'suppliers' => $suppliers,
        ]);
    }


    public function store(BarangRequest $request, Barang $barang)
    {
        // Merge the 'stok' value into the validated data
        $data = array_merge($request->validated(), ['stok' => 0]);
    
        // Create the new Barang with the modified data
        $barang->create($data);
    
        return Redirect::route('barang')->with('success', 'Barang created.');
    }
    

    public function edit(Barang $barang): Response
{
    $suppliers = Supplier::all();
    return Inertia::render('Components/Forms/Edit/EditBarang', [
        'barang' => $barang,
        'suppliers' => $suppliers,
    ]);
}

    public function update(UpdateBarangRequest $request, Barang $barang): RedirectResponse
    {
        $barang->update($request->validated());
        return Redirect::route('barang')->with('success', 'Barang created.');
    }

    public function destroy(Barang $barang): RedirectResponse
    {
        $barang->delete();

        return Redirect::back()->with('success', 'Barang berhasil dihapus.');
    }

}
