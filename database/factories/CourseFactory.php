<?php

namespace Database\Factories;

use App\Models\Level;
use App\Models\Category;
use App\Models\Price;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title'       => $this->faker->sentence,
            'slug'        => $this->faker->slug,
            'summary' => $this->faker->paragraph,
            'description' => $this->faker->text(2000),
            'status'      => 3,
            'image_path'  => 'courses/image/monitor.jpg', // ← Imagen fija
            'user_id'     => 1,
            'level_id'    => Level::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'price_id'    => Price::all()->random()->id,
        ];
    }
}
