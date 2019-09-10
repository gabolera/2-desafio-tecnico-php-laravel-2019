<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use Carbon;
use PDF;

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
        $validator = Validator::make($request->all(), [
            'cliente_id' => 'required',
            'vendedor_id' => 'required',
            'valorTotal' => 'required',
            'subTotal' => 'required',
            'pedido' => 'required',        
        ],
        [
            'cliente_id.required' => 'Está faltando selecionar o cliente!',
            'vendedor_id.required' => 'Ops... O vendedor não está logado!',
            'valorTotal.required' => 'Ops... O servidor não enviou as informaçõe necessárias!',
            'subTotal.required' => 'Ops... O servidor não enviou as informaçõe necessárias!',
            'pedido.required' => 'Ops... O servidor não enviou as informaçõe necessárias!',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    

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

        $msg = 'Pedido registrado com sucesso!';

        $dados = new Pedido;
        $dados->cliente_id = $request->cliente_id;
        $dados->vendedor_id = $request->vendedor_id;
        $dados->valorTotal = $valor_total;
        $dados->desconto = $desconto;
        $dados->subTotal = $sub_total;
        $dados->pedidos = $lista_itens;
        $dados->dataPedido = Carbon::now();
        $dados->status = 0;
        $dados->save();

        return redirect()->route('pedido.index')->with(['success' => $msg])->withInput();
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

    public function destroy(request $request)
    {
        $dados = Pedido::find($request->id);
        $dados->delete();

        $msg = 'Pedido deletado com sucesso';

        return redirect()->back()->with(['success' => $msg]);
    }

    public function pdfPedido($id){
        $dados = Pedido::find($id);
        // $pdf = PDF::loadView('pedidos.print', compact('dados'));
        // $fileName = 'Pedido_'.$dados->id.'.pdf';
        // return $pdf->download($fileName);
        return view('pedidos.print')->with(['dados' => $dados]);
    }

    public function pagamentoPedido(request $request){
        // dd($request->all());
        $dados = Pedido::find($request->id);
        $dados->status = 1;
        $dados->update();

        return redirect()->back();
    }

    public function API($id){
        /**
         *  SE A PESSOA ESTIVER LOGADA NO SISTEMA, A SUA CONSULTA
         *  NA API SERÁ COMPLETA. ENTRETANTO, SE A PESSOA NÃO ESTIVER
         *  LOGADA, SÓ IRÁ APARECER O VALOR E O NOME DO PRODUTO. 
         */

        $dados = Pedido::find($id);

        if(\Auth::check()){
            if(!empty($dados)){
                return response()->json($dados);
            }
            
        }else{
            $dados = 'Requisição negada! (necessário estar logado)';
            if(!empty($dados)){
                return response()->json($dados);
            }
        }

        return redirect('/');
    }

}
