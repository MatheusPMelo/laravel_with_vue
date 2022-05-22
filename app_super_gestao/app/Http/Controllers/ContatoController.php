<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato; //Chamando a model do sitecontato que salvará os dados no banco de dados
use App\MotivoContato;

class ContatoController extends Controller
{
    public function contato() {

        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['titulo' => 'Contato', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request)
    {

        $regras = [
            'nome' => 'required|min:3|max:80|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'email|unique:site_contatos',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:200'
        ];

        $feedback = [
            'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome precisa ter no máximo 80 caracteres',
            'email.email' => 'O campo email é obrigatório seguir os padrões de preenchimento de email',
            'email.unique' => 'Este email já foi usado, tente outro por favor',
            'mensagem.max' => 'Máximo de 200 caracteres',

            //mensagem genérica
            'required' => 'O campo :attribute é obrigatório'
        ];

        $request -> validate($regras, $feedback);

        SiteContato::create($request->all());

        return redirect() -> route('site.redirect');
    }

    public function redirected()
    {
        return view('site.redirect', ['titulo' => 'Valeu!']);
    }
}
