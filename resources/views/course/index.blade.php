@extends('layouts.layout')

@section('title', 'Estudiantes')

@section('content')
    <div class="card container mt-4 d-flex flex-column">
        <h1>{{ $title }}</h1>
        <div class="d-flex justify-content-end">
            <a class="btn btn-success" href="{{ route('courses.create') }}">Agregar</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th colspan="3"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                    <tr>
                        <td>{{ $course->name }}</td>
                        <td>{{ $course->description }}</td>
                        <td width="10px">
                            <a class="btn btn-secondary btn-sm" href="{{ route('courses.show', $course) }}">Ver</a>
                        </td>
                        <td width="10px">
                            <a class="btn btn-primary btn-sm" href="{{ route('courses.edit', $course) }}">Editar</a>
                        </td>
                        <td width="10px">
                            <form action="{{ route('courses.destroy', $course) }}" method="POST">
                                @csrf
                                @method('delete')

                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
@endsection
