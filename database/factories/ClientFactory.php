<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'gender'  => $gender = $this->faker->randomElement(['male', 'female']),
        'name'    => $name = $this->faker->name($gender),
        'email'   => strtolower(str_replace(' ', '', $name)) . '@gmail.com',
        'number'   =>$this->faker->numerify('##########'),
        'address' => $this->faker->address(),
        ];
    }
}
