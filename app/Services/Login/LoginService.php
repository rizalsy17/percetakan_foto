<?php
namespace App\Services\Login;
use App\Http\Requests\Login\LoginRequest;

interface LoginService {
    public function login(LoginRequest $request);

}

?>