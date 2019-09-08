@extends('layouts.header')
<!------ Include the above in your HEAD tag ---------->
@section('content')
  
<div class="container">
        <div class="row">
            <div class="col-12">
                <div class="invoice-title">
                    <h2>Pedido</h2><h3 class="pull-right">Pedido nº {{$dados->id}}</h3>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <address>
                        <strong>Detalhes da loja:</strong><br>
                            Vendedor(a): <strong> {{$dados->getVendedor->name}} </strong><br>
                        </address>
                    </div>
                    <div class="col-12">
                        <address>
                        <strong>Efetuado para:</strong><br>
                            Cliente: <strong> {{$dados->getClient->nome}} </strong><br>
                        </address>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <address>
                            <strong>Data do pedido:</strong><br>
                            {{ date_format($dados->created_at,"d/m/Y - H:i:s") }}<br><br>
                        </address>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Detalhes do pedido</strong></h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <td><strong>Item</strong></td>
                                        <td class="text-center"><strong>Preço</strong></td>
                                        <td class="text-center"><strong>Quantidade</strong></td>
                                        <td class="text-right"><strong>Total</strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $lista = json_decode($dados->pedidos);
                                        function produtoNome($id){
                                            $produto = \App\Models\Produto::find($id);
                                            return $produto;
                                        }
                                    @endphp
                                    @foreach ($lista as $item)
                                    @php
                                    $produto = produtoNome($item->produto_id);
                                    @endphp
                                    <tr>
                                        <td>
                                            {{$produto->nome}}
                                        </td>
                                    <td class="text-center">{{$item->valor_unitario}}</td>
                                        <td class="text-center">{{$item->quantidade}}</td>
                                        <td class="text-right">{{$item->valor_multiplicacao}}</td>
                                    </tr>
                                    @endforeach
    
                                    <tr>
                                        <td class="thick-line"></td>
                                        <td class="thick-line"></td>
                                        <td class="thick-line text-center"><strong>Sub Total</strong></td>
                                        <td class="thick-line text-right">R$ {{$dados->valorTotal}}</td>
                                    </tr>
                                    <tr>
                                        <td class="no-line"></td>
                                        <td class="no-line"></td>
                                        <td class="no-line text-center"><strong>Desconto</strong></td>
                                        <td class="no-line text-right">R$ {{isset($dados->desconto) ? $dados->desconto : '0.00'}}</td>
                                    </tr>
                                    <tr>
                                        <td class="no-line"></td>
                                        <td class="no-line"></td>
                                        <td class="no-line text-center"><strong>Total</strong></td>
                                        <td class="no-line text-right">R$ {{$dados->subTotal}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
@endsection