<?php

namespace App\Http\Controllers\Owner\Karyawan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class KaryawanController extends Controller
{
    //
    public function index(){
        return Inertia::render('Owner/Karyawan/Index');
    }

    public function create(){
        return Inertia::render('Components/Forms/CreateKaryawan');
    }
}
