<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

use App\Models\Pedido;

class DashboardController extends Controller
{

    public function index()
    {
        $total_vendido_hoje = Pedido::where('dataPedido', Carbon::now()->format('Y/m/d'))->sum('subTotal');
        $vendas_hoje = Pedido::where('dataPedido', Carbon::now()->format('Y/m/d'))->count();
        return view('dashboard.index')->with([
            'page' => 'dashboard', 
            'vendas_hoje' => $vendas_hoje, 
            'total_vendido_hoje' => $total_vendido_hoje,
        ]);
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
