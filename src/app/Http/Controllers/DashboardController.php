<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Models\Pedido;

class DashboardController extends Controller
{

    public function index()
    {
        $vendas_hoje = Pedido::where('dataPedido', '2019-09-06')->sum('subTotal');
        return view('dashboard.index')->with(['page' => 'dashboard', 'vendas_hoje' => $vendas_hoje]);
    }

    public function error()
    {
        return view('dashboard.error');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
