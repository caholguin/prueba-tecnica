<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        $title = 'Materias';
        return view('subject.index',compact('subjects','title'));

    }

  
    public function create()
    {
        $title = 'Crear materia';
        return view('subject.create',compact('title'));
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'           
        ]);

        Subject::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect()->route('subjects.index');

    }

   
    public function show(Subject $subject)
    {       
        $title = 'Ver materia';
        return view('subject.show',compact('subject','title'));       
    }

   
    public function edit(Subject $subject)
    {        
        $title = 'Editar materia';
        return view('subject.edit',compact('subject','title'));
    }

    
    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $subject->update([
            'name' => $request->name,
            'description' => $request->description
                 
        ]);

        return redirect()->route('subjects.index');
    }

   
    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect()->route('subjects.index');

    }
}
