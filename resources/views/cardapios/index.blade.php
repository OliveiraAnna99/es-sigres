@extends('home')

@section('title', __('cardapio.list'))

@section('content')

<div class="section">
  <div class="topSection">
    <a href="{{ route('cardapios.create') }}" class="btn btnPrimary btnAdd">
      <x-bi-plus-circle class="icon" />
      <p>Adicionar cardápio</p>
    </a>
  </div>
  <div class="card">
    @foreach($cardapios as $key => $cardapio)
    <div class="funcSection">
      <p class="funcName">{{$cardapio->nome}}</´>
      <p class="subTitle">{{$cardapio->status}}</p>
      <a href="{{ route('cardapios.show', $cardapio) }}" class="btn btnPrimary btnShow">
        <p>ver</p>
      </a>
    </div>
    @endforeach
  </div>
</div>

@endsection