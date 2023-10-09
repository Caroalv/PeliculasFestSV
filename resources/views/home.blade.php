@extends('layouts.app')

@section('content')
<style>
    img{
        position: absolute;
        width: 500px;
        left: 30%;
        height:500px;
                
    }
</style>

<div class="md:w-4/12">
    <img class="object-contain h-99  background-size background-adjunto" src="{{ asset('img/pelis10.jpeg') }}" alt="">
</div>

@endsection
