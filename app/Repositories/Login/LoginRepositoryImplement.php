<?php
namespace App\Repositories\Login;
use App\Repositories\Login\LoginRepository;
use App\Models\User;
use App\Models\Owner;

class LoginRepositoryImplement implements LoginRepository
{
    public function findUserByEmail(string $email): ?User
    {
        return User::where('email', $email)->first();
    }

    public function findAdminByEmail(string $email): ?Owner
    {
        return Owner::where('email', $email)->first();
    }
}
?>