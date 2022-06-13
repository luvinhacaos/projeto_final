@extends('layout')

@section('cabecalho')
Informações dos Officios
@endsection

@section('conteudo')
    <table class="table table-bordered table-hover table-striped" style="text-align: center;">
        <thead>
            <tr class="table-light">
                <th class="col col-7" style="text-align: left">Descrição do Officio</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td style="text-align: left">
                        <a href="/home" style="text-decoration:none; color:black">Ofício da 85º Assembléia do DECSI</a>                        
                    </td>
    
                </tr>
        </tbody>
      </table>
<input type="hidden" name="">
<span>
    @guest
    <a href="/login" class="btn btn-primary mt-3">Login</a>              
    @endguest
</span>
@endsection
