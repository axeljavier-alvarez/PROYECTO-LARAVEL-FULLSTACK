<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

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

    public function status(Course $course, Lesson $lesson = null)
    {

        if(!$lesson)
        {
            // return $course;

            /*return*/ $course->load([
                'sections'=>function($query){
                    $query->orderBy('position', 'asc')
                    ->with('lessons', function($query){
                        $query->orderBy('position','asc')
                        ->where('is_published', true);
                    });
                }
            ]);

            $lesson = $course->sections->pluck('lessons')->collapse()->first();

            return redirect()->
            route('courses.status', [$course, $lesson]);
            // return $lesson;
        }

        return $lesson;
        // return view('courses.status', compact('course', 'lesson'));
    }

    public function myCourses()
    {

        $courses = auth()->user()->courses_enrolled;
        // return $courses;
        return view('courses.my-courses', compact('courses'));
    }
}
