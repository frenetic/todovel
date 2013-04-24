@extends('template')

@section('conteudo')

    <div class="row-fluid marketing">
        <div class="span6">
            @if ( count($errors) > 0)
                Erros encontrados:<br />
                <ul>
                    @foreach ($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            @endif
            
            @if ( isset($sucesso) )
                <h3>FUNCIONOU!</h3>
            @endif
            
            {{ Form::open( array("action" => "TaskController@postAdd") ) }}
                {{ Form::label('titulo', 'Tarefa a ser cumprima:') }}
                    {{ Form::text('titulo') }}
                
                {{ Form::submit('OK') }}
            {{ Form::close() }}
            
        </div>
    </div>
@stop