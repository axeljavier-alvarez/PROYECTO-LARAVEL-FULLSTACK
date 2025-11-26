<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Requirement>
 */
class RequirementFactory extends Factory
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
            $lastPosition = \App\Models\Requirement::where('course_id', $attributes['course_id'])->max('position');
            return $lastPosition ? $lastPosition + 1 : 1;
        },
    ];
}

}
