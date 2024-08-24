<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'Wicak',
            'email' => 'wicak@wicak.id',
            'password' => '$2a$12$XtpJkz9w0ePTuf/zWC79y.58BOWtEYZlmPCOmjdNirv7WmVadKzbK',
        ]);
    }
}
