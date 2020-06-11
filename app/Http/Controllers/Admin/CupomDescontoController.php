<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\CupomDesconto;

class CupomDescontoController extends Controller
{
    public function index()
    {
        $cupons = CupomDesconto::all();
        return view('admin.cupomDesconto.indexCupom', compact('cupons'));
    }

    public function adicionar()
    {
        return view('admin.cupomDesconto.adicionar');
    }

    public function editar($id)
    {
        $registro = CupomDesconto::find($id);
        if( empty($registro->id) ) {
            return redirect()->route('admin.cupons');
        }
        return view('admin.cupomDesconto.editar', compact('registro'));
    }

    public function salvar(Request $req)
    {
        $dados = $req->all();

        CupomDesconto::create($dados);

        $req->session()->flash('admin-mensagem-sucesso', 'Cupom de desconto criado com sucesso!');

        return redirect()->route('admin.cupons');
    }

    public function atualizar(Request $req, $id)
    {
        $dados = $req->all();

        CupomDesconto::find($id)->update($dados);

        $req->session()->flash('admin-mensagem-sucesso', 'Cupom de desconto atualizado com sucesso!');

        return redirect()->route('admin.cupons');
    }

    public function deletar($id, Request $req)
    {

        CupomDesconto::find($id)->delete();

        $req->session()->flash('admin-mensagem-sucesso', 'Cupom de desconto deletado com sucesso!');

        return redirect()->route('admin.cupons');
    }
}
