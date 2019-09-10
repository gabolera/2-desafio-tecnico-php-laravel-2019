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
                    Cliente
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
                    </td>
                    <td>
                        {{$dado->valorTotal}}
                    </td>
                    <td>
                        @if ($dado->status == '0')
                            <span id="badge-{{$dado->id}}" class="badge badge-pill badge-warning">Aguardando pagamento</span>
                        @elseif ($dado->status == '1')
                            <span id="badge-{{$dado->id}}" class="badge badge-pill badge-success">Pagamento efetuado</span>
                        @elseif ($dado->status == '2')
                            <span id="badge-{{$dado->id}}" class="badge badge-pill badge-danger">Compra Cancelada</span>
                        @else
                            
                        @endif
                    </td>
                    <td>          
                        <a href="{{route('pedido.print', $dado->id)}}" target="_blank" class="btn btn-sm" style="background-color:#00977a; color:#fff;">Imprimir Pedido</a>

                        @if ($dado->status == '0')
                            <button type="button" id="pgmtBtn{{$dado->id}}" class="btn btn-sm btn-primary" onclick="EditPagamentoModal('{{$dado->id}}', '{{$dado->id}}')" data-url="{{route('pedido.updatePagamento')}}" data-id="{{$dado->id}}"> Lançar pagamento</a>                            
                            <button type="button" id="CancelarBtn{{$dado->id}}" class="btn btn-sm btn-danger ml-1" onclick="alert('Botão em construção, aguarde')" data-url="{{route('pedido.destroy')}}" data-id="{{$dado->id}}">Cancelar pedido</a>
                        @elseif ($dado->status == '1')
                            {{-- <a href="{{route('pedido.edit', $dado->id)}}"" class="btn btn-sm" style="background-color:#00977a; color:#fff;">Pedido devolução</a> --}}
                        @elseif ($dado->status == '2')
                        <a href="{{route('pedido.print', $dado->id)}}"" class="btn btn-sm btn-primary" style="color:#fff;">Reabrir pedido</a>
                        @else
                            
                        @endif
                        {{-- <a href="{{route('fornecedor.edit', $dado->id)}}" class="btn btn-sm btn-primary">Visualizar</a>                                     --}}
                        {{-- <a href="{{route('pedido.edit', $dado->id)}}"" class="btn btn-sm btn-primary" style="color:#fff;">Alterar Status</a>
                        <button type="button" id="deleteBtn{{$dado->id}}" class="btn btn-sm btn-danger" onclick="deleteModal('{{$dado->id}}', '{{$dado->id}}')" data-url="{{route('pedido.destroy', $dado->id)}}" data-id="{{$dado->id}}" >Cancelar pedido</a> --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<div id="EditPagamento" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Lançar pagamento</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="pagamento-form" method="POST">
            @csrf
                <div class="col-12">
                    <div id="form-pagamento-inputs" class="d-flex justify-content-center">
                        <input type="hidden" id="pagamento-id" name="id">
                        <input type="date" class="form-control">
                    </div>    
                </div>
            
        </div>
        <div class="modal-footer">
            <button type="submit" id="pgmt-form-confirma" class="btn btn-success" onclick="pagamento_efetuado({{$dado->id}})">Confirmar pagamento</button>
            </form>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $('#example').dataTable( {
    "order": [[ 0, "desc" ]],
    "pageLength": 20,
    } );

function deleteModal(name, id){
    $('#msg-delete').text('Tem certeza que deseja cancelar o pedido nº ' + name + ' ?');
    var confirma_delete = $('#deleteBtn'+id).data('url');
    $('#delete-form').attr('action', confirma_delete);
    $('#deletar-confirma').val(id);
    
$('#deleteModal').modal('show');
}

function EditPagamentoModal(name, id){
    // $('#msg-delete').text('Tem certeza que deseja cancelar o pedido nº ' + name + ' ?');
    var form = $('#form-pagamento-inputs');
    var confirma_url = $('#pgmtBtn'+id).data('url');
    $('#pagamento-form').attr('action', confirma_url);

    form.find('#pagamento-id').val(id);
    
$('#EditPagamento').modal('show');
}

// USARIA ISSO SE MUDAR PARA REACTJS
// function pagamento_efetuado(id){
//     $('#badge-'id).attr('class', 'badge badge-pill badge-success').text('Pagamento efetuado')
// }


</script>
@endsection