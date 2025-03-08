<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;
use App\Models\Category;

class ItemSeeder extends Seeder
{
    public function run()
    {
        Item::create([
            'category_id' => 1,
            'name' => 'Smartphone',
            'price' => 5000000,
            'quantity' => 20,
            'image' => 'smartphone.jpg'
        ]);

        Item::create([
            'category_id' => 2,
            'name' => 'Programming Book',
            'price' => 150000,
            'quantity' => 50,
            'image' => 'book.jpg'
        ]);

        Item::create([
            'category_id' => 3,
            'name' => 'T-shirt',
            'price' => 100000,
            'quantity' => 100,
            'image' => 'tshirt.jpg'
        ]);

        Category::all()->each(function ($category) {
            Item::factory(5)->create(['category_id' => $category->id]);
        });
    }
}