<?php

namespace Database\Seeders;

use App\Models\BiayaAdmin;
use Illuminate\Database\Seeder;

class BiayaAdminSeeder extends Seeder
{
    public function run(): void
    {
        BiayaAdmin::insert([
            ['nominal' => 1500],
            ['nominal' => 2500],
        ]);
    }
}
