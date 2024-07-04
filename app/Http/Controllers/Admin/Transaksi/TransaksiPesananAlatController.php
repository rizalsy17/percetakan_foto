<?php

namespace App\Http\Controllers\Admin\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Supplier;
use App\Models\AlatPercetakan;
use App\Models\TransaksiPercetakan;

class TransaksiPesananAlatController extends Controller
{
    //
    public function index(){
        $suppliers = Supplier::pluck('nama_supplier', 'id');
        $alatpercetakans = AlatPercetakan::pluck('nama_alat', 'id');
        // Pass the suppliers data to the Inertia view
        return Inertia::render('Components/Forms/CreatePesananAlat', [
            'suppliers' => $suppliers,
            'alatpercetakans' => $alatpercetakans,
        ]);
    }


    public function store(Request $request)
{
    $request->validate([
        'kode_transaksi' => 'required|string|max:255',
        'tanggal_masuk' => 'required|date',
        'alat_id' => 'required|exists:alat_percetakans,id',
        'jumlah' => 'required|integer|min:1',
        'supplier_id' => 'required|exists:suppliers,id',
    ]);

    $alat = AlatPercetakan::findOrFail($request->alat_id);

    // Update the stok
    $alat->stok += $request->jumlah;
    $alat->save();

    TransaksiPercetakan::create([
        'user_id' => auth()->id(), 
        'type' => 'pesan_alat',
        'kode_transaksi' => $request->kode_transaksi,
        'tanggal_masuk' => $request->tanggal_masuk,
        'alat_id' => $request->alat_id,
        'jumlah' => $request->jumlah,
        'supplier_id' => $request->supplier_id,
    ]);

    return redirect()->route('alatpercetakan')->with('success', 'Stok alat percetakan berhasil diperbarui.');
}


}
