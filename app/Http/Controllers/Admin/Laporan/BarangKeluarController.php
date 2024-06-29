<?php

namespace App\Http\Controllers\Admin\Laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BarangKeluarController extends Controller
{
    //
    public function index(){
        return Inertia::render('Admin/Laporan/BarangKeluar/Index');
    }
}
