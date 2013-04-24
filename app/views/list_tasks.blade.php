@extends('template')

@section('conteudo')
    
    <ul>
        @foreach ($tasks as $task)
            <li>{{ $task->titulo }}</li>
        @endforeach
    </ul>
@stop