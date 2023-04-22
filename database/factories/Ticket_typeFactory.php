<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket_type>
 */
class Ticket_typeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->randomElement(['Account', 'Security', 'Products and Services', 'Management']),
            'description' => fake()->paragraph(2),
            'sla_mins' => fake()->numberBetween($min=1, $max=60)
        ];
            
    }
}
