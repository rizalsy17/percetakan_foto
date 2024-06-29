<?php

namespace App\Http\Controllers\Admin\Barang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BarangController extends Controller
{
    //
    public function index(){
        return Inertia::render('Admin/Barang/Index');
    }

    public function create(){
        return Inertia::render('Components/Forms/CreateBarang');
    }

    // public function store(Request $request)
    // {
    //     // Validasi input jika diperlukan
    //     $validatedData = $request->validate([
    //         'kode_barang' => 'required|numeric',
    //         'nama_barang' => 'required|string',
    //         'id_supplier' => 'nullable|string',
    //         'harga_jual' => 'required|numeric',
    //         'harga_beli' => 'required|numeric',
    //         'stok' => 'required|numeric',
    //         'satuan' => 'required|string',
    //         'keterangan' => 'nullable|string',
    //     ]);

    //     // Simpan data baru ke dalam database
    //     $barang = Barang::create($validatedData);

    //     // Response atau redirect sesuai kebutuhan
    //     return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan.');
    // }
}
