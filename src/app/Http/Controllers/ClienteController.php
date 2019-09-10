<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


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

        $validator = Validator::make($request->all(), [
            'nome' => 'required',
            'cpf' => 'required|unique:clientes|max:14|min:14',
            'email' => 'required'
        ],
        [
            'cpf.required' => 'Está faltando o CPF!',
            'cpf.unique' => 'Este CPF já está cadastrado!',
            'cpf.max' => 'Ops... isso não parece um CPF...',
            'cpf.min' => 'Ops... O CPF está incompleto!',
            'nome.required' => 'É necessário dar um nome ao cliente!',
            'email.required' => 'É necessário ter um email',
        ]);

        if($validator->fails()) {
            $contatos_return = json_decode($contatos);
            return redirect()->back()->with(['return_contatos' => $contatos_return])->withErrors($validator)->withInput();
        }

        $data = $request->all();
    
        $cliente = new Cliente;
        $cliente->nome = $request->nome;
        $cliente->cpf = $request->cpf;
        $cliente->email = $request->email;
        $cliente->contatos = $contatos;
        $cliente->save();

        $msg = 'Cliente cadastrado com sucesso!';
    
        return redirect()->route('cliente.index')->with(['success' => $msg]);

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

        $validator = Validator::make($request->all(), [
            'nome' => 'required',
            'cpf' => 'required|max:14|min:14',
            'email' => 'required'
        ],
        [
            'cpf.required' => 'Está faltando o CPF!',
            'cpf.max' => 'Ops... isso não parece um CPF...',
            'cpf.min' => 'Ops... O CPF está incompleto!',
            'nome.required' => 'É necessário dar um nome ao cliente!',
            'email.required' => 'É necessário ter um email',
        ]);

        if($validator->fails()) {
            $contatos_return = json_decode($contatos);
            $oldReturn = ['nome' => $request->nome,'email' => $request->email,'cpf' => $request->cpf];
            return redirect()->back()->with(['return_contatos' => $contatos_return, 'old_return' => $oldReturn])->withErrors($validator)->withInput();
        }


        $cliente = Cliente::find($id);
        $cliente->nome = $request->nome;
        $cliente->cpf = $request->cpf;
        $cliente->email = $request->email;
        $cliente->contatos = $contatos;
        $cliente->update();

        $msg = 'O Cliente ' . $cliente->nome . ' foi editado com sucesso!';

        return redirect()->route('cliente.index')->with(['success' => $msg, 'contatos' => json_decode($contatos)]);
    }

    public function destroy(Request $request)
    {
        $cliente = Cliente::find($request->id);
        $cliente->delete();

        $msg = 'O Cliente ' . $cliente->nome . ' foi removido com sucesso';
        return redirect()->back()->with(['success' => $msg ]);
    }

    public function MultipleDestroy(request $request){

        $array = $request->selected;
        
        foreach($array as $item){
            $cliente = Cliente::find($item);
            $cliente->delete();
        }

        $msg = 'Operação realizada com sucesso!';
        return redirect()->back()->with(['success' => $msg ]);
    }

}
