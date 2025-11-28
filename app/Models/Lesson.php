<?php

namespace App\Models;

use App\Observers\LessonObserver;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;


#[ObservedBy([LessonObserver::class])]

class Lesson extends Model
{

    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'platform',
        'video_path',
        'video_original_name',
        'image_path',
        'description',
        'duration',
        'position',
        'is_published',
        'is_preview',
        'is_processed',
        'section_id'
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'is_preview' => 'boolean',
        'is_processed' => 'boolean'
    ];

// metodo de ruta para el slog
    public function getRouteKeyName():string
{
    return 'slug';
}



    public function image(): Attribute
{
    return new Attribute(
        get: function () {

            // Si no hay imagen aún → placeholder seguro
            if (!$this->image_path) {
                return asset('images/default-thumbnail.jpg');
            }

            // PLATFORM = 1 → video local
            if ($this->platform == 1) {
                return Storage::url($this->image_path);
            }

            // PLATFORM = 2 → YouTube
            return $this->image_path;
        }
    );
}


    // Relacion uno a muchos inversa



    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    // relacion muchos a muchos
   /*  public function users()
    {
        return $this->belongsToMany(User::class, 'course_lesson_user');
    } */

}
