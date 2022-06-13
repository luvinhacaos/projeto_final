@extends('layout')

@section('cabecalho')
Pautas
@endsection

@section('conteudo')

<table class="table table-bordered table-hover table-striped" style="text-align: center;">
    <thead>
        <tr class="table-light">
            <th class="col col-7" style="text-align: left">Descrição</th>
            <th class="col col-2">Tipo</th>
            <th class="col col-2">Status</th>
            <th class="col col-2">Votos</th>
        </tr>
    </thead>
    <tbody>
        @foreach($assembleia as $infoAssembleia)
            <tr>
                <td style="text-align: left" class="d-flex justify-content-between">
                    {{$infoAssembleia->desc_pauta}}
                    @auth
                    <span class="d-flex">
                        <a href="/assembleia/{{$infoAssembleia->id}}/editar" class="btn btn-primary btn-sm">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form action="/assembleia/remover/{{$infoAssembleia->id}}" method="post" class="ms-2">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    </span>
                    @endauth
                </td>
                <td>{{$infoAssembleia->tipo_pauta}}</td>
                <td>{{$infoAssembleia->ativa_sn}}</td>
                <td>
                    @auth 
                        @if($infoAssembleia->ativa_sn == 'Ativo' && $infoAssembleia->tipo_pauta == 'Discussão' || $infoAssembleia->tipo_pauta == 'Aprovação')
                            <a href="/assembleia/{{$infoAssembleia->id}}/votar" class="btn btn-info btn-sm mr-2">
                                <i class="fa-solid fa-plus"></i>
                            </a>
                        @endif                          
                    @endauth
                    <a href="/votos/{{$infoAssembleia->id}}/index" class="btn btn-info btn-sm mr-2">
                        <i class="fa-solid fa-circle-info"></i>
                    </a>
                    
                </td>

            </tr>
        @endforeach
    </tbody>
  </table>
    @guest
        <a href="/login" class="btn btn-primary mt-3">Login</a>              
    @endguest
    @auth
        <a class="btn btn-primary" id="btn-inclusaopt" href="/criar">Cadastrar Novas Pautas</a>
    @endauth
@endsection