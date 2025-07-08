<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Arya Ddinata',
            'email' => 'arya@example.com',
            'google_id' => 'google-001'
        ]);
    }
}
