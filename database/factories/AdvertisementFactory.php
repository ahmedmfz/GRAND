<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Advertisement>
 */
class AdvertisementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(20),
            'description' => $this->faker->text(60),
            'category_id' => rand(1 , Category::count()),
            'advertiser_id' => rand(1 , User::count()),
            'start_date' => Carbon::now()->addDay(rand(1,5)),
            'type' => ['free','paid'][rand(0,1)]
        ];
    }
}
