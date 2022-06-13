<?php

namespace App\Http\Controllers;

use App\Models\Pauta;
use App\Models\Voto;
use App\Http\Requests\PautaFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AssembleiaController extends Controller
{
    public function index(Request $request)
    {
        $assembleia = Pauta::query()->orderBy('desc_pauta')->get();
        $mensagemSucesso = session('mensagem.sucesso');

        return view('assembleia.index')->with('assembleia', $assembleia)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create(Request $request)
    {
        return view('assembleia.create');    
    }

    public function store(PautaFormRequest $request)
    {
        Pauta::create($request->all());        

        $request->session()->flash('mensagem.sucesso', 'Pauta cadastrada com sucesso');
        return redirect('/home');
    }
    
    public function remover(Request $request)
    {
        Pauta::destroy($request->id);
        
        $request->session()->flash('mensagem.sucesso', 'Pauta excluida com sucesso');
        return redirect('/home');
    }
    
    public function editar(int $id, Request $request)
    {   
        $idPauta = Pauta::find($id);
        return view('assembleia.editar')->with('pauta', $idPauta);
    }

    public function update(int $id, PautaFormRequest $request)
    {
        $pauta = Pauta::find($id);

        $pauta->desc_pauta = $request->desc_pauta;
        $pauta->tipo_pauta  = $request->tipo_pauta;
        $pauta->ativa_sn  = $request->ativa_sn ;       

        $pauta->save();
        
        $request->session()->flash('mensagem.sucesso', 'Pauta atualizada com sucesso');
        return redirect('/home');
    }

    public function votar(int $id, Request $request)
    {   
        $idPauta = Pauta::find($id);
        return view('votos.votar')->with('pauta', $idPauta);
    }
    
}
