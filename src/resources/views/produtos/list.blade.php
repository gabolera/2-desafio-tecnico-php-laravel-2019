@extends('layouts.app')

@section('title', 'Listando Produtos')

@section('content')

<div class="card card-small mb-4 mt-4">
        <div class="card-header border-bottom mt-2">
            <div class="row">
                <div class="col-6">
                    <h5><strong>Listando Produtos</strong><h5>
                </div>
                <div class="col-6 d-flex justify-content-end">
                    <a href="{{route('produto.create')}}" class="btn btn-success">Cadastrar novo Produto</a>
                </div>
            </div>
        </div>
<div class="card-body">
        <table id="example" class="display table">
            <thead>
            <tr>
                <th>
                    
                </th>
                <th>
                    ID
                </th>
                <th>
                    Produto
                </th>
                <th>
                    Valor de venda
                </th>
                <th>
                    Código de barras
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
                        <div class="custom-control custom-checkbox mb-1">
                            <input type="checkbox" class="custom-control-input select-checked" id="formsCheckboxDefault-{{$dado->id}}" name="select[]" value="{{$dado->id}}">
                            <label class="custom-control-label" for="formsCheckboxDefault-{{$dado->id}}"> </label>
                        </div>
                    </td>
                    <td>
                        {{$dado->id}}
                    </td>
                    <td>
                        {{$dado->nome}}
                    </td>
                    <td>
                        {{$dado->valor_venda}}
                    </td>
                    <td>
                        {{$dado->barCode}}
                    </td>
                    <td>
                        {{-- <a href="{{route('fornecedor.edit', $dado->id)}}" class="btn btn-sm btn-primary">Visualizar</a>                                     --}}
                    <button type="button" class="btn btn-sm" style="background-color:#00977a; color:#fff;" {{isset($dado->qrCode) ? "onclick=openModal('" . $dado->qrCode . "');" : 'no' }}>QRCode</button>
                        <a href="{{route('produto.edit', $dado->id)}}" class="btn btn-sm" style="background-color:#ffa600; color:#fff;">Editar</a>
                        <button type="button" id="deleteBtn{{$dado->id}}" class="btn btn-sm btn-danger" onclick="deleteModal('{{$dado->nome}}', '{{$dado->id}}')" data-url="{{route('produto.destroy', $dado->id)}}">Deletar</a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">QRCode do Produto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            
                <div class="col-12">
                    <div class="d-flex justify-content-center">
                        <div id="qrcode"></div>
                    </div>    
                </div>
                <div class="col-12 d-flex justify-content-center">
                    <p class="qrcode-desc">QR code do seu produto</p>
                </div>
         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">Imprimir</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
<script src="{{asset('scripts/plugins/qrCode/generator/qrcode.min.js')}}"></script>
<script>
$('#example').dataTable( {
"order": [[ 1, "desc" ]],
"pageLength": 20,
} );

// $('#myModal').on('shown.bs.modal', function () {
//   $('#qrCodeModal').trigger('focus')
// })

function openModal(code){
    $('#qrcode').empty();
    // const local = '{{env('API_URL')}}{{!empty(env('API_PORT')) ? ':'.env('API_PORT') : ''}}/url?q=';
    const local = '{{route('produto.pesquisa')}}?q=';

    var qrcode = new QRCode("qrcode", {
    text: local+code,
    width: 250,
    height: 250,
    colorDark : "#000000",
    colorLight : "#ffffff",
    correctLevel : QRCode.CorrectLevel.H


});
$('#myModal').modal('show')
}

function deleteModal(name, id){
    $('#msg-delete').text('Tem certeza que deseja deletar o pedido nº ' + name + ' ?');
    var confirma_delete = $('#deleteBtn'+id).data('url');
    $('#delete-form').attr('action', confirma_delete);
    $('#deletar-confirma').val(id);
    
$('#deleteModal').modal('show');
}


$(document).ready(function(){
    // var url = "'" + {{route('cliente.MultipleDestroy')}} + "'";
    $('#example_wrapper').find('#example_filter').prepend('<button type="submit" id="multiple-Delete-btn" class="btn btn-sm btn-danger mr-5" onclick="MultipleDelete()" data-url="/dashboard/produto/dm/" style="display: none;">Deletar Selecionados</a>');
});

$(document).on('change','#example input:checkbox',function () {
    if($('#example input:checkbox:checked').length > 0) {
        $('#multiple-Delete-btn').show();
    }
    else {
        $('#multiple-Delete-btn').hide();
    }
});

function MultipleDelete(){
    var checkeds = [];
    $('.select-checked').each(function(){
       if ($(this).is(':checked')){
        checkeds.push($(this).val());
    } 
    }) 

    MultipleDeleteConfirm(checkeds)

}

function MultipleDeleteConfirm(id){
        addForm = '';
    $.each(id, function (index, value){
        $('#deletar-confirma').before().append('<input id="multiple-delete-forms" type="hidden" name="selected[]" value="' + value + '">');
    })
        
    $('#msg-delete').text('Você está prestes a deletar diversos arquivos!');
    var confirma_delete = $('#multiple-Delete-btn').data('url');
    $('#delete-form').attr('action', confirma_delete);
    $('#deletar-confirma').val();
    
$('#deleteModal').modal('show');

}

$('#CancelModal').on('click', function(){
    $('input[name="selected[]"]').remove();
});

</script>
@endsection