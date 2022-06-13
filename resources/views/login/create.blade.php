@extends('layout')

@section('cabecalho')
Novo usuário
@endsection

@section('conteudo')
<form action="/store" method="post">
    @csrf
    <div class="form-group col-8">
        <label for="name">Nome: </label>
        <input type="name" name="name" id="name" required class="form-control">
    </div>

    <div class="form-group col-8">
        <label for="email">E-mail: </label>
        <input type="email" name="email" id="email" required class="form-control">
    </div>
    <div class="form-group col-4">
        <label for="password">Senha</label>
        <input type="password" name="password" id="password" required min="1" class="form-control">
    </div>
    <button class="btn btn-primary mt-3"> Cadastrar </button>
    <a href="/home" class="btn btn-secondary mt-3"> Votlar </a>
</form>  
@endsection