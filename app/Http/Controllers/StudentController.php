<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    
    public function index()
    {
        $students = Student::all();
        return view('student.index',compact('students'));

    }

  
    public function create()
    {
        return view('student.create');
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required'
        ]);

        Student::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email
                 
        ]);

        return redirect()->route('students.index');

    }

   
    public function show(Student $student)
    {       
        return view('student.show',compact('student'));       
    }

   
    public function edit(Student $student)
    {        
        return view('student.edit',compact('student'));
    }

    
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required'
        ]);

        $student->update([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email
                 
        ]);

        return redirect()->route('students.index');
    }

   
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index');

    }
}
