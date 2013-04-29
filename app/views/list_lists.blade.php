@extends('template')

@section('conteudo')
    
    <p>
        <a href="{{ URL::to('list/create') }}">Adicionar Lista</a> <br />
    </p>
    
    <ul style="list-style: none;">
        @foreach ($lists as $lista)
            <li class="task">
                <a href="{{ URL::to('list') }}/{{ $lista->id }}">{{ $lista->titulo }}
                ({{ count( $lista->tasks ) }} Tasks)</a> <br />
            </li>
        @endforeach
    </ul>
@stop