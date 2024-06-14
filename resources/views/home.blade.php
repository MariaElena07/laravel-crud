@extends('layouts.user')

@section('title', 'Inicio')

@section('contents')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<main>
    <h1 class="font-bold text-2xl ml-3">Tus Notas</h1>
    <hr />
    <div class="mb-40">
        <table class="table  table-striped table-bordered">
            <thead class="table-dark ">
                <tr>
                    <th scope="col" class="px-6 py-3 align-middle text-center">Nombre Alumno</th>
                    <th scope="col" class="px-6 py-3 align-middle text-center">Curso</th>
                    <th scope="col" class="px-6 py-3 align-middle text-center">Nota 1</th>
                    <th scope="col" class="px-6 py-3 align-middle text-center">Nota 2</th>
                    <th scope="col" class="px-6 py-3 align-middle text-center">Nota 3</th>
                    <th scope="col" class="px-6 py-3 align-middle text-center">Promedio</th>
                </tr>
            </thead>
            <tbody >
                @foreach ($notas as $nota)
                    <tr style="margin-bottom: 20px !important;" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="align-middle text-center">{{ $nota->Nombre_Alumno }}</td>
                        <td class="align-middle text-center">{{ $nota->Curso }}</td>
                        <td class="align-middle text-center">{{ $nota->nota1 }}</td>
                        <td class="align-middle text-center">{{ $nota->nota2 }}</td>
                        <td class="align-middle text-center">{{ $nota->nota3 }}</td>
                        <td class="align-middle text-center">{{ $nota->Promedio }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection
