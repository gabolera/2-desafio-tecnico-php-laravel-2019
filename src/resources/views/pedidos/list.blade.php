@extends('layouts.app')

@section('title', 'Listando Pedidos')

@section('content')

<div class="card card-small mb-4 mt-4">
        <div class="card-header border-bottom mt-2">
            <div class="row">
                <div class="col-6">
                    <h5><strong>Listando Pedidos (Em desenvolvimento)</strong><h5>
                </div>
                <div class="col-6 d-flex justify-content-end">
                    <a href="{{route('pedido.create')}}" class="btn btn-success">Novo Pedido</a>
                </div>
            </div>
        </div>
<div class="card-body">
        <table id="example" class="display table">
            <thead>
            <tr>
                <th>
                    Pedido nº
                </th>
                <th>
                    Produto
                </th>
                <th>
                    Valor Total
                </th>
                <th>
                    Status
                </th>
                <th>
                    Ações
                </th>
            </tr>
            </thead>
            <tbody>
                @foreach ($dados as $dado)
                <tr>
                    <td>
                        {{$dado->id}}
                    </td>
                    <td>
                        {{$dado->getClient->nome}}
                        {{-- @php
                        // dd($dado);
                            $lista = $dado->pedidos;

                            
                            
                            foreach($lista as $item){
                                // $nome_item = \App\Models\Produto::find($item->produto_id)->get('nome');
                                echo ($item->city);
                            }
                        @endphp --}}
                    </td>
                    <td>
                        {{$dado->getClient->nome}}
                    </td>
                    <td>
                        {{$dado->email}}
                    </td>
                    <td>
                        {{-- <a href="{{route('fornecedor.edit', $dado->id)}}" class="btn btn-sm btn-primary">Visualizar</a>                                     --}}
                        <a href="{{route('pedido.edit', $dado->id)}}"" class="btn btn-sm" style="background-color:#ffa600; color:#fff;">Editar</a>
                        <button type="button" id="deleteBtn" class="btn btn-sm btn-danger" onclick="deleteModal('{{$dado->id}}')" data-url="{{route('pedido.destroy', $dado->id)}}" >Deletar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $('#example').dataTable( {
    "order": [[ 0, "desc" ]],
    "pageLength": 20,
    } );

function deleteModal(name){
    $('#msg-delete').text('Tem certeza que deseja deletar o pedido nº ' + name + ' ?');
    var confirma_delete = $('#deleteBtn').data('url');
    $('#deletar-confirma').attr('href', confirma_delete);
$('#deleteModal').modal('show');
}
</script>
@endsection