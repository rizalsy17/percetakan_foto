<?php

namespace App\Http\Controllers\Admin\Laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BarangMasukController extends Controller
{
    //
    public function index(){
        return Inertia::render('Admin/Laporan/BarangMasuk/Index');
    }
}
