@extends('layouts.layout')

@section('title', 'Estudiantes')

@section('content')
    <div class="card container mt-4 d-flex flex-column">
        <h1>{{ $title }}</h1>
        <div class="d-flex justify-content-end">
            <a class="btn btn-success" href="{{ route('subjects.create') }}">Agregar</a>
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
                @foreach ($subjects as $subject)
                    <tr>
                        <td>{{ $subject->name }}</td>
                        <td>{{ $subject->description }}</td>
                        <td width="10px">
                            <a class="btn btn-secondary btn-sm" href="{{ route('subjects.show', $subject) }}">Ver</a>
                        </td>
                        <td width="10px">
                            <a class="btn btn-primary btn-sm" href="{{ route('subjects.edit', $subject) }}">Editar</a>
                        </td>
                        <td width="10px">
                            <form action="{{ route('subjects.destroy', $subject) }}" method="POST">
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
