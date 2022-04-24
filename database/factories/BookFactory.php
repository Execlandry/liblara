<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'acc_no' => $this->faker->randomNumber(2),
            'title' => $this->faker->name,
            'edition' => (string)$this->faker->century,
            'year' => (string)$this->faker->year,
            'pages' => (string)$this->faker->buildingNumber,
            'source' => (string)$this->faker->address,
            'bill_no' => (string)$this->faker->randomNumber(3),
            'bill_date' => (string)$this->faker->date,
            'cost' => (string)$this->faker->randomNumber(4),
            'call_no' => (string)$this->faker->postcode,

        ];
    }
}
