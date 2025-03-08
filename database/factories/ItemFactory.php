<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Item;
use App\Models\Category;

class ItemFactory extends Factory
{
    protected $model = Item::class;

    public function definition()
    {
        return [
            'category_id' => Category::factory(),
            'name' => $this->faker->unique()->word,
            'price' => $this->faker->numberBetween(1000, 50000),
            'quantity' => $this->faker->numberBetween(1, 100),
            'image' => $this->faker->imageUrl(),
        ];
    }
}