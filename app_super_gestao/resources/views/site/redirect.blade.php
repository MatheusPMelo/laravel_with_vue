@extends('site.layout.basico')

@section('titulo', $titulo)

@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <h1>Obrigado, logo retornaremos o contato</h1>
        <a href="{{route('site.index')}}">Voltar</a>
    </div>
</div>
@endsection
