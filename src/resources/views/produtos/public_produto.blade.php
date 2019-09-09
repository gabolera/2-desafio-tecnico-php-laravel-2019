@extends('layouts.header')

@section('content')
    <div class="container">
        <div class="container" style="">
            <div class="row" style="margin-top:5%">
                <div class="col-12 d-flex justify-content-center">
                    <h1>{{$dados->nome}}</h1>
                </div>
                <div class="col-12 d-flex justify-content-center">
                    <h3>Preço R$ {{$dados->valor_venda}}</h3>
                </div>
            </div>

        </div>
    </div>
@endsection
