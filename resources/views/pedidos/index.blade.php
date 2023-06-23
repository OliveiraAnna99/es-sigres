@extends('home')

@section('title', __('pedido.list'))

@section('content')

<div class="section">
  <div>
    <a href="{{ route('pedidos.create') }}" class="btn btnPrimary btnAdd">
      <x-bi-plus-circle class="icon" />
      <p> Realizar pedido
      </p>
    </a>
  </div>

  <div>
    <div>
      <div class="containerTable">
        <table class="table">
          <tr>
            <th>{{ __('pedido.item') }}</th>
            <th>{{ __('pedido.status') }}</th>
            <th>{{ __('pedido.numero_mesa') }}</th>
          </tr>
          <tr>
            @foreach($pedidos as $pedido)
            <td>{{ $pedido->cardapio_id}}</td>
            <td>{{ $pedido->status }}</td>
            <td>{{ $pedido->numero_mesa }}</td>
            <td>
              <div class="buttons">
                <button class="btnSecondary">
                  <a href="{{ route('pedidos.edit', $pedido) }}">
                    Editar
                  </a>
                </button>



                <form method="POST" action="{{ route('pedidos.destroy', $pedido) }}" accept-charset="UTF-8">
                  {{ csrf_field() }} {{ method_field('delete') }}
                  <input name="pedido_id" type="hidden" value="{{ $pedido->id }}">
                  <button type="submit" class="btnPrimary trash">
                    <x-bi-trash class="trash" />
                  </button>
                </form>

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
