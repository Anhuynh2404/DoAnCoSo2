<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Publisher>
 */
class PublisherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'address' =>$this->faker->address(),
            'phone' =>$this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'note' =>$this->faker->text(),
        ];
    }
}
