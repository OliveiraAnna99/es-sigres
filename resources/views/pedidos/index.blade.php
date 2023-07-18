@extends('home')

@section('title', __('pedido.list'))

@section('content')

<div class="section">
    <div>
        @can('pedido.create')
        <a href="{{ route('pedidos.create') }}" class="btn btnPrimary btnAdd">
            <x-bi-plus-circle class="icon" />
            <p> Realizar pedido
            </p>
        </a>
        @endcan
    </div>

    <div>
        <div>
            <div class="containerTable">
                <table class="table">
                    <tr>
                        <th>{{ __('pedido.numero_mesa') }}</th>
                        <th>{{ __('pedido.status') }}</th>
                        <th>Ações</th>
                    </tr>
                    @foreach($pedidos as $pedido)
                    <tr>

                        <td>{{ $pedido->numero_mesa }}</td>
                        <td>
                            @if($pedido->status == 1)
                            Em Andamento
                            @elseif($pedido->status == 2)
                            Concluído
                            @else
                            Não Encontrado
                            @endif
                        </td>

                        <td>
                            <div class="buttons">
                                <a href="{{ route('pedidos.show', $pedido) }}">
                                    <button class="btnSecondary">
                                        Ver
                                    </button>
                                </a>
                                @can('pedido.update')
                                <a href="{{ route('pedidos.edit', $pedido) }}">
                                    <button class="btnSecondary">
                                        <x-bi-pen></x-bi-pen>
                                    </button>
                                </a>
                                @endcan

                                @can('pedido.delete')
                                <form method="POST" action="{{ route('pedidos.destroy', $pedido) }}" accept-charset="UTF-8">
                                    {{ csrf_field() }} {{ method_field('delete') }}
                                    <input name="pedido_id" type="hidden" value="{{ $pedido->id }}">
                                    <button type="submit" class="btnPrimary trash">
                                        <x-bi-trash />
                                    </button>
                                </form>
                                @endcan
                            </div>
                        </td>
                        @endforeach
                    </tr>

                </table>
            </div>
        </div>
    </div>
</div>





@endsection