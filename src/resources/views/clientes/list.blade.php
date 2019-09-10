@extends('layouts.app')

@section('title', 'Listando Clientes')

@section('content')

<div class="card card-small mb-4 mt-4">
        <div class="card-header border-bottom mt-2">
            <div class="row">
                <div class="col-6">
                    <h5><strong>Listando Clientes</strong><h5>
                </div>
                <div class="col-6 d-flex justify-content-end">
                    <a href="{{route('cliente.create')}}" class="btn btn-success">Cadastrar novo cliente</a>
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
                    Nome do Cliente
                </th>
                <th>
                    CPF
                </th>
                <th>
                    Email
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
                        {{$dado->cpf}}
                    </td>
                    <td>
                        {{$dado->email}}
                    </td>
                    <td>
                        {{-- <a href="{{route('fornecedor.edit', $dado->id)}}" class="btn btn-sm btn-primary">Visualizar</a>                                     --}}
                        <a href="{{route('cliente.edit', $dado->id)}}"" class="btn btn-sm" style="background-color:#ffa600; color:#fff;">Editar</a>
                        {{-- <button type="button" id="deleteBtn" class="btn btn-sm btn-danger" onclick="deleteModal('{{$dado->nome}}')"  data-url="{{route('cliente.destroy', $dado->id)}}" >Deletar</a> --}}
                        <button type="button" id="deleteBtn{{$dado->id}}" class="btn btn-sm btn-danger" onclick="deleteModal('{{$dado->nome}}', '{{$dado->id}}')" data-url="{{route('cliente.destroy', $dado->id)}}">Deletar</a>
                    
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
    "order": [[ 1, "desc" ]],
    "pageLength": 20,
    } );

function deleteModal(name, id){
    $('#msg-delete').text('Tem certeza que deseja deletar o pedido nº ' + name + ' ?');
    var confirma_delete = $('#deleteBtn'+id).data('url');
    $('#delete-form').attr('action', confirma_delete);
    $('#deletar-confirma').val(id);
    
$('#deleteModal').modal('show');
}

$(document).ready(function(){
    // var url = "'" + {{route('cliente.MultipleDestroy')}} + "'";
    $('#example_wrapper').find('#example_filter').prepend('<button type="submit" id="multiple-Delete-btn" class="btn btn-sm btn-danger mr-5" onclick="MultipleDelete()" data-url="/dashboard/cliente/dm/" style="display: none;">Deletar Selecionados</a>');
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

    // $('.select-checked').each(function e(){
    //     if ($(this).is(':checked')){
    //         checkeds += $(this).val();
    //     };
    //     console.log(checkeds);
    // })

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