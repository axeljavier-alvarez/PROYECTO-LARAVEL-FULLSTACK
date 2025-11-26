<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Goal;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Goal>
 */
class GoalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence,
            'position' => function(array $attributes) {
                if (!isset($attributes['course_id'])) {
                    return 1;
                }
                $lastPosition = Goal::where('course_id', $attributes['course_id'])->max('position');
                return $lastPosition ? $lastPosition + 1 : 1;
            }
        ];
    }
}

