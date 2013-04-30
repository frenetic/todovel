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
            
            <form method="post" action="{{ URL::to('login') }}">
                <label>
                    Email:
                    <input type="text" name="email">
                </label>
                
                <label>
                    Senha:
                    <input type="password" name="senha">
                </label>
                
                <input type="submit" value="Login">
            </form>
            
        </div>
    </div>
@stop