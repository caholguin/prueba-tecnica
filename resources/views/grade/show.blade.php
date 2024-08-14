@extends('layouts.layout')

@section('title', 'Estudiantes')

@section('content')    

    <div class="card container mt-4">
        <h1>{{ $title }}</h1>

        <form action="{{ route('grades.store') }}" method="POST" class="mb-4">
            @method('PUT')
            @csrf

            <div class="mb-3">
                <label for="student_id">Estudiante</label>
                <select class="form-control" name="student_id" disabled>
                    <option value="" selected disabled>Seleccione un estudiante</option>
                    @foreach ($students as $student)
                    <option value="{{ $student->id }}" @if ($student->id == $grade->student->id) selected @endif>{{ $student->name }} {{$student->last_name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="subject_id">Materia</label>
                <select class="form-control" name="subject_id" disabled>
                    <option value="" selected disabled>Seleccione una materia</option>
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}" @if ($subject->id == $grade->subject->id) selected @endif>{{ $subject->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="note" class="form-label">Nota</label>
                <input type="number" class="form-control" id="note" name="note" value="{{ old('note', $grade->note) }}" disabled>

                @error('note')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Fecha</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ old('date', $grade->date) }}" disabled>
                @error('date')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="observation" class="form-label">Observación</label>
                <input type="text" class="form-control" id="observation" name="observation" value="{{ old('observation', $grade->observation) }}" disabled>
                @error('observation')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <a class="btn btn-danger" href="{{ route('grades.index') }}">Volver</a>
        </form>
    </div>
@endsection
