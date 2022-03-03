<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class FileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'uuid' => Str::orderedUuid(),
            'name' => $this->faker->name,
            'path' => $this->faker->imageUrl(),
            'size' => $this->faker->randomNumber(1, 100),
            'type' => 'png',
        ];
    }
}
