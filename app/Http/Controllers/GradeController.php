<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index()
    {
        $grades = Grade::all();
        $title = 'Notas';
        return view('grade.index',compact('grades','title'));
    }

  
    public function create()
    {
        $students = Student::select('id','name','last_name')->get();
        $subjects = Subject::select('id','name','name')->get();
        $title = 'Crear nota';
        return view('grade.create',compact('title','students','subjects'));
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'subject_id' => 'required',
            'note' => 'required',
            'date' => 'required',
            'observation' => 'required'                  
        ]);

        Grade::create([

            'student_id' => $request->student_id,
            'subject_id' => $request->subject_id,
            'note' => $request->note,
            'date' => $request->date,
            'observation' => $request->observation           
        ]);

        return redirect()->route('grades.index');

    }

   
    public function show(Grade $grade)
    {       
        $students = Student::select('id','name','last_name')->get();
        $subjects = Subject::select('id','name')->get();
        $title = 'Ver Nota';        
        return view('grade.show',compact('grade','title','students','subjects'));       
    }

   
    public function edit(Grade $grade)
    {        
        $students = Student::select('id','name','last_name')->get();
        $subjects = Subject::select('id','name')->get();
        $title = 'Editar nota';
        return view('grade.edit',compact('grade','title','students','subjects'));
    }

    
    public function update(Request $request, Grade $grade)
    {
        $request->validate([
            'student_id' => 'required',
            'subject_id' => 'required',
            'note' => 'required',
            'date' => 'required',
            'observation' => 'required'                  
        ]);

        $grade->update([

            'student_id' => $request->student_id,
            'subject_id' => $request->subject_id,
            'note' => $request->note,
            'date' => $request->date,
            'observation' => $request->observation           
        ]);

        return redirect()->route('grades.index');
    }

   
    public function destroy(Grade $grade)
    {
        $grade->delete();

        return redirect()->route('grades.index');

    }
}
