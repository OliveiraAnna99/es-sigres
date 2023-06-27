@extends('home')

@section('title', __('pedido.detail'))

@section('content')
<div class="containerShow">
  <div class="cardShow">
    <h1>{{ __('pedido.detail') }}</h1>
    <div class="containerTable">
      <table class="table">
        <tbody>
          <tr>
            <th>{{ __('pedido.item') }}</th>
            <th>{{ __('pedido.status') }}</th>
            <th>{{ __('pedido.numero_mesa') }}</th>
          </tr>
          <tr>
            <td>
            @foreach($cardapios as $cardapio)
                  @if($cardapio->id == $pedido->cardapio_id)
                  {{ $cardapio->nome}}
                  @endif
              @endforeach  

            </td>
            <td>
            @if($pedido->status == 1)
                  Em Andamento
              @elseif($pedido->status == 2)
                  Concluído
              @else
                  Não Encontrado
              @endif
            </td>
            <td>{{ $pedido->numero_mesa }}</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="btnShowStock">
      @can('update', $pedido)
      <a href="{{ route('pedidos.edit', $pedido) }}" id="edit-pedido-{{ $pedido->id }}"
        class="btn">{{ __('pedido.edit') }}</a>
      @endcan
      <a href="{{ route('pedidos.index') }}" class="btn btnSecondary">{{ __('Voltar') }}</a>


  <form method="POST" action="{{ route('pedidos.destroy', $pedido) }}" accept-charset="UTF-8"
    class="del-form float-right">
    {{ csrf_field() }}
    {{ method_field('delete') }}
    <input name="pedido_id" type="hidden" value="{{ $pedido->id }}">
    <button type="submit" class="btn btnPrimary">Deletar</button>
  </form>
</div>

  </div>
</div>
@endsection