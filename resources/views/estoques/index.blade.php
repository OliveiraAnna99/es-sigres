@extends('home')

@section('title', __('estoque.list'))

@section('content')

<div class="section">

    <a href="{{ route('estoques.create') }}" class="btn btnPrimary btnAdd">
        <x-bi-plus-circle class="icon" />
        <p>Adicionar produto</p>
    </a>


</div>
<!-- <div class="topSection">
    <div class="card">
        @foreach($estoques as $key => $estoque)
        <div class="funcSection">
            <p class="funcName">{{$estoque->nome}}</´>
            <p>{{$estoque->funcao}}</p>
            <a href="{{ route('estoques.show', $estoque) }}" class="btn btnPrimary btnShow">
                <p>ver</p>
            </a>
        </div>
        @endforeach
    </div> -->
</div>

@endsection