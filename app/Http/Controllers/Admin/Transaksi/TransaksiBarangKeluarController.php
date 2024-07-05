<?php

namespace App\Http\Controllers\Admin\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Barang;
use App\Models\TransaksiBarangAtk;

class TransaksiBarangKeluarController extends Controller
{
    //
    public function index(){
        $barangs = Barang::pluck('nama_barang', 'id');
        return Inertia::render('Components/Forms/CreateBarangKeluar', [
            'barangs' => $barangs,
        ]);
    }

    public function store(Request $request)
{
    $request->validate([
        'kode_transaksi' => 'required|string|max:255',
        'tanggal_masuk' => 'required|date',
        'barang_id' => 'required|exists:barangs,id',
        'jumlah' => 'required|integer|min:1',
        // 'supplier_id' => 'required|exists:suppliers,id',
    ]);

    $barang = Barang::findOrFail($request->barang_id);

    if ($barang->stok < $request->jumlah) {
        return redirect()->back()->withErrors(['jumlah' => 'Stok tidak cukup.'])->withInput();
    }

    // Decrement the stock
    $barang->stok -= $request->jumlah;
    $barang->save();

    // Create the transaksi barang atk record
    TransaksiBarangAtk::create([
        'user_id' => auth()->id(),
        'type' => 'keluar',
        'kode_transaksi' => $request->kode_transaksi,
        'tanggal_masuk' => $request->tanggal_masuk,
        'barang_id' => $request->barang_id,
        'jumlah' => $request->jumlah,
        'supplier_id' => null,
    ]);

    return redirect()->route('barang')->with('success', 'Stok barang atk berhasil diperbarui.');
}


}
