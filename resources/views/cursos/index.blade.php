@extends('layouts.app')
 
@section('title', 'Materias')
 
@section('contents')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<div>
    <h1 class="font-bold text-2xl ml-3">Lista de Materias</h1>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Agregar
      </button>
    <hr />

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                {{-- <th scope="col" class="px-6 py-3 align-middle text-center">#</th> --}}
                <th scope="col" class="px-6 py-3 align-middle text-center">Nombre</th>
                <th scope="col" class="px-6 py-3 align-middle text-center">Unidad de Credito</th>
                <th scope="col" class="px-6 py-3 align-middle text-center">Descripcion</th>
                <th scope="col" class="px-6 py-3 align-middle text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @if($cursoslist->count() > 0)
            @foreach($cursoslist as $rs)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="align-middle text-center">
                    {{ $rs->nombre_curso }}
                </td>
                <td class="align-middle text-center">
                    {{ $rs->precio_curso }}
                </td>
                <td class="align-middle text-center">
                    {{ $rs->dateCurso }}
                </td>
                <td class="w-36 align-middle text-center">
                    <div class="h-14 flex items-center justify-center">
                        <form action="{{ route('admin/course/destroy', $rs->id) }}" method="POST" onsubmit="return confirm('¿Esta seguro?')" class="text-red-800">
                            @csrf
                            @method('DELETE')
                            <button class="align-middle text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                  </svg>
                            </button>
                        </form>
                        <button type="button" class="" data-toggle="modal" data-target="#Modaledit" data-id="{{ $rs->id }}" data-nombre="{{ $rs->nombre_curso }}" data-precio="{{ $rs->precio_curso }}" data-datecurso="{{ $rs->dateCurso }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                              </svg>
                        </button>
                                                
                         
                    </div>
                </td>                    
            </tr>
            @endforeach
            @else
            <tr>
                <td class="text-center" colspan="5">Product not found</td>
            </tr>
            @endif
        </tbody>
    </table>

    <br><br>
 
        {{-- modal Agregar --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nueva Materia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin/course/save') }}" method="POST" class="space-y-4 md:space-y-6"> 
                <div class="modal-body">
                    @csrf
                    <div>
                        <label for="nombre_curso" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                        <input type="text" name="nombre_curso" id="nombre_curso" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required="">
                        @error('nombre_curso')
                        <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="precio_curso" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Unidades de Creditos</label>
                        <input type="number" name="precio_curso" id="precio_curso" min="1" max="5" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                        @error('precio_curso')
                        <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="dateCurso" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripcion</label>
                        <input type="text" name="dateCurso" id="dateCurso" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                        @error('dateCurso')
                        <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    
                
            </div>
            <div class="modal-footer">
                <button type="submit" class="flex justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Guardar cambios</button>
            </div>
            
            </form>
            </div>
        </div>
    </div>
    {{-- modal Agregar --}}
    
    <!-- Modal Editar -->
    <div class="modal fade" id="Modaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST" id="editForm">
                    @csrf
                   
                    <input type="hidden" name="id" id="cursoId">
                    <div class="modal-body">
                        <!-- Aquí van los campos del formulario para editar el curso -->
                        <div class="form-group">
                            <label for="nombre_curso">Nombre</label>
                            <input type="text" name="nombre_curso" id="nombre_curso" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="precio_curso">Unidades de Creditos</label>
                            <input type="number" name="precio_curso" id="precio_curso" min="1" max="5" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="dateCurso">Descripcion</label>
                            <input type="text" name="dateCurso" id="dateCurso" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- modal editar --}}
</div>
<script>
$('#Modaledit').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Botón que activó el modal
    var id = button.data('id'); // Extrae el ID del curso
    var nombre = button.data('nombre'); // Extrae el nombre del curso
    var precio = button.data('precio'); // Extrae el precio del curso
    var dateCurso = button.data('datecurso'); // Extrae la descripción del curso

    var modal = $(this);
    modal.find('#cursoId').val(id);
    modal.find('#nombre_curso').val(nombre);
    modal.find('#precio_curso').val(precio);
    modal.find('#dateCurso').val(dateCurso);

    modal.find('#editForm').attr('action', '/admin/course/update/' + id);
});
</script> 
@endsection