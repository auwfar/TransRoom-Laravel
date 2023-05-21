<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // Create User
        User::create([
            'username' => 'user',
            'password' => bcrypt('user123'),
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'is_admin' => false,
        ]);

        // Create Admin
        User::create([
            'username' => 'admin',
            'password' => bcrypt('admin123'),
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'is_admin' => true,
        ]);
    }
}
