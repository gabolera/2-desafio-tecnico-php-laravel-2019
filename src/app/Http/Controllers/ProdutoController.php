<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{

    public function index()
    {
        $dados = Produto::all();
        return view('produtos.list')->with(['page' => 'produto', 'dados' => $dados]);
    }

    public function create()
    {
        return view('produtos.form');
    }

    public function store(Request $request)
    {
        $produto = new Produto;
        $produto->nome = $request->nome;
        $produto->valor_compra = str_replace(',', '.', $request->valor_compra);
        $produto->valor_venda = str_replace(',', '.', $request->valor_venda);
        $produto->barCode = $request->barCode;
        $produto->save();

        $msg = 'Produto cadastrado com sucesso!';

        return redirect()->route('produto.index')->with(['success' => $msg]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $produto = Produto::find($id);
        $produto->nome = $request->nome;
        $produto->valor_compra = $request->valor_compra;
        $produto->valor_venda = $request->valor_venda;
        $produto->barCode = $request->barCode;
        $produto->update();

        $msg = 'Produto atualizado com sucesso!';

        return redirect()->route('produto.index')->with(['success' => $msg]);
    }

    public function destroy($id)
    {
        //
    }
}
