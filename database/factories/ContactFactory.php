<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => user::all()->random()->id,
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'blocked' => $this->faker->boolean,
            'email' => $this->faker->unique()->safeEmail(),
            'address' => $this->faker->address,
        ];
    }
}
