<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Lesson;
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
    // Si no se pasó la lección en la URL, cargamos la primera publicada
    if (!$lesson) {
        $course->load([
            'sections' => function ($query) {
                $query->orderBy('position', 'asc')
                      ->with(['lessons' => function ($query) {
                          $query->where('is_published', true)
                                ->orderBy('position', 'asc');
                      }]);
            }
        ]);

        // Obtener la primera lección de todas las secciones
        $lesson = $course->sections->pluck('lessons')->collapse()->first();

        if (!$lesson) {
            // Si el curso no tiene lecciones publicadas, retornar vista con mensaje
            return view('courses.status', compact('course', 'lesson'));
        }

        // Redirigir a la URL con el curso y la lección encontrada
        return redirect()->route('courses.status', [$course, $lesson]);
    }

    // Registrar al usuario en la tabla pivot
    if (auth()->check()) {
        // Primero marcamos todas las lecciones de este curso como no actuales
        DB::table('course_lesson_user')
            ->where('user_id', auth()->id())
            ->where('course_id', $course->id)
            ->update(['current' => false]);

        // Insertamos o actualizamos la lección actual
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

    // Obtener usuarios que han tomado esta lección (opcional para mostrar en la vista)
    $users = $lesson->users()->get();

    // Retornar la vista con la información
    return view('courses.status', compact('course', 'lesson', 'users'));
}



    

    public function myCourses()
    {

        $courses = auth()->user()->courses_enrolled;
        // return $courses;
        return view('courses.my-courses', compact('courses'));
    }
}

