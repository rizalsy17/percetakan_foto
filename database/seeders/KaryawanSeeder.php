<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'name' => 'Mr Tejo',
            'username' => 'mbak jeni',
            'email' => 'jenny@example.com',
            'password' => bcrypt('password'), // Hashed password
        ]);

    }
}
