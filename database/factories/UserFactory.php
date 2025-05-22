<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() : array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'phone' => fake()->randomNumber(),
            'role' => 'user',
            'institution_name' => fake()->name(),
            'legality_no' => fake()->randomNumber(),
            'institution_type' => fake()->randomElement(['laz', 'ngo']),
            'core_program' => fake()->sentence(),
            'employee_qty' => fake()->randomDigitNotZero()
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified() : static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
