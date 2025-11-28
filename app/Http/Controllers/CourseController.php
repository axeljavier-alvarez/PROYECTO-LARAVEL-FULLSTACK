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
    public function status(Course $course, Lesson $lesson = null)
    {

        

        if(!$lesson)
        {
    
        }

        if(auth()->check()){
        DB::table('course_lesson_user')
        ->where('user_id', auth()->id())
        ->where('course_id', $course->id)
        ->update([
            'current' => false
        ]);

        // si existe actualiza sino utiliza toda la info para generar un registro
        DB::table('course_lesson_user')
        ->updateorInsert([
            'course_id' => $course->id,
            'lesson_id' => $lesson->id,
            'user_id'=> auth()->id()
            
        ], [
            'current' => true
        ]);

        }

        // return $lesson;
        return view('courses.status', compact('course', 'lesson'));
    }

    public function myCourses()
    {

        $courses = auth()->user()->courses_enrolled;
        // return $courses;
        return view('courses.my-courses', compact('courses'));
    }
}
