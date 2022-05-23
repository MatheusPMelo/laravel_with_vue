<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fornecedor;

class FornecedorController extends Controller
{
    public function index()
    {
        return view('app.fornecedor.index');
    }

    public function listar(Request $request)
    {
        //pesquisando os atributos no banco de dados
        $fornecedores = Fornecedor::where('nome', 'like', '%'.$request->input('nome').'%')
            ->where('site', 'like', '%'.$request->input('site').'%')
            ->where('uf', 'like', '%'.$request->input('uf').'%')
            ->where('email', 'like', '%'.$request->input('email').'%')
            ->paginate(5);  

        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all() ]);
    }

    public function adicionar(Request $request)
    {

        $msg = '';
        //inclusão
        if($request->input('_token') != '' && $request-> input('id') == ''){
            $regras = [
                'nome'  => 'required | min:3 | max:180',
                'site'  => 'required | min:3',
                'uf'    => 'required | min:2 | max:2',
                'email' => 'email'
            ];

            $feedback = [
                'required' => 'O campo :attribute é obrigatório.',
                'min' => 'O campo deve ter no mínimo 3 caracteres',
                'nome.max'   => 'O campo deve ter no máximo 180 caracteres',
                'uf.min'    => 'No mínimo 2 caracteres',
                'uf.max'    => 'No máximo 2 caracteres',
                'email'     => 'Digite um email váilido'
            ];

            $request -> validate($regras, $feedback);

            $fornecedor = new Fornecedor();

            $fornecedor->create($request->all());

            $msg = 'Dados cadastrados com sucesso!';
         
        }

        //edição
        if($request->input('_token') != '' && $request-> input('id') != ''){
            $fornecedor = Fornecedor::find($request->input('id'));

            $regras = [
                'nome'  => 'min:3 | max:180',
                'site'  => 'min:3',
                'uf'    => 'min:2 | max:2',
                'email' => 'email'
            ];

            $feedback = [
                'min' => 'O campo deve ter no mínimo 3 caracteres',
                'nome.max'   => 'O campo deve ter no máximo 180 caracteres',
                'uf.min'    => 'No mínimo 2 caracteres',
                'uf.max'    => 'No máximo 2 caracteres',
                'email'     => 'Digite um email váilido'
            ];

            $request -> validate($regras, $feedback);

            $update = $fornecedor->update($request->all());

            if($update){
                $msg = 'Edição realizada com sucesso.';
            }else{
                $msg = 'Houve um problema durante a edição.';
            }

            return redirect() -> route('app.fornecedor.editar', ['id' => $request->input('id'),'msg' => $msg]);

        }

        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }

    public function editar($id, $msg = '')
    {

        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' => $msg]);
    }
}
