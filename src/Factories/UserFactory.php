<?php

namespace PwaBlui\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use PwaBlui\Models\User;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    public function modelName()
    {
        return User::class;
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username' => fake()->name(),
            'email' => fake()->email(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ];
    }
}
