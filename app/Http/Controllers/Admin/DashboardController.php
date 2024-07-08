<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Barang;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\AlatPercetakan;
use App\Models\TransaksiBarangAtk;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //
    public function index(){
        $masuk = TransaksiBarangAtk::where('type', 'masuk')->count();
        $keluar = TransaksiBarangAtk::where('type', 'keluar')->count();
        $barang_s = Barang::pluck('nama_barang')->toArray();
        $stok_barang = Barang::pluck('stok')->toArray();
        // dd($stok_barang);
       

        $total_masuk_per_bulan = TransaksiBarangAtk::selectRaw('MONTH(tanggal_masuk) as bulan, SUM(jumlah) as total')
            ->where('type', 'masuk')
            ->groupByRaw('MONTH(tanggal_masuk)')
            ->get();

            // Menghitung total barang keluar per bulan
        $total_keluar_per_bulan = TransaksiBarangAtk::selectRaw('MONTH(tanggal_masuk) as bulan, SUM(jumlah) as total')
            ->where('type', 'keluar')
            ->groupByRaw('MONTH(tanggal_masuk)')
            ->get();

        return Inertia::render('Admin/Dashboard',[
            'barang' => Barang::count(),
            'supplier' => Supplier::count(),
            'percetakan' => AlatPercetakan::count(),
            'masuk' => $masuk,
            'keluar' => $keluar,
            'barang_s' => $barang_s,
            'stok_barang' => $stok_barang,
            'total_masuk_per_bulan' => $total_masuk_per_bulan,
            'total_keluar_per_bulan' => $total_keluar_per_bulan,
        ]);
    }

    public function updateprofile()
    {
        return Inertia::render('Components/Forms/UpdateProfile');
    }
}
