@extends('examples.layout')

@section('title')
    Curso de Laravel 5
@stop

@section('content')
    <h1>Trabajando con Laravel 5</h1>
    <p>
        @if (isset ($user))
            Bienvenido {{ $user }} {{--Recibimos la variable del archivo routes y la mostramos en la vista--}}
        @else
            [Login]
        @endif
    </p>
@stop