<?php

namespace Database\Seeders;

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
            'fullname' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'address' => 'Jl. Merdeka No. 123',
            'bod' => '1990-05-15',
            'role' => 'admin'
        ]);

        User::create([
            'fullname' => 'Regular User',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'address' => 'Jl. Mawar No. 45',
            'bod' => '1995-10-20',
            'role' => 'user'
        ]);

        User::factory(10)->create();
    }
}
