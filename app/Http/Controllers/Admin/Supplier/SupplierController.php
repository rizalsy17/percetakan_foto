<?php

namespace App\Http\Controllers\Admin\Supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SupplierController extends Controller
{
    //
    public function index(){
        return Inertia::render('Admin/Supplier/Index');
    }

    public function create(){
        return Inertia::render('Components/Forms/CreateSupplier');
    }

}
