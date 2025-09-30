<?php

namespace Database\Factories;

use Faker\Provider\bg_BG\PhoneNumber;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $firstName = $this->faker->firstName;
        $lastName = $this->faker->lastName;
        $contact = $this->faker->phoneNumber();
        return [
            'first_name' => substr($firstName, 0, 30),
            'last_name' => substr($lastName, 0, 30),
            'contact' => substr($contact, 0, 15),
            'address' => fake()->address(),
        ];
    }
}
