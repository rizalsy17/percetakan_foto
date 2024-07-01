<?php
namespace App\Repositories\Login;
use App\Models\User;
use App\Models\Owner;

interface LoginRepository
{
    public function findUserByEmail(string $email): ?User;
    public function findAdminByEmail(string $email): ?Owner;
}
