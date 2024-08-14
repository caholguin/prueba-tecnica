@extends('layouts.layout')

@section('title', 'Estudiantes')

@section('content')



    <div class="card container mt-4">
        <h1>{{ $title }}</h1>

        <form action="{{ route('courses.store') }}" method="POST" class="mb-4">
            @method('POST')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">

                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descripción</label>
                <input type="text" class="form-control" id="description" name="description"
                    value="{{ old('description') }}">
                @error('description')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="example-select2">Estudiantes:</label>
                <select class="form-control js-example-basic-multiple" name="students[]" multiple="multiple">
                    @foreach ($students as $student)
                        <option value="{{ $student->id }}">{{ $student->name }} {{ $student->last_name }}</option>
                    @endforeach
                </select>
            </div>

            <a class="btn btn-danger" href="{{ route('courses.index') }}">Cancelar</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
                theme: "classic"
            });
        });        
    </script>

@endsection
