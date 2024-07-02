<?php
namespace App\Services\Login;

use Illuminate\Http\Request;
use App\Http\Requests\Login\LoginRequest;
use App\Repositories\Login\LoginRepository;
use App\Services\Login\LoginService;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Log;


class LoginServiceImplement implements LoginService {

    protected $loginRepository;
    protected $request;

    public function __construct(LoginRepository $loginRepository, Request $request)
    {
        $this->loginRepository = $loginRepository;
        $this->request = $request;
    }

   public function login(LoginRequest $request)
{
    $data = $request->validated();

    // Attempt login as admin first
    $admin = $this->loginRepository->findAdminByEmail($data['email']);
    if ($admin && Auth::guard('owner')->attempt($data)) {
        $request->session()->regenerate();
        // $request->session()->put('guard', 'owner'); // Simpan guard ke dalam sesi
        return redirect()->route('dashboard');
    }

    // Attempt login as user
    $user = $this->loginRepository->findUserByEmail($data['email']);
    if ($user && Auth::guard('web')->attempt($data)) {
        $request->session()->regenerate();
        // $request->session()->put('guard', 'web'); // Simpan guard ke dalam sesi
        return redirect()->route('dashboard');
    }

    return back()->with('error', 'Email atau Kata Sandi salah!');
}

}

?>