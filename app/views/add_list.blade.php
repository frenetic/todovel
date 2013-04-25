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
            
            {{ Form::open( array("action" => "list/create") ) }}
                {{ Form::label('titulo', 'Nova Lista:') }}
                    {{ Form::text('titulo') }}
                
                {{ Form::submit('OK') }}
            {{ Form::close() }}
            
        </div>
    </div>
@stop