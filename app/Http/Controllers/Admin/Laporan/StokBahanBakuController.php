<?php

namespace App\Http\Controllers\Admin\Laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StokBahanBakuController extends Controller
{
    //
    public function index(){
        return Inertia::render('Admin/Laporan/StokBahanBaku/Index');
    }
}
