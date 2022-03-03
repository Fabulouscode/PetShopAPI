<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $categorySample = $this->faker->words(3, true);
        
        return [
            'uuid' => Str::orderedUuid(),
            'title' => $categorySample,
            'slug' => Str::slug($categorySample),

        ];
    }
}
