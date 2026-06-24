<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tours')->insert([
            [
                'title' => 'City Highlights Tour',
                'description' => "A guided tour of the city's main attractions.",
                'price' => 49.99,
                'date' => '2026-07-01',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Historical Walk',
                'description' => 'Explore the historic districts with a local guide.',
                'price' => 29.50,
                'date' => '2026-07-10',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Night Food Tour',
                'description' => 'Taste local cuisine during an evening food crawl.',
                'price' => 59.00,
                'date' => '2026-07-15',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
