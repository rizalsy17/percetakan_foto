<?php

namespace App\Http\Controllers\Owner\Karyawan;

use App\Http\Controllers\Controller;
use App\Http\Requests\Karyawan\KaryawanRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Inertia\Response;
use App\Models\User;

class KaryawanController extends Controller
{
    //
    public function index(){
        $karyawanList  = User::paginate(5);
        return Inertia::render('Owner/Karyawan/Index', [
            'karyawanList' => $karyawanList, // Mengirimkan data karyawan ke view
        ]);
    }

    public function create(){
        return Inertia::render('Components/Forms/CreateKaryawan');
    }
    
    public function store(KaryawanRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return Redirect::route('karyawan')->with('success', 'Karyawan created.');
    }

    public function destroy(User $karyawan): RedirectResponse
    {
        $karyawan->delete();

        return Redirect::back()->with('success', 'Karyawan berhasil dihapus.');
    }
}
