<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function index()
    {
        return view('courses.index');
    }

    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    // solo cuando este autenticado actualiza
    // public function status(Course $course, Lesson $lesson = null)
    // {



    //     if(!$lesson)
    //     {

    //     }
    //    return $lesson->users()->get();

    //     if(auth()->check()){
    //     DB::table('course_lesson_user')
    //     ->where('user_id', auth()->id())
    //     ->where('course_id', $course->id)
    //     ->update([
    //         'current' => false
    //     ]);

    //     DB::table('course_lesson_user')
    //     ->updateorInsert([
    //         'course_id' => $course->id,
    //         'lesson_id' => $lesson->id,
    //         'user_id'=> auth()->id()

    //     ], [
    //         'current' => true
    //     ]);

    //     }

    //     return view('courses.status', compact('course', 'lesson'));
    // }



    // RETOMANDO EL RETURN $LESSON

//     public function status(Course $course, Lesson $lesson = null)
// {
//     // Si no se pasó la lección en la URL, cargamos la primera publicada
//     if (!$lesson) {
//         $course->load([
//             'sections' => function ($query) {
//                 $query->orderBy('position', 'asc')
//                       ->with(['lessons' => function ($query) {
//                           $query->where('is_published', true)
//                                 ->orderBy('position', 'asc');
//                       }]);
//             }
//         ]);

//         $lesson = $course->sections->pluck('lessons')->collapse()->first();

//         if (!$lesson) {
//             return null; // No hay lecciones
//         }

//         return redirect()->route('courses.status', [$course, $lesson]);
//     }

//     // Registrar al usuario en la tabla pivot
//     if (auth()->check()) {
//         DB::table('course_lesson_user')
//             ->where('user_id', auth()->id())
//             ->where('course_id', $course->id)
//             ->update(['current' => false]);

//         DB::table('course_lesson_user')
//             ->updateOrInsert(
//                 [
//                     'course_id' => $course->id,
//                     'lesson_id' => $lesson->id,
//                     'user_id' => auth()->id(),
//                 ],
//                 ['current' => true]
//             );
//     }

//     // Temporal: mostrar los usuarios que ya están registrados en la lección
//     return $lesson->users()->get(); // <-- aquí ves el array completo

//     // Luego de comprobarlo, reemplaza el return anterior por:
//     // return view('courses.status', compact('course', 'lesson'));
// }



    public function status(Course $course, Lesson $lesson = null)
{
    // Cargar todas las secciones con sus lecciones publicadas
    $sections = Section::where('course_id', $course->id)
        ->with(['lessons' => function($query) {
            $query->where('is_published', true)
                  ->orderBy('position', 'asc');
        }])
        ->orderBy('position', 'asc')
        ->get();

    // Obtener todas las lecciones publicadas del curso
    $lessons = $sections->pluck('lessons')->collapse();


// return $lessons->pluck('id'); // Retorna todos los IDs de las lecciones publicadas
    // Si no se pasó una lección, usar la primera publicada
    if (!$lesson) {
        $lesson = $lessons->first();
        if (!$lesson) {
            // No hay lecciones publicadas, retornar vista con mensaje
            return view('courses.status', compact('course', 'sections', 'lessons', 'lesson'));
        }

        // Redirigir a la ruta con la lección encontrada
        return redirect()->route('courses.status', [$course, $lesson]);
    }

    // Registrar al usuario en la tabla pivot (solo si está autenticado)
    if (auth()->check()) {
        // Marcar todas las lecciones del curso como no actuales
        DB::table('course_lesson_user')
            ->where('user_id', auth()->id())
            ->where('course_id', $course->id)
            ->update(['current' => false]);

        // Insertar o actualizar la lección actual
        DB::table('course_lesson_user')
            ->updateOrInsert(
                [
                    'course_id' => $course->id,
                    'lesson_id' => $lesson->id,
                    'user_id' => auth()->id(),
                ],
                ['current' => true]
            );
    }

    // Obtener los usuarios que han tomado esta lección (opcional)
    $users = $lesson->users()->get();

    // Retornar la vista con todos los datos necesarios
    return view('courses.status', compact('course', 'sections', 'lessons', 'lesson', 'users'));
}






    public function myCourses()
    {

        $courses = auth()->user()->courses_enrolled;
        // return $courses;
        return view('courses.my-courses', compact('courses'));
    }
}

