@extends('layout')

@section('cabecalho')
Tela Inicial Votação
@endsection

@section('conteudo')
@foreach ($voto as $vt)   
<form action="/votos/update/{{$vt->id}}" method="post">
    @csrf
    <div class="mr-3">
        <div class="col col-8 mb-3">
            <label for="descricao">Descricao da pauta: </label>
            <input type="hidden" class="form-control" name="id_pauta" id="id_pauta" value="{{$vt->id_pauta}}">
            <input type="text" class="form-control" value="{{$vt->desc_pauta}}" disabled>
        </div>
        
        <div class="col col-8 mb-3">
            <label for="desc_voto">Informe o voto: </label>
            <select name="desc_voto" id="desc_voto"  class="form-select" required>
                <option value="{{$vt->desc_voto}}">{{$vt->desc_voto}}</option>
                <option value="Aprova">Aprova</option>
                <option value="Reprova">Reprova</option>
                <option value="Abstem">Abstem</option>
            </select>
        </div>
    </div>
    <button class="btn btn-primary mt-3"> Salvar </button>
    <a href="/votos/{{$vt->id_pauta}}/index" class="btn btn-primary mt-3">Voltar</a>
</form>  
@endforeach
@endsection