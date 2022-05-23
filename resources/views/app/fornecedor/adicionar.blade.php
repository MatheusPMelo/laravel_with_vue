@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor - Adicionar</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{route('app.fornecedor.adicionar')}}">Novo</a></li>
                <li><a href="{{route('app.fornecedor')}}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            {{$msg ?? ''}}
            <div style="width: 30%; margin-left: auto; margin-right: auto;" >
                <form action="{{route('app.fornecedor.adicionar')}}" method="post">
                    <input type="hidden" name="id" value="{{$fornecedor -> id ?? ''}}">
                    @csrf
                    <input value="{{$fornecedor -> nome ?? old('nome')}}" type="text" name="nome" placeholder="Nome" id="borda-preta">
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
                    <input value="{{$fornecedor -> site ?? old('site')}}" type="text" name="site" placeholder="Site" id="borda-preta">
                    {{ $errors->has('site') ? $errors -> first('site') : '' }}
                    <input value="{{$fornecedor -> uf ?? old('uf')}}" type="text" name="uf"  placeholder="UF" id="borda-preta">
                    {{ $errors -> has('uf') ? $errors -> first('uf') : '' }}
                    <input value="{{ $fornecedor -> email ?? old('email')}}" type="text" name="email" placeholder="E-mail" id="borda-preta">
                    {{ $errors -> has('email') ? $errors -> first('email') : '' }}
                    <button type="submit" class="borda-preta">Adicionar</button>
                    
                </form>
            </div>
        </div>
    </div>

@endsection