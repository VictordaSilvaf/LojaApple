<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProdutoRequest;
use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Database\Eloquent\Model;


class ProdutoController extends Controller
{
    private $objProduto;
    public function __construct()
    {
        $this->objProduto = new Produto();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $produtos = $this->objProduto->all();
        $mensagem = $request->session()->get('mensagem');
        return view('home', compact("produtos", 'mensagem'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdutoRequest $request)
    {
        $produto = Produto::create($request->all());
        $image = $request->file('src')->store('produtos');
        if ($request->file('src')->isValid()) {
            $request->src->store('produtos');
            $produto->src = $image;
        }

        $request->session()->flash("mensagem", "Produto {$produto->nome} adicionado com sucesso.");
        $produto->save();
        return redirect()->route('produto.index');
    }

    public function edit(Produto $id)
    {
        return view('admin.edit')->with('produto', $id);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param ProdutoRequest $request
     * @param App\Http\Requests\ProdutoRequest;  $request
     * @return \Illuminate\Http\Response
     */
    public function update(ProdutoRequest $request,Produto $id)
    {

        $id->update($request->all());
        $image = $request->file('src')->store('produtos');
        if ($request->file('src')->isValid()) {
            $request->src->store('produtos');
            $id->src = $image;
        }

        $id->save();
        return redirect(route("produto.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $id)
    {
        $id->delete();
        return redirect(route('produto.index'));
    }
}
