@extends('layouts.app')

@section('title', isset($dados) ? 'Editando Pedido' : 'Novo Pedido')
    

@section('content')
        <!-- Page Header -->
        <div class="page-header row no-gutters py-4">
          <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Pedidos</span>
            <h3 class="page-title">{{isset($dados) ? 'Você está editando o pedido nº ' . $dados->id : 'Novo Pedido'}}</h3>
          </div>
        </div>
        <!-- End Page Header -->
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <!-- Add New Post Form -->
            <div class="card card-small mb-3">
                <form class="add-new-post" action="{{isset($dados) ? route('pedido.update',$dados->id) : route('pedido.store')}}" method="POST">
                    @csrf
                  @if(isset($dados))
                    <input name="_method" type="hidden" value="PUT">
                    @else

                    @endif
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <label for="cliente_id">Cliente</label>
                              <div class="input-group">
                                  
                                  <select id="cliente_id" name="cliente_id" class="custom-select form-control-lg js-example-responsive">
                                    <option selected disabled>Selecione um cliente</option>
                                    @foreach ($clientes as $cliente)
                                    <option value="{{$cliente->id}}">{{$cliente->nome}}</option>
                                    @endforeach
                                  </select>
                                  
                              </div>
 
                            </div>
                            <div class="col-4">
                                <label for="CPF">Vendendor(a)</label>
                                <input class="form-control form-control-lg mb-3" type="text" id="vendedor_id" value="{{isset(Auth::user()->id) ? Auth::user()->id . ' - ' . Auth::user()->name : '' }}" readonly>
                                <input class="form-control form-control-lg mb-3" type="text" id="vendedor_id" name="vendedor_id" value="{{isset(Auth::user()->id) ? Auth::user()->id : '' }}" hidden>
                            </div>
                            <div class="col-4">
                                <label for="valor_total">Valor Total</label>
                                <input class="form-control form-control-lg mb-3 valor_total" type="text" placeholder="000.00" id="valor_total" name="valorTotal" value="" readonly>
                            </div>
                            <div class="col-4">
                                <label for="desconto">Desconto</label>
                                <input class="form-control form-control-lg mb-3 desconto" type="text" placeholder="000.00" id="desconto" name="desconto" value="" data-mask="##0.00" data-mask-reverse="true">
                            </div>
                            <div class="col-4">
                                <label for="sub_total">Sub Total</label>
                                <input class="form-control form-control-lg mb-3 sub_total" type="text" placeholder="000.00" id="sub_total" name="subTotal" value="" readonly>
                            </div>
                        </div>

                        <div class="card card-small mb-4">
                            <div class="card-header border-bottom">
                                <h6 class="m-0">Lista de compras</h6>
                            </div>
                            <div class="card-body p-0 pb-3 text-center">
                                <table id="table" class="table dshy-table mb-0">
                                <thead class="bg-light">
                                    <tr class="cabecalho">
                                    <th scope="col" class="border-0">Produto</th>
                                    <th scope="col" class="border-0">Valor Unitário</th>
                                    <th scope="col" class="border-0">Quantidade</th>  
                                    <th scope="col" class="border-0">Valor Total</th>
                                    <th scope="col" class="border-0"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @if(isset($pedidos))
                                  @php $counter = 0 @endphp
                                    @foreach ($pedidos as $pedido)
                  
                                    <tr>
                                        <td>
                                          <select class="custom-select form-control-lg table-select" name="contato[{{$counter}}][tipo]">
                                            @foreach($produtos as $produto)
                                            <option value="{{$produto->id}}">{{$produto->nome}}</option>
                                            @endforeach
                                          </select>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control form-control-lg" name="contato[{{$counter}}][telefone]" value="">
                                          </td>
                                        <td>
                                          <input type="text" class="form-control form-control-lg" name="contato[{{$counter}}][obs]" placeholder="Observação" value="{{isset($contato->obs) ? $contato->obs : ''}}">
                                        </td>
                                        <td><a class="btn btn-danger delLinha" style="color:#fff"><i class="material-icons">delete</i></a></td>
                                        </tr>
                                        @php ($counter = $counter+1) @endphp
                                    @endforeach
                                  @else
                                  <tr>
                                      <td>
                                        <select class="custom-select form-control-lg produto_id table-select" name="pedido[0][produto_id]">
                                            <option selected disabled>Selecione um produto</option>
                                          @foreach($produtos as $produto)
                                              <option value="{{$produto->id}}" data-info="{{$produto->valor_venda}}">{{$produto->nome}}</option>
                                          @endforeach
                                        </select>
                                      </td>
                                      <td>
                                          <input type="text" class="form-control form-control-lg valor_unitario" name="pedido[0][valor_unitario]" value="0.00" readonly>
                                      </td>
                                      <td>
                                          <input type="number" class="form-control form-control-lg quantidade" name="pedido[0][quantidade]" value="">
                                      </td>
                                      <td>
                                        <input type="text" class="form-control form-control-lg valor_multiplicado" name="pedido[0][valor_multiplicacao]" placeholder="Valor total" value="" readonly>
                                      </td>
                                      <td><a class="btn btn-danger delLinha" style="color:#fff"><i class="material-icons">delete</i></a></td>
                                      </tr>
                                  @endif
                                </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                                <hr>
                                <div class="d-flex justify-content-end">
                                    <a class="btn btn-sm btn-success" style="color:#fff;" id="addLinha">+ Adicionar produto</a>
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
                </form>
            </div>
            <!-- / Add New Post Form -->
          </div>
        </div>

