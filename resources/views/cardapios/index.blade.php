@extends('home')

@section('title', __('cardapio.list'))

@section('content')

<div class="section">
  <div class="topSection">
    @can('cardapio.create')
    <a href="{{ route('cardapios.create') }}" class="btn btnPrimary btnAdd">
      <x-bi-plus-circle class="icon" />
      <p>Adicionar item</p>
    </a>
    @endcan
    <form class='form-search' method="GET" action="" accept-charset="UTF-8" class="form-inline">
      <div class="formGroup">
        <input class="input-search" placeholder="Pesquise por um funcionário..." name="q" type="text" id="q" class="form-control mx-sm-2" value="{{ request('q') }}">
      </div>
      <button type="submit" class="btnSecondary btn btnReset"><x-bi-search class="m-1"></x-bi-search></button>
      <a href="{{ route('cardapios.index') }}" class="btnReset btn btnPrimary">Limpar</a>
    </form>
  </div>

  <div>
    <div>
      <div class="containerTable">
        <table class="table">
          <tr>
            <th>Nome</th>
            <th>Valor</th>
            <th>Ações</th>
          </tr>

          @foreach($cardapios as $key => $cardapio)
          <tr>
            <td>{{ $cardapio->nome }}</td>
            <td>R$ {{ $cardapio->valor }}</td>


            <td>
              <div class="buttons">

                <a href="{{ route('cardapios.show', $cardapio) }}">
                  <button class="btnSecondary">
                    <p>Ver</p>
                  </button>
                </a>

                <a href="{{ route('cardapios.edit', $cardapio) }}">
                  <button class="btnSecondary">
                    <x-bi-pen></x-bi-pen>
                  </button>
                </a>

                @can('cardapio.delete')
                <form method="POST" action="{{ route('cardapios.destroy', $cardapio) }}" accept-charset="UTF-8">
                  {{ csrf_field() }} {{ method_field('delete') }}
                  <input name="cardapio_id" type="hidden" value="{{ $cardapio->id }}">
                  <button type="submit" class="btnPrimary trash">
                    <x-bi-trash />
                  </button>
                </form>
                @endcan

              </div>
            </td>
          </tr>
          @endforeach

        </table>
      </div>
    </div>
  </div>
</div>

@endsection