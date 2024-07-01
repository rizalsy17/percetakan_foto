<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Owner;
use Illuminate\Support\Facades\Hash;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Owner::create([
            'name' => 'Mr Tejo',
            'email' => 'tejo@example.com',
            'password' => bcrypt('password'), // Hashed password
        ]);

    }
}
