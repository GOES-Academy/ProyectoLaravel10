<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->firstNameMale(),
            'apellido' => fake()->lastName(),
            'fecha_nacimiento' => fake()->date(),
            'genero' => fake()->randomElement(['M', 'F']),
            'username' => fake()->unique()->userName(),
            'email' => fake()->unique()->safeEmail(),
            'dui'   => fake()->unique()->numerify('########-#'),
            'direccion' => fake()->unique()->address(),
            'celular' => fake()->phoneNumber(),
            'role' => 'user',
            'activo' => 1,
            'password' => fake()->password(), // password
            'token_verified_email' => Str::random(10),
        ];
    }
}
