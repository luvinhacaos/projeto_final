@extends('layout')

@section('cabecalho')
    Painel dos Votos
@endsection

@section('conteudo')
<table class="table table-bordered table-hover table-striped" style="text-align: center;">
    <thead>
        <tr class="table-light">
            <th class="col col-2" style="text-align: left">Votos</th>
            @auth
            <th class="col col-2" style="text-align: left">Editar</th>
            <th class="col col-2" style="text-align: left">Excluir</th>
            @endauth
        </tr>
    </thead>
    <tbody>

        @foreach($voto as $infoVoto)
            <tr>
                <td style="text-align: left" class="d-flex justify-content-between">
                    {{$infoVoto->desc_voto}}
                </td>    
                @auth
                <td>
                    <a href="/votos/{{$infoVoto->id}}/edit" class="btn btn-primary btn-sm">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                </td>
                <td>                        
                    <form action="/votos/destroy/{{$infoVoto->id}}" method="post" class="ms-2">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </form>
                </td>
                @endauth
            </tr>
            @endforeach
        </tbody>
    </table>
    <input type="hidden" name="">
    <span>
        @guest
        <a href="/login" class="btn btn-primary mt-3">Login</a>              
        @endguest

        <a href="/home" class="btn btn-secondary mt-3"> Votlar </a>
    </span>

    @endsection
