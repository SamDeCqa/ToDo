<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Samwel',
            'email' => 'samwel@example.com',
            'phone' => '0789765432',
            'password' => Hash::make('samwel'),
        ]);

        $this->call([
            UserSeeder::class,
            EventSeeder::class,
            MemoSeeder::class,
        ]);
    }
}
