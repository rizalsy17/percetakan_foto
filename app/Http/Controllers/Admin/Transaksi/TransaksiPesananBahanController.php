<?php

namespace App\Http\Controllers\Admin\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TransaksiPesananBahanController extends Controller
{
    //
    public function index(){
        return Inertia::render('Components/Forms/CreatePesananBahan');
    }
}
