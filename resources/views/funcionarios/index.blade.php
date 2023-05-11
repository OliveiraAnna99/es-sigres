@extends('home')

@section('title', __('funcionario.list'))

@section('content')

<div class="funcionarioSection">
    <div class="topSection">
        <a href="{{ route('funcionarios.create') }}" class="btn btnAddFunc">
            <x-bi-plus-circle class="icon" />
            <p>Adicionar funcionário</p>
        </a>


    </div>
    <div class="card">
        @foreach($funcionarios as $key => $funcionario)
        <div class="funcSection">
            <p class="funcName">{{$funcionario->nome}}</´>
            <p>{{$funcionario->funcao}}</p>
            <a href="{{ route('funcionarios.show', $funcionario) }}" class="btn btnShow">
                <p>ver</p>
            </a>
        </div>
        @endforeach
    </div>
</div>

@endsection