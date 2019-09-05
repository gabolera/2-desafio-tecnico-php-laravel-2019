@extends('layouts.app')

@section('title', isset($dados) ? 'Editando Produto' : 'Cadastrar novo Produto')
    

@section('content')
        <!-- Page Header -->
        <div class="page-header row no-gutters py-4">
          <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Produto</span>
            <h3 class="page-title">{{isset($dados) ? 'Você está editando ' . $dados->nome : 'Cadastrar Novo Produto'}}</h3>
          </div>
        </div>
        <!-- End Page Header -->
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <!-- Add New Post Form -->
            <div class="card card-small mb-3">
                <form class="add-new-post" action="{{isset($dados) ? route('produto.update',$dados->id) : route('produto.store')}}" method="POST">
                    @csrf
                  @if(isset($dados))
                    <input name="_method" type="hidden" value="PUT">
                    @else

                    @endif
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <label for="nome">Nome do Produto</label>
                                <input class="form-control form-control-lg mb-3" type="text" placeholder="Nome do Produto" id="nome" name="nome" value="{{isset($dados->nome) ? $dados->nome : '' }}" autofocus>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="valor_compra">Valor de compra</label>
                                <input class="form-control form-control-lg mb-3" id="valor_compra" type="text" placeholder="200,00" name="valor_compra" value="{{isset($dados->valor_compra) ? $dados->valor_compra : '' }}" data-mask="#.##0,00" data-mask-reverse="true">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="valor_venda">Valor de venda</label>
                                <input class="form-control form-control-lg mb-3" id="valor_venda" type="text" placeholder="300,00" name="valor_venda" value="{{isset($dados->valor_venda) ? $dados->valor_venda : '' }}" data-mask="#.##0,00" data-mask-reverse="true">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="valor_venda">Código de barras</label>
                                <input class="form-control form-control-lg mb-3" id="barCode" type="text" placeholder="Digite o código aqui" name="barCode" value="{{isset($dados->barCode) ? $dados->barCode : '' }}">
                            </div>
                              <div class="col-lg-6 col-md-6 col-sm-12">
                                  <label for="qrCode">QR Code</label>
                                  <div class="input-group">  
                                    <input type="text" class="form-control form-control-lg mb-3" id="qrCode" name="qrCode" placeholder="QR CODE" value="{{isset($dados->qrCode) ? $dados->qrCode : ''}}">
                                      <div class="input-group-append">
                                        <button class="btn btn-white dshy-generator" type="button" id="qrCodeGenBtn"><i class="material-icons">refresh </i> Gerar</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                        <div class="card-footer d-flex justify-content-end">
                            <div>
                                <button class="btn btn-outline-secondary">
                                    <i class="material-icons">cancel</i> Cancelar
                                </button>
                                <button class="btn btn-primary ml-auto" type="submit">
                                    <i class="material-icons">file_copy</i> Salvar
                                </button>
                            </div>
                        </div>
                            </div>
                        </div>
                    </form>
                
                    </div>

            </div>
            <!-- / Add New Post Form -->
          </div>
        </div>

@endsection

@section('scripts')
  <script>
function qrCodGen(length) {
   var result           = '';
   var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
   var charactersLength = characters.length;
   for ( var i = 0; i < length; i++ ) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
   }
   return result;
}

function barCodGen(length) {
   var result           = '';
   var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
   var charactersLength = characters.length;
   for ( var i = 0; i < length; i++ ) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
   }
   return result;
}


$('#qrCodeGenBtn').on('click', function(){
  var barcode = qrCodGen(20);
  $('#qrCode').val(barcode);
})


  </script>
@endsection