<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    // use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
{
    if (!Storage::exists('courses/image')) {
        Storage::makeDirectory('courses/image');
    }

    User::factory()->create([
        'name' => 'Maria Gonzalez',
        'email' => 'maria@gmail.com',
        'password' => bcrypt('12345678')
    ]);

    $this->call([
        CategorySeeder::class,
        LevelSeeder::class,
        PriceSeeder::class,
        CourseSeeder::class,
        ClearVideosSeeder::class,

    ]);
}

}
