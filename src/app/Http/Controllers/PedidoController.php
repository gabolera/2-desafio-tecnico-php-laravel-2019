<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon;

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
        $total = $request->valorTotal;
        $desconto = $request->desconto;
        $subtotal = $request->subTotal;

        $pedidos = $request->pedido;
        $lista_itens = json_encode($pedidos);
        // dd($request->all());
        $valor_total = 0;

        foreach ($pedidos as $key => $value){
            $valor_unitario = $value['valor_unitario'];
            $quantidade = $value['quantidade'];
            $total_pedido = ($quantidade * $valor_unitario);
            $valor_total = ($valor_total + $total_pedido);
        }

        $sub_total = ($valor_total - $desconto);

        if($sub_total != $subtotal){
            $msg = 'errorrrrr no sub-total';
        }elseif($total != $valor_total){
            $msg = 'erro no TOTAL';
        }else{
            $msg = 'Aeeeeee Deu certo';
        }

        $dados = new Pedido;
        $dados->cliente_id = $request->cliente_id;
        $dados->vendedor_id = $request->vendedor_id;
        $dados->valorTotal = $valor_total;
        $dados->desconto = $desconto;
        $dados->subTotal = $sub_total;
        $dados->pedidos = $lista_itens;
        $dados->dataPedido = Carbon::now();
        // $dados->status = 0;
        $dados->save();

        return redirect()->route('pedidos.index')->with(['success' => $msg]);
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
