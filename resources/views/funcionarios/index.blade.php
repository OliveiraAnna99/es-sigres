@extends('home')

@section('title', __('funcionario.list'))

@section('content')

<div class="section">
  <div class="topSection">
    @can('funcionario.create')
    <a href="{{ route('funcionarios.create') }}" class="btn btnPrimary btnAdd">
      <x-bi-plus-circle class="icon" />
      <p>Adicionar funcionário</p>
    </a>
    @endcan
  </div>
  @if($funcionarios->isEmpty())
  <div class="empty">
    <h1>Não há funcionários cadastrados</h1>
  </div>
  @else
  <div class="card">
    @foreach($funcionarios as $key => $funcionario)
    <div class="funcSection">
      <p class="funcName">#{{$funcionario->id}} - {{$funcionario->nome}}</´>
      <p class="subTitle">{{$funcionario->funcao}}</p>
      <a href="{{ route('funcionarios.show', $funcionario) }}" class="btn btnPrimary btnShow">
        <p>Ver</p>
      </a>
    </div>
    @endforeach
  </div>
  @endif
</div>

@endsection