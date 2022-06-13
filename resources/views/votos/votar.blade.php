@extends('layout')

@section('cabecalho')
{{$pauta->desc_pauta}}
@endsection

@section('conteudo')
<form action="/votos/salvar" method="post">
    @csrf
    <div class="mr-3">
        <div class="col col-8 mb-3">
            <label for="descricao">Descricao da pauta: </label>
            <input type="hidden" class="form-control" name="id_pauta" id="id_pauta" value="{{$pauta->id}}">
            <input type="text" class="form-control" value="{{$pauta->desc_pauta}}" disabled>
        </div>
        
        <div class="col col-8 mb-3">
            <label for="desc_voto">Informe o voto: </label>
            <select name="desc_voto" id="desc_voto"  class="form-select" required>
                <option value="">Selecione um voto</option>
                <option value="Aprova">Aprova</option>
                <option value="Reprova">Reprova</option>
                <option value="Abstem">Abstem</option>
            </select>
        </div>
        <button class="btn btn-primary mt-3"> Salvar </button>
        <a href="/home" class="btn mt-3">Voltar</a>
    </div>
</form>  
@endsection