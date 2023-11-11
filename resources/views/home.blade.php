@extends('layouts.app')

@section('content')
<style>
    .logo-container {
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
        
    }

    .logo-container img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Controla cómo se ajusta la imagen sin desplazamientos */
        
    }
</style>

<div class="md:w-4/12">
    <div class="logo-container">
        <img src="{{ asset('img/peli1.jpeg') }}" alt="Logo de la empresa">
    </div>
</div>

@endsection 



 
 