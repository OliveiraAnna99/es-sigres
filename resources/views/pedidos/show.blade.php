@extends('home')

@section('title', __('pedido.detail'))

@section('content')
<div class="cardContainer">
    <div class="cardContainerContent">
        <div class="cardShow">
            <div class="cardBody">
                <div>
                    <p class="funcTitle">{{ __('pedido.item') }}</p>
                    <p>
                        @foreach ($pedido->cardapios as $cardapio)
                            <li>{{ $cardapio->nome }}</li>
                        @endforeach

                    </p>
                </div>
                <div>
                    <p class="funcTitle">{{ __('pedido.status') }}</p>
                    <p>
                        @if($pedido->status == 1)
                        Em Andamento
                        @elseif($pedido->status == 2)
                        Concluído
                        @else
                        Não Encontrado
                        @endif
                    </p>
                </div>
                <div>
                    <p class="funcTitle">{{ __('pedido.numero_mesa') }}</p>
                    <p>{{ $pedido->numero_mesa }}</p>
                </div>

                <div>
                    <p class="funcTitle">Observação</p>
                    <p>{{$pedido->obs}}</p>
                </div>
             
            </div>
            <div class="cardFooter">
                <a href="{{ route('pedidos.index') }}" class="btn btnPrimary">{{ __('Voltar') }}</a>
            </div>
        </div>
    </div>
</div>

@endsection