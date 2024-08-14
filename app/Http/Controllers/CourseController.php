<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        $title = 'Cursos';
        return view('course.index',compact('courses','title'));
    }
  
    public function create()
    {
        $students = Student::select('id', 'name','last_name')->get();
        $title = 'Crear curso';        
        return view('course.create',compact('title','students'));
    }
   
    public function store(Request $request)
    {       
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'students' => 'array',
            'students.*' => 'exists:students,id'
        ]);


        $course=Course::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        if ($request->has('students')) {
            $course->students()->attach($request->students);
        }

        return redirect()->route('courses.index');
    }
   
    public function show(Course $course)
    {       
        $students = Student::select('id', 'name','last_name')->get();  
        $title = 'Ver curso';
        return view('course.show',compact('course','title','students'));       
    }
   
    public function edit(Course $course)
    {   
        $students = Student::select('id', 'name','last_name')->get();     
        $title = 'Editar curso';
        return view('course.edit',compact('course','students','title'));
    }
    
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'students' => 'array',
            'students.*' => 'exists:students,id'
        ]);

        $course->update([
            'name' => $request->name,
            'description' => $request->description
                 
        ]);

        if ($request->has('students')) {
            $course->students()->sync($request->students);
        }

        return redirect()->route('courses.index');
    }
   
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index');
    }
}
