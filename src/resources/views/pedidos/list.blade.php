@extends('layouts.app')

@section('title', 'Listando Clientes')

@section('content')

<div class="card card-small mb-4 mt-4">
        <div class="card-header border-bottom mt-2">
            <div class="row">
                <div class="col-6">
                    <h5><strong>Listando Cleintes</strong><h5>
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
                        <a href="{{route('cliente.destroy', $dado->id)}}" class="btn btn-sm btn-danger">Deletar</a>
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
</script>
@endsection