<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OrderStatusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $status = $this->faker->randomElement(['open', 'pending_payment', 'paid', 'shipped', 'cancelled']);
        
        return [
            'uuid' => Str::orderedUuid(),
            'title' => $status,
        ];
    }
}
