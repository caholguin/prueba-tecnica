@extends('layouts.layout')

@section('title', 'Estudiantes')

@section('content')
    <div class="card container mt-4 d-flex flex-column">
        <h1>{{ $title }}</h1>
        <div class="d-flex justify-content-end">
            <a class="btn btn-success" href="{{ route('grades.create') }}">Agregar</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Estudiante</th>
                    <th>Materia</th>
                    <th>Nota</th>
                    <th>Fecha</th>
                    <th>Observación</th>
                    <th colspan="3"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($grades as $grade)
                    <tr>
                        <td>{{ $grade->student->name }}</td>
                        <td>{{ $grade->subject->name }}</td>
                        <td>{{ $grade->note }}</td>
                        <td>{{ $grade->date }}</td>
                        <td>{{ $grade->observation }}</td>
                        <td width="10px">
                            <a class="btn btn-secondary btn-sm" href="{{ route('grades.show', $grade) }}">Ver</a>
                        </td>
                        <td width="10px">
                            <a class="btn btn-primary btn-sm" href="{{ route('grades.edit', $grade) }}">Editar</a>
                        </td>
                        <td width="10px">
                            <form action="{{ route('grades.destroy', $grade) }}" method="POST">
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
