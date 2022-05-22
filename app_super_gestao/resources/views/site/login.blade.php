@extends('site.layout.basico')

@section('titulo', $titulo)

@section('conteudo')


<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <h1>Login</h1>
    </div>
    <div style="width: 30%; margin-left:auto; margin-right:auto;">
        <div class="informacao-pagina">
            <form action="{{route('site.login')}}" method="post">
                @csrf
                <input value="{{ old('usuario') }}" name="usuario" type="text" placeholder="usuario" class="borda-preta">
                @if($errors->has('usuario'))
                    {{$errors -> first('usuario')}}
                @endif
                <input value="{{ old('senha') }}" name="senha" type="password" placeholder="senha" class="borda-preta">
                @if($errors->has('senha'))
                    {{$errors -> first('senha')}}
                @endif
                <button type="submit" class="borda-preta">Acessar</button>
            </form>
            @if (isset($erro) && $erro != '')
                {{print_r($erro)}}
            @else
                {{""}}
            @endif
        </div>
    </div>
</div>

<div class="rodape">
    <div class="redes-sociais">
        <h2>Redes sociais</h2>
        <img src="{{ asset('img/facebook.png') }}">
        <img src="{{ asset('img/linkedin.png') }}">
        <img src="{{ asset('img/youtube.png') }}">
    </div>
    <div class="area-contato">
        <h2>Contato</h2>
        <span>(11) 3333-4444</span>
        <br>
        <span>supergestao@dominio.com.br</span>
    </div>
    <div class="localizacao">
        <h2>Localização</h2>
        <img src="{{ asset('img/mapa.png') }}">
    </div>
</div>
@endsection
