<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'role' => 'admin',
            'password' => bcrypt('admin')
        ]);

        User::create([
            'name' => 'Super Admin',
            'email' => 'super.admin@gmail.com',
            'username' => 'super.admin',
            'role' => 'super admin',
            'password' => bcrypt('superadmin')
        ]);

    }
}
