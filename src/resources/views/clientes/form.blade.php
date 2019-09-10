@extends('layouts.app')

@section('title', isset($dados) ? 'Editando Cliente' : 'Cadastrar novo cliente')
    

@section('content')
        <!-- Page Header -->
        <div class="page-header row no-gutters py-4">
          <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Cliente</span>
            @if(!empty($readonly))
            <h3 class="page-title">{{isset($dados) ? 'Dados de ' . $dados->nome : ''}}</h3>
                
            @else
            <h3 class="page-title">{{isset($dados) ? 'Você está editando ' . $dados->nome : 'Cadastrar Novo cliente'}}</h3>
            @endif

          </div>
        </div>
        <!-- End Page Header -->
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <!-- Add New Post Form -->
            <div class="card card-small mb-3">
                <form class="add-new-post" action="{{isset($dados) ? route('cliente.update',$dados->id) : route('cliente.store')}}" method="POST">
                    @csrf
                  @if(isset($dados))
                    <input name="_method" type="hidden" value="PUT">
                    @else

                    @endif

                    @php
                         if(!empty(Session::get('old_return'))){
                          $dados = Session::get('old_return');
                        }
                    @endphp
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <label for="nome">Nome do Cliente</label>
                                <input class="form-control form-control-lg mb-3" type="text" placeholder="Nome do cliente" id="nome" name="nome" value="{{isset($dados->nome) ? $dados->nome : old('nome') }}" autofocus required {{!empty($readonly) ? 'readonly' : ''}}>
                            </div>
                            <div class="col-4">
                                <label for="CPF">CPF</label>
                                <input class="form-control form-control-lg mb-3" type="text" placeholder="000.000.000-00" id="CPF" name="cpf" value="{{isset($dados->cpf) ? $dados->cpf : old('cpf') }}" data-mask="000.000.000-99" data-mask-reverse="true" required {{!empty($readonly) ? 'readonly' : ''}}>
                            </div>
                            <div class="col-12">
                                <label for="email">Email</label>
                                <input class="form-control form-control-lg mb-3" type="email" placeholder="meuemail@host.com" id="email" name="email" value="{{isset($dados->email) ? $dados->email : old('email') }}" required {{!empty($readonly) ? 'readonly' : ''}}>
                            </div>
                        </div>

                        <div class="card card-small mb-4">
                            <div class="card-header border-bottom">
                                <h6 class="m-0">Contato</h6>
                            </div>
                            <div class="card-body p-0 pb-3 text-center">
                                <table id="table" class="table dshy-table mb-0">
                                <thead class="bg-light">
                                    <tr>
                                    <th scope="col" class="border-0">Telefone</th>
                                    <th scope="col" class="border-0">Tipo Telefone</th>
                                    <th scope="col" class="border-0">Observação</th>
                                    <th scope="col" class="border-0"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                  {{-- @if ($contatos = Session::get('contatos'))
                                  @endif --}}

                                  @php
                                      if(!empty(Session::get('return_contatos'))){
                                        $contatos = Session::get('return_contatos');
                                      }
                                  @endphp

                                  @if(isset($contatos))
                                  @php $counter = 0 @endphp
                                    @foreach ($contatos as $contato)
                                    <tr>
                                    <td>
                                      <input type="text" class="form-control form-control-lg" name="contato[{{$counter}}][telefone]" placeholder="(00) 00000-0000" value="{{isset($contato->telefone) ? $contato->telefone : ''}}" {{!empty($readonly) ? 'readonly' : ''}}>
                                    </td>
                                        <td>
                                          <select class="custom-select form-control-lg" name="contato[{{$counter}}][tipo]" {{!empty($readonly) ? 'readonly' : ''}}>
                                            <option value="0" {{ ($contato->tipo == '0' ? 'selected' : '')}}>Celular</option>
                                            <option value="1" {{ ($contato->tipo == '1' ? 'selected' : '')}}>Fixo</option>
                                            <option value="2" {{ ($contato->tipo == '2' ? 'selected' : '')}}>Comercial</option>
                                          </select>
                                        </td>
                                        <td>
                                          <input type="text" class="form-control form-control-lg" name="contato[{{$counter}}][obs]" placeholder="Observação" value="{{isset($contato->obs) ? $contato->obs : ''}}" {{!empty($readonly) ? 'readonly' : ''}}>
                                        </td>
                                        @if(!empty($readonly))

                                        @else
                                        <td><a class="btn btn-danger delLinha" style="color:#fff"><i class="material-icons">delete</i></a></td>
                                        @endif
                                        </tr>
                                        @php ($counter = $counter+1) @endphp
                                    @endforeach
                                  @else
                                    <tr>
                                    <td><input type="text" class="form-control form-control-lg" name="contato[0][telefone]" placeholder="(00) 00000-0000"></td>
                                    <td><select class="custom-select form-control-lg" name="contato[0][tipo]"><option value="0" selected>Celular</option><option value="1">Fixo</option><option value="2">Comercial</option></select></td>
                                    <td><input type="text" class="form-control form-control-lg" name="contato[0][obs]" placeholder="Observação"></td>
                                    <td><a class="btn btn-danger delLinha" style="color:#fff"><i class="material-icons">delete</i></a></td>
                                    </tr>
                                  @endif
                                </tbody>
                                </table>
                            </div>                            @if(!empty($readonly))
                                        
                            @else
                            <div class="card-footer">
                                <hr>
                                <div class="d-flex justify-content-end">
        
                                    <a class="btn btn-sm btn-success" style="color:#fff;" id="addLinha">+ Adicionar contato</a>
                                    
                                </div>
                            </div>
                            @endif
                        </div>
                
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <div>
 
                            @if(!empty($readonly))
                            <a href="{{route('pedido.index')}}" class="btn btn-outline-secondary">
                                <i class="material-icons">replay</i> Voltar
                            </a>  
                            @else
                            <a href="{{route('cliente.index')}}" class="btn btn-outline-secondary">
                                <i class="material-icons">cancel</i> Cancelar
                            </a>
                            <button class="btn btn-primary ml-auto" type="submit">
                                <i class="material-icons">file_copy</i> Salvar
                            </button>
                            @endif
                           
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
      
      var counter = $('tbody').children('tr').length;

      $('#addLinha').on('click', function(){
        var novaLinha = $("<tr>");
        var cols = "";

        cols += '<td><input type="text" class="form-control form-control-lg" name="contato[' + counter + '][telefone]" placeholder="(00) 00000-0000"></td>';
        cols += '<td><select class="custom-select form-control-lg" name="contato[' + counter + '][tipo]"><option value="0" selected>Celular</option><option value="1">Fixo</option><option value="2">Comercial</option></select></td>';
        cols += '<td><input type="text" class="form-control form-control-lg" name="contato[' + counter + '][obs]" placeholder="Observação"></td>';
        cols += '<td><a style="color:#fff" class="btn btn-danger delLinha"><i class="material-icons">delete</i></a></td>';
        novaLinha.append(cols);
        $("table.dshy-table").append(novaLinha);
        counter++;
      });

      $('table.dshy-table').on('click', '.delLinha', function(e){
        $(this).closest("tr").remove();       
        // counter -= 1
      })
    });
  </script>
@endsection