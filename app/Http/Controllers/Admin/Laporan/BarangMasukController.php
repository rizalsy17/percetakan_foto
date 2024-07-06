<?php

namespace App\Http\Controllers\Admin\Laporan;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\TransaksiBarangAtk;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TransaksiBarangMasukExport;

class BarangMasukController extends Controller
{
    //
    public function index(){
        $transaksis = TransaksiBarangAtk::query()->with('barang', 'supplier','user')->where('type','masuk')->latest()->paginate(5);
        return Inertia::render('Admin/Laporan/BarangMasuk/Index',[
            'transaksis' => $transaksis
        ]);
    }

    public function downloadpdf(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $transactions = TransaksiBarangAtk::with('barang', 'supplier','user')
            ->where('type','masuk')
            ->whereBetween('tanggal_masuk', [$startDate, $endDate])
            ->get();

        $pdf = Pdf::loadView('pdf.barangmasuk', compact('transactions', 'startDate', 'endDate'));

        return $pdf->download('laporan-transaksi.pdf');
    }

    public function downloadExcel(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        return Excel::download(new TransaksiBarangMasukExport($startDate, $endDate), 'laporan-transaksi.xlsx');
    }
}
