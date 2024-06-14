@extends('layouts.app')
 
@section('title', 'Laravel ')
 
@section('contents')
<div class="container mx-auto px-4 py-8 flex flex-col items-center justify-center">
    <h1 class="font-bold text-3xl mb-4 text-center">Bienvenido Docente</h1>
    <p class="text-lg mb-6 text-center">¡Hola Docente! Bienvenido a tu panel de control. Desde aquí podrás acceder a todas las funciones y herramientas disponibles para gestionar tus cursos y actividades académicas.</p>
    <div class="flex items-center mb-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
        </svg>
        <p class="text-lg text-green-500">Comienza explorando tus cursos.</p>
    </div>
    <div class="flex items-center mb-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
        </svg>
        <p class="text-lg text-green-500">Administra tus actividades académicas.</p>
    </div>
    <!-- Agrega más contenido según tus necesidades -->
</div>
@endsection