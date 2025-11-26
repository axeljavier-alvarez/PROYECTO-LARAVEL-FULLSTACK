<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ClearVideosSeeder extends Seeder
{
    public function run(): void
    {
         $folders = [
            storage_path('app/public/courses/lessons'), // videos y thumbnails
            storage_path('app/public/livewire-tmp'),      // temporales Livewire
        ];


        foreach ($folders as $folder) {
            if (File::exists($folder)) {
                File::cleanDirectory($folder); // vacía la carpeta sin borrarla
                $this->command->info("Limpieza: Carpeta {$folder} vaciada.");
            }
        }
    }
}
