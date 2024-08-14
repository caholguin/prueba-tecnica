@extends('layouts.layout')

@section('title', 'Estudiantes')

@section('content')    

    <div class="card container mt-4">
        <h1>{{ $title }}</h1>

        <form action="{{ route('grades.update',$grade) }}" method="POST" class="mb-4">
            @method('PUT')
            @csrf

            <div class="mb-3">
                <label for="student_id">Estudiante</label>
                <select class="form-control" name="student_id">
                    <option value="" selected disabled>Seleccione un estudiante</option>
                    @foreach ($students as $student)
                    <option value="{{ $student->id }}" @if ($student->id == $grade->student->id) selected @endif>{{ $student->name }} {{$student->last_name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="subject_id">Materia</label>
                <select class="form-control" name="subject_id">
                    <option value="" selected disabled>Seleccione una materia</option>
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}" @if ($subject->id == $grade->subject->id) selected @endif>{{ $subject->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="note" class="form-label">Nota</label>
                <input type="number" class="form-control" id="note" name="note" value="{{ old('note', $grade->note) }}">

                @error('note')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Fecha</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ old('date', $grade->date) }}">
                @error('date')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="observation" class="form-label">Observación</label>
                <input type="text" class="form-control" id="observation" name="observation" value="{{ old('observation', $grade->observation) }}">
                @error('observation')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <a class="btn btn-danger" href="{{ route('grades.index') }}">Cancelar</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
