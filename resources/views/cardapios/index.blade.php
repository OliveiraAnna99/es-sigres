@extends('home')

@section('title', __('cardapio.list'))

@section('content')

<div class="section">
  <div>
    @can('cardapio.create')
    <a href="{{ route('cardapios.create') }}" class="btn btnPrimary btnAdd">
      <x-bi-plus-circle class="icon" />
      <p>Adicionar item</p>
    </a>
    @endcan
  </div>

  <div>
    <div>
      <div class="containerTable">
        <table class="table">
          <tr>
            <th>Nome</th>
            <th>Valor</th>
            <th>Itens</th>
            <th>Ações</th>
          </tr>

          @foreach($cardapios as $key => $cardapio)
          <tr>
            <td>{{ $cardapio->nome }}</td>
            <td>R$ {{ $cardapio->valor }}</td>
            <td>
              @foreach($cardapio->estoques as $estoque)  
                 {{ $estoque->item }}
              @endforeach
            </td>
       
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