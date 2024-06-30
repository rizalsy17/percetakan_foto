<?php

namespace App\Http\Controllers\Admin\Laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AlatPercetakanController extends Controller
{
    //
    public function index(){
        return Inertia::render('Admin/Laporan/AlatPercetakan/Index');
    }

    public function create(){
        return Inertia::render('Components/Forms/CreateAlatPercetakan');
    }
}
