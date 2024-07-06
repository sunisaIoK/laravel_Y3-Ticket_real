<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::table('categories')->insert([
            [
                'name' => 'คอนเสิร์ตที่ขายอยู่',
                'slug' => 'current-sale',
                'status' => true,
                'type' => 'current_sale',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'คอนเสิร์ตใหญ่เร็วๆ นี้',
                'slug' => 'upcoming-concert',
                'status' => true,
                'type' => 'upcoming_concert',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'เทศกาลดนตรีเร็วๆ นี้',
                'slug' => 'upcoming-festival',
                'status' => true,
                'type' => 'upcoming_festival',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
