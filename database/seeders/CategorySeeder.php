<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::firstOrCreate(['name' => 'Electronics']);
        Category::firstOrCreate(['name' => 'Fashion']);
        Category::firstOrCreate(['name' => 'Home & Living']);
    }
}