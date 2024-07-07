<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        Admin::create([
            'name' => 'Admin Prame',
            'email' => 'sunisa@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('password'),
        ]);
    }
}
