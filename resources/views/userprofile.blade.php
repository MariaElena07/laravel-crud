@extends('layouts.user')
 
@section('title', 'Perfil')
 
@section('contents')
<header class="bg-white shadow" >
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-center text-3xl font-bold text-gray-900">
            Perfil
        </h1>
    </div>
</header>

<hr />
<div class="flex justify-center items-start h-screen">
    <div class="border shadow-md rounded-md p-8 max-w-md w-full mt-10">
         <!-- Mensajes de error de validación -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Mensaje de éxito o confirmación -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
        <form method="POST" enctype="multipart/form-data" action="{{ route('actualizar_Profile') }}">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-base">Nombre</label>
                <input id="name" name="name" type="text" value="{{ auth()->user()->name }}" class="w-full px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring focus:ring-blue-500" />
            </div>
            <div class="mb-4">
                <label for="email" class="block text-base">Correo</label>
                <input id="email" name="email" type="text" value="{{ auth()->user()->email }}" class="w-full px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring focus:ring-blue-500" />
            </div>
            <div class="mt-6">
                <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white rounded-md focus:outline-none focus:ring focus:ring-blue-500">Guardar</button>
            </div>
        </form>
    </div>
</div>

@endsection