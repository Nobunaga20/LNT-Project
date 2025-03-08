<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        static $usedEmails = [];
        
        do {
            $email = $this->faker->unique()->safeEmail;
        } while (in_array($email, $usedEmails));
        
        $usedEmails[] = $email;
        
        return [
            'full_name' => $this->faker->name,
            'email' => $email,
            'password' => Hash::make('password'),
            'phone_number' => $this->faker->numerify('081#########'), 
            'role' => $this->faker->randomElement([0, 1]),
        ];
    }
}
