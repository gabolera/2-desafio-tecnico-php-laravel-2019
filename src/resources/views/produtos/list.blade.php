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
                    ID
                </th>
                <th>
                    Produto
                </th>
                <th>
                    Valor de venda
                </th>
                <th>
                    
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
                        <a href="{{route('produto.destroy', $dado->id)}}" class="btn btn-sm btn-danger">Deletar</a>
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
"order": [[ 0, "desc" ]],
"pageLength": 20,
} );

// $('#myModal').on('shown.bs.modal', function () {
//   $('#qrCodeModal').trigger('focus')
// })

function openModal(code){
    $('#qrcode').empty();
    const local = '{{env('APP_URL')}}/api/produto/consulta?q=';

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


</script>
@endsection