@endsection

@section('scripts')
  <script>
    $(document).ready(function(){

      $(".js-example-responsive").select2({
        width: '100%',
      });

      function loadSelect2(){
        $(".table-select").select2({
          width: '100%',
        });
      }

      var counter = $('tbody').children('tr').length;

      $('#addLinha').on('click', function(){
        var novaLinha = $("<tr>");
        var cols = "";

        cols += '<td><select class="custom-select form-control-lg produto_id table-select" name="pedido[' + counter + '][produto_id]"><option selected disabled>Selecione um produto</option> @foreach($produtos as $produto) <option value="{{$produto->id}}" data-info="{{$produto->valor_venda}}">{{$produto->nome}}</option> @endforeach </select> </td>';
        cols += '<td><input type="text" class="form-control form-control-lg valor_unitario" name="pedido[' + counter + '][valor_unitario]" value="0.00" readonly></td>';
        cols += '<td><input type="number" class="form-control form-control-lg quantidade" name="pedido[' + counter + '][quantidade]" value=""></td>';
        cols += '<td><input type="text" class="form-control form-control-lg valor_multiplicado" name="pedido[' + counter + '][valor_multiplicacao]" placeholder="Valor total" value="" readonly> </td>';
        cols += '<td><a style="color:#fff" class="btn btn-danger delLinha"><i class="material-icons">delete</i></a></td>';

        novaLinha.append(cols);
        $("table.dshy-table").append(novaLinha);
        counter++;
        loadSelect2();
      });

      $('table.dshy-table').on('click', '.delLinha', function(e){
        $(this).closest("tr").remove();       
        // counter -= 1
      })

      loadSelect2();
    });

    $('table').on('change', function(){
      $(this).find('tr').each(function(){
        var valor_unitario = $(this).find('.produto_id').find('option:selected').map(function() {
        return $(this).data('info');
        }).get().join(',');
        var quantidade = $(this).find('.quantidade').val();
        var total = (Number(quantidade) * Number(valor_unitario));

        $(this).find('.valor_unitario').val(Number(valor_unitario).toFixed(2));
        $(this).find('.valor_multiplicado').val((Number(Math.round(total * 100) / 100)).toFixed(2));        
      });
    
      var sum = 0;
      $(this).find('tr').each(function () {
        
        $(this).find('.valor_multiplicado').each(function () {
            sum += Number($(this).val());
        });
        $('.valor_total').val(sum.toFixed(2));
    });
    
    $('.desconto, table').on('change', function(){
      var desconto = $('.desconto').val();
      var total = $('.valor_total').val();
      $('.sub_total').val((Math.round((Number(total) - Number(desconto)) * 100) / 100).toFixed(2));
    });
    
    });
  </script>
@endsection