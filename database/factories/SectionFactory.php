<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Section;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Section>
 */
class SectionFactory extends Factory
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
                $lastPosition = Section::where('course_id', $attributes['course_id'] ?? 0)->max('position');
                return $lastPosition ? $lastPosition + 1 : 1;
            },
        ];
    }
}

