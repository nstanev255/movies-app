<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin
        User::create([
            'name'              => 'Demo Admin',
            'email'             => 'admin@admin.com',
            'password'          => bcrypt('admin123'),
            'email_verified_at' => now(),
        ]);
    }
}
