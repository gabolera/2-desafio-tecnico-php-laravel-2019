<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function index()
    {
        $dados = Cliente::all();
        return view('clientes.list')->with(['page' => 'cliente', 'dados' => $dados]);
    }

    public function create()
    {
        return view('clientes.form')->with(['page' => 'cliente']);
    }

    public function store(Request $request)
    {
        $contatos = json_encode($request->contato);

        $cliente = new Cliente;
        $cliente->nome = $request->nome;
        $cliente->cpf = $request->cpf;
        $cliente->email = $request->email;
        $cliente->contatos = $contatos;
        $cliente->save();

        $msg = 'Cliente cadastrado com sucesso!';

        return redirect()->route('cliente.index')->with(['success' => $msg,]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $dados = Cliente::find($id);
        $contatos = json_decode($dados->contatos);
        return view('clientes.form')->with(['page' => 'cliente', 'dados' => $dados, 'contatos' => $contatos]);
    }

    public function update(Request $request, $id)
    {
        $contatos = json_encode($request->contato);

        $cliente = Cliente::find($id);
        $cliente->nome = $request->nome;
        $cliente->cpf = $request->cpf;
        $cliente->email = $request->email;
        $cliente->contatos = $contatos;
        $cliente->update();

        $msg = 'O Cliente ' . $cliente->nome . ' foi editado com sucesso!';

        return redirect()->route('cliente.index')->with(['success' => $msg]);
    }

    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();

        $msg = 'O Cliente ' . $cliente->nome . ' foi removido com sucesso';
        return redirect()->back()->with(['success' => $msg ]);
    }
}
