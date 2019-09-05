<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Produto;


class ProdutoController extends Controller
{

    public function index()
    {
        $dados = Produto::all();
        return view('produtos.list')->with(['page' => 'produto', 'dados' => $dados]);
    }

    public function create()
    {
        return view('produtos.form');
    }

    public function store(Request $request)
    {
        $qrCode = $request->qrCode;
        $code_alterado = null;

        while(Produto::where('qrCode', '=', $qrCode)->count() > 0) {
            $qrCode = Str::random(20);
            $code_alterado = 'Ops... Esse código QR já existia, o sistema substituiu esse QRCode automaticamente';
        }

        $produto = new Produto;
        $produto->nome = $request->nome;
        $produto->valor_compra = str_replace(',', '.', str_replace('.', '', $request->valor_compra));
        $produto->valor_venda = str_replace(',', '.',str_replace('.', '', $request->valor_venda));
        $produto->barCode = $request->barCode;
        $produto->qrCode = $qrCode;
        $produto->save();

        $msg = 'Produto cadastrado com sucesso!';

        return redirect()->route('produto.index')->with(['success' => $msg, 'warning' => $code_alterado]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $dados = Produto::find($id);

        return view('produtos.form')->with(['dados' => $dados]);
    }

    public function update(Request $request, $id)
    {
        $produto = Produto::find($id);

        $qrCode = $request->qrCode;
        $code_alterado = null;

        if($produto->qrCode != $qrCode){
            while(Produto::where('qrCode', '=', $qrCode)->count() > 0) {
                $qrCode = Str::random(20);
                $code_alterado = 'Ops... Esse código QR já existia, o sistema substituiu esse QRCode automaticamente';
            }    
        }else{

        }
    
        $produto->nome = $request->nome;
        $produto->valor_compra = str_replace(',', '.', str_replace('.', '', $request->valor_compra));
        $produto->valor_venda = str_replace(',', '.',str_replace('.', '', $request->valor_venda));
        $produto->barCode = $request->barCode;
        $produto->qrCode = $qrCode;
        $produto->update();

        $msg = 'Produto editado com sucesso!';

        return redirect()->route('produto.index')->with(['success' => $msg, 'warning' => $code_alterado]);
    }

    public function destroy($id)
    {
        $produto = Produto::find($id);
        $produto->delete();

        $msg = 'Produto deletado com sucesso';

        return redirect()->back()->with(['success' => $msg]);
    }

    public function search(Request $request){
        $search = $request->q;
        $result = Produto::where('qrCode', $search)->first();
        return $result;
    }
}
