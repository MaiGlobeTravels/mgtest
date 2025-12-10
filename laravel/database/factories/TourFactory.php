<?php

namespace Database\Factories;

use App\Models\Tour;
use Illuminate\Database\Eloquent\Factories\Factory;

class TourFactory extends Factory
{
    protected $model = Tour::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),     
            'description' => $this->faker->paragraph(),  
            'price' => $this->faker->numberBetween(50, 100), 
            'date' => $this->faker->date('Y-m-d', '+1 year'), 
        ];
    }
}
