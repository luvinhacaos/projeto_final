<?php

namespace App\Http\Controllers;

use App\Models\Voto;
use App\Http\Requests\PautaFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VotosController extends Controller
{
    public function index(int $id, Request $request)
    {
        $voto = DB::select('SELECT votos.id, votos.desc_voto, pautas.desc_pauta, id_pauta FROM votos, pautas WHERE votos.id_pauta = pautas.id AND votos.id_pauta = ?', [$id]);
        
        $mensagemSucesso = session('mensagem.sucesso');

        return view('votos.index')->with('voto', $voto)->with('mensagemSucesso', $mensagemSucesso);;

    }

    public function store(Request $request)
    {
        Voto::create($request->all());        

        $request->session()->flash('mensagem.sucesso', 'Voto cadastrado com sucesso');
        return redirect('/home');
    }

    public function destroy(Request $request)
    {
        Voto::destroy($request->id);
        
        $request->session()->flash('mensagem.sucesso', 'Voto excluido com sucesso');
        return redirect()->back();
    }

    public function edit(int $id, Request $request)
    {   
        $voto = DB::select('SELECT votos.id, votos.desc_voto, pautas.desc_pauta, id_pauta FROM votos, pautas WHERE votos.id_pauta = pautas.id AND votos.id = ?', [$id]);
        return view('votos.edit')->with('voto', $voto);
    }

    public function update(int $id, Request $request)
    {
        
        $voto = Voto::find($id);
        $voto->desc_voto = $request->desc_voto;
        $voto->save();
        
        $id_pauta = $request->id_pauta;
        $votoIndex = DB::select('SELECT votos.id, votos.desc_voto, pautas.desc_pauta, id_pauta FROM votos, pautas WHERE votos.id_pauta = pautas.id AND id_pauta = ?', [$id_pauta]);
        
        $request->session()->flash('mensagem.sucesso', 'Voto atualziado com sucesso');
        return redirect("votos/{$id_pauta}/index")->with('voto', $votoIndex);
    }

    public function voltar(int $id, Request $request)
    {        
        $id_pauta = $request->id_pauta;
        $votoIndex = DB::select('SELECT votos.id, votos.desc_voto, pautas.desc_pauta, id_pauta FROM votos, pautas WHERE votos.id_pauta = pautas.id AND id_pauta = ?', [$id_pauta]);
        
        $request->session()->flash('mensagem.sucesso', 'Voto atualziado com sucesso');
        return redirect("votos/{$id_pauta}/index")->with('voto', $votoIndex);
    }
    
}
