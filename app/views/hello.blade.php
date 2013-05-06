@extends('template')

@section('conteudo')
    
    <div class="jumbotron">
        <h1>ToDoVel</h1>
        
        <p class="lead">
            ToDoVel é um simples sistema de listas de coisas para fazer (to-do list) desenvolvido com o framework PHP <a href="http://laravel.com/" target="_blank">Laravel 4</a>.
            Este aplicativo foi criado para ser um <a href="http://blog.frenetic.com.br/category/projetos/todovel/" target="_blank">tutorial básico de como utilizar o Laravel 4</a>.
        </p>
        
        <p>
            <a class="btn btn-primary" href="http://blog.frenetic.com.br/category/projetos/todovel/">Leia o Tutorial</a>
            <a class="btn btn-info" href="https://github.com/frenetic/todovel">Veja o Código no GitHub</a>
        </p>
        
        
        <p>
            <a class="btn btn-small btn-danger" href="{{ URL::to('cadastro') }}">Cadastre-se</a>
            <a class="btn btn-small btn-inverse" href="{{ URL::to('login') }}">Login</a>
        </p>
    </div>
@stop