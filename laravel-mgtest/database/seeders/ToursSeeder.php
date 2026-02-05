<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ToursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tours = [
            [
                'title' => 'Tour of Jaffna',
                'description' => 'Explore the vibrant culture of Sri Lanka’s northern peninsula: visit the historic Jaffna Fort, Nallur Kandaswamy Kovil, bustling local markets and serene Casuarina Beach. Enjoy traditional Jaffna cuisine, coastal scenery and optional boat trips to nearby islands like Delft.',
                'price' => 10200.00,
                'date' => '2026-01-20',
            ],
            [
                'title' => 'Tour of Kandy',
                'description' => 'Discover the hill capital set among misty tea estates: tour the sacred Temple of the Tooth, stroll the Royal Botanical Gardens at Peradeniya and attend a cultural dance performance. Perfect for scenic views, tea tasting and exploring colonial-era streets and local craft shops.',
                'price' => 15300.00,
                'date' => '2026-02-01',
            ],
            [
                'title' => 'Tour of Unawatuna',
                'description' => 'Relax on Unawatuna’s golden bay with swimming, snorkeling and coral reef exploration; visit nearby Galle Fort for history and seaside cafés. Includes opportunities to see turtle hatcheries, enjoy fresh seafood and unwind on a picturesque southern coastline.',
                'price' => 20600.00,
                'date' => '2026-03-01',
            ],
        ];
    }
}
