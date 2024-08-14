@extends('layouts.layout')

@section('title', 'Estudiantes')

@section('content')    

    <div class="card container mt-4">
        <h1>Editar estudiante</h1>

        <form action="{{ route('students.update',$student) }}" method="POST" class="mb-4">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name',$student->name) }}">

                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="last_name" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name',$student->last_name) }}">
                @error('last_name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Correo</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email',$student->email) }}">
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <a class="btn btn-danger" href="{{ route('students.index') }}">Cancelar</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
@endsection
