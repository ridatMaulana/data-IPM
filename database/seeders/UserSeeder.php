<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            [
                'name' => 'Admin',
                'email' => "Admin@Admin.com",
                'password' => Hash::make('Admin123')
            ],
            [
                'name' => 'Super Admin',
                'email' => "Super@Admin.com",
                'password' => Hash::make('SuperKey1209')
            ]
        ]);
    }
}
