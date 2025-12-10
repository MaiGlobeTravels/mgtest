<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Tour::factory(10)->create();
            // Tour::create([
            //         'title' => 'Test User',
            //         'description' => 'adfa afadfaf afa a',
            //         'price' => 10,
            //         'date' => 2002/01/01,
            //     ]);

                 DB::table('tours')->insert([
                    'title' => 'Test User',
                    'description' => 'adfa afadfaf afa a',
                    'price' => 10,
                    'date' => 2002/01/01,
        ]);
    }
}
