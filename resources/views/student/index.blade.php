@extends('layouts.layout')

@section('title', 'Estudiantes')

@section('content')
    <div class="card container mt-4 d-flex flex-column">
        <h1>Estudiantes</h1>
        <div class="d-flex justify-content-end">
            <a class="btn btn-success" href="{{ route('students.create') }}">Agregar</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th colspan="3"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->last_name }}</td>
                        <td>{{ $student->email }}</td>
                        <td width="10px">
                            <a class="btn btn-secondary btn-sm" href="{{ route('students.show', $student) }}">Ver</a>
                        </td>
                        <td width="10px">
                            <a class="btn btn-primary btn-sm" href="{{ route('students.edit', $student) }}">Editar</a>
                        </td>
                        <td width="10px">
                            <form action="{{ route('students.destroy', $student) }}" method="POST">
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
