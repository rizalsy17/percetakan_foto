<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Login\LoginRequest;
use App\Services\Login\LoginService;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    protected $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    public function index(){
        return Inertia::render('Auth/Login');
    }

    public function login(LoginRequest $request)
    {
        return $this->loginService->login($request);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        Auth::guard('owner')->logout();
    
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect()->route('login');
    }

}
