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
    <form class='form-search' method="GET" action="" accept-charset="UTF-8" class="form-inline">
      <div class="formGroup">
        <input class="input-search" placeholder="Pesquise por um funcionário..." name="q" type="text" id="q" class="form-control mx-sm-2" value="{{ request('q') }}">
      </div>
      <button type="submit" class="btnSecondary btn btnReset"><x-bi-search class="m-1"></x-bi-search></button>
      <a href="{{ route('funcionarios.index') }}" class="btnReset btn btnPrimary">Limpar</a>
    </form>
  </div>
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
</div>

@endsection