@extends('layouts.app')

@section('navbar-nav')
    <ul class="navbar-nav ml-md-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{route('login')}}">Autenticação</a>
        </li>
        <li class="nav-item">
            <a href="{{route('register')}}" class="nav-link">Cadastro</a>
        </li>
    </ul>
@endsection

@section('body')
    <div class="jumbotron">
        <h1 class="display-4">Olá, criadores!</h1>
        <p class="lead">Este sem site é um protótipo que visa gerenciador torneios de pássaros no Estado do Amapá.</p>
        <hr class="my-4">
        <p>A opção <strong>Cadastro</strong> é para a criação do seu perfil de criador.</p>
        <p>A opção <strong>Autenticação</strong> é para aqueles que já possuem um perfil de criador neste site.</p>
    </div>
@endsection
