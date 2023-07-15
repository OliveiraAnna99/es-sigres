@extends('home')

@section('title', __('cardapio.detail'))

@section('content')

<div class="cardContainer">
    <div class="cardContainerContent">
        <div class="cardShow">
            <div class="cardBody">
                <div>
                    <p class="funcTitle">{{ __('cardapio.name') }}</p>
                    <p>{{ $cardapio->nome }}</p>
                </div>
                <div>
                    <p class="funcTitle">{{ __('cardapio.ingredientes') }}</p>
                    @foreach ($cardapio->estoques as $estoque)
                        <li>{{ $estoque->item }}</li>
                    @endforeach

                </div>

                <div>
                    <p class="funcTitle">{{ __('cardapio.valor') }}</p>
                    <p>{{ $cardapio->valor }}</p>
                </div>

            </div>
            <div class="cardFooter">
                <a href="{{ route('cardapios.index') }}" class="btn btnPrimary">
                    <p>Voltar</p>
                </a>

            </div>
        </div>
    </div>
    @endsection