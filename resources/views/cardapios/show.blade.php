@extends('home')

@section('title', __('cardapio.detail'))

@section('content')

<div class="cardContainer">
    <div class="cardContainerContent">
        <div class="cardBody">
          
            <div>
                <p class="funcTitle">{{ __('cardapio.name') }}</p>
                <p>{{ $cardapio->nome }}</p>
            </div>
            <div>
                <p class="funcTitle">{{ __('cardapio.ingredientes') }}</p>
                <p>{{ $cardapio->ingredientes }}</p>
            </div>
           
            <div>
                <p class="funcTitle">{{ __('cardapio.valor') }}</p>
                <p>{{ $cardapio->valor }}</p>
            </div>
           
        </div>
        <div class="cardFooter">
            @can('cardapio.update')
            <a href="{{ route('cardapios.edit', $cardapio) }}" class="btn btnSecondary">
                <p>{{__('cardapio.edit')}}</p>
            </a>
            @endcan
            @can('cardapio.delete')

            <form method="POST" action="{{ route('cardapios.destroy', $cardapio) }}" accept-charset="UTF-8" class="del-form float-right" style="display: inline;">
                {{ csrf_field() }} {{ method_field('delete') }}
                <input name="cardapio_id" type="hidden" value="{{ $cardapio->id }}">
                <button type="submit" class="btn btnPrimary">{{__('cardapio.delete')}}</button>
            </form>
            @endcan

        </div>
    </div>
</div>
@endsection