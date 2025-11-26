<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Lesson;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->sentence;

        return [
            'section_id' => null, // importante para luego asignarlo con forSection()
            'name' => $name,
            'slug' => Str::slug($name),

            'platform' => 2,
            'video_path' => 'bxioeJyk0QY',
            'video_original_name' => 'https://youtu.be/bxioeJyk0QY?si=pcbTpStwy3Nqxx9W',
            'image_path' => 'https://img.youtube.com/vi/bxioeJyk0QY/0.jpg',

            'description' => $this->faker->paragraph,
            'duration' => 900,
            'is_published' => true,
            'is_processed' => true,

            'position' => function (array $attributes) {
                // section_id debe venir desde el seeder
                $sectionId = $attributes['section_id'] ?? null;

                if (!$sectionId) {
                    // si no hay section_id, posición 1 por defecto
                    return 1;
                }

                $lastPosition = Lesson::where('section_id', $sectionId)->max('position');

                return $lastPosition ? $lastPosition + 1 : 1;
            },
        ];
    }

    /**
     * Asignar sección explícitamente
     */
    public function forSection($sectionId)
    {
        return $this->state([
            'section_id' => $sectionId,
        ]);
    }
}
