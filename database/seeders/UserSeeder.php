<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'full_name' => 'Admin User',
                'password' => Hash::make('admin'),
                'phone_number' => '081234567890',
                'role' => 1,
            ]
        );

        User::firstOrCreate(
            ['email' => 'nicho@gmail.com'],
            [
                'full_name' => 'nicho',
                'password' => Hash::make('nicho'),
                'phone_number' => '081298264432',
                'role' => 0, 
            ]
        );

        User::factory(5)->create();
    }
}
