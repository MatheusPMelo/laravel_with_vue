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
        $request -> validate([
            'nome' => 'required|min:3|max:80',
            'telefone' => 'required',
            'email' => 'required',
            'motivo_contato' => 'required',
            'mensagem' => 'required|max:200'
        ]);
    }
}
