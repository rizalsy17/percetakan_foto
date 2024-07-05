<?php

namespace App\Http\Controllers\Admin\Laporan;

use App\Http\Controllers\Controller;
use App\Http\Requests\Laporan\AlatPercetakanRequest;
use App\Http\Requests\Laporan\UpdateAlatPercetakanRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Models\AlatPercetakan;
use App\Models\Supplier;
use Inertia\Response;
use Inertia\Inertia;

class AlatPercetakanController extends Controller
{
    //
    public function index(){
        $alatpercetakans  = AlatPercetakan::paginate(5);
        return Inertia::render('Admin/Laporan/AlatPercetakan/Index', [
            'alatpercetakans' => $alatpercetakans, 
        ]);
    }

    public function create(){
        $suppliers = Supplier::all();
        return Inertia::render('Components/Forms/CreateAlatPercetakan', [
            'suppliers' => $suppliers,
         ]);
    }

    public function store(AlatPercetakanRequest $request, AlatPercetakan $alat): RedirectResponse
    {
        $alat->create($request->validated());
        return Redirect::route('alatpercetakan')->with('success', 'Alat percetakan created.');
    }

    public function edit(AlatPercetakan $alat): Response
{
    $suppliers = Supplier::all();
    return Inertia::render('Components/Forms/Edit/EditAlatPercetakan', [
        'alat' => $alat,
        'suppliers' => $suppliers,
    ]);
}

    public function update(UpdateAlatPercetakanRequest $request, AlatPercetakan $alat): RedirectResponse
    {
        $alat->update($request->validated());
        return Redirect::route('alatpercetakan')->with('success', 'Alat Percetakan success updated.');
    }

    public function destroy(AlatPercetakan $alat): RedirectResponse
    {
        $alat->delete();

        return Redirect::back()->with('success', 'Alat berhasil dihapus.');
    }

}
