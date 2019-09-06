<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Models\Pedido;
use App\Models\Produto;
use App\Models\Cliente;

class PedidoController extends Controller
{
    public function index()
    {
        $dados = Pedido::all();
        return view('pedidos.list')->with(['page' => 'pedido', 'dados' => $dados]);
    }

    public function create()
    {
        $clientes = Cliente::all();
        $produtos = Produto::all();
        return view('pedidos.form')->with(['page' => 'pedido', 'clientes' => $clientes,
                                            'produtos' => $produtos]);
    }

    public function store(Request $request)
    {
        dd($request->all());
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
        //
    }

    public function destroy($id)
    {
        //
    }
}
