<?php

namespace Database\Factories;

use App\Models\Goals;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Goals>
 */
class GoalsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Goals::class;
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph,
            'current_amount' => $this->faker->randomFloat(2, 0, 1000),
            'target_amount' => $this->faker->randomFloat(2, 100, 10000),
            'target_date' => $this->faker->date(),
            'category_id' => \App\Models\Category::factory(),
        ];
    }
}
