<?php

namespace Database\Factories;

use App\Models\Reader;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reader>
 */
class ReaderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'cccd' => $this->faker->numberBetween(100000000000, 999999999999),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'faculty' => $this->faker->word,
            'major' => $this->faker->word,
            'class' => $this->faker->word,
            'note' => $this->faker->text,
        ];
    }
}
