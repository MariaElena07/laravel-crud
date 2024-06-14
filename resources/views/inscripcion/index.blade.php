@extends('layouts.user')

@section('title', 'Inscripcion')

@section('contents')
<div class="container">
    <h1>Inscripciones de Usuarios en Cursos</h1>

    @if($inscripciones->isEmpty())
        <p>No hay inscripciones disponibles.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Curso</th>
                    
                    {{-- <th>Estado</th> --}}
                    <!-- Agrega más columnas según tus necesidades -->
                </tr>
            </thead>
            <tbody>
                 @foreach($inscripciones as $inscripcion)
                    <tr>
                        <td>{{ $inscripcion->user_id->name }}</td>
                        <td>{{ $inscripcion->curso_id->nombre_curso }}</td>
                        
                        {{-- <td>{{ $inscripcion->estado }}</td> --}}
                        <!-- Agrega más celdas según tus necesidades -->
                    </tr>
                @endforeach 
            </tbody>
        </table>
    @endif
</div>
@endsection