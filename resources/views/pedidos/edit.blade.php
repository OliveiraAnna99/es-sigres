@extends('home')

@section('title', __('pedido.edit'))

@section('content')
<div class="cardContainer">
  <div class="cardContainerContent cardCreate">
    <form method="POST" action="{{ route('pedidos.update', $pedido) }}" accept-charset="UTF-8">
      {{ csrf_field() }} {{ method_field('patch') }}
    
  <div class="cardBody">
    <div class="formGroup">
      <label for="cardapio_id">{{ __('pedidos.cardapio_id') }} <span>*</span></label>
      <select id="cardapio_id" class="form-control{{ $errors->has('cardapio_id') ? ' is-invalid' : '' }}" name="cardapio_id" required>
        <option value="">Selecione um cardápio</option>
        @foreach($cardapios as $cardapio)
          <option value="{{$cardapio->id}}">{{$cardapio->nome}}</option>
        @endforeach
      </select>
      {!! $errors->first('cardapio_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
    </div>


    <div class="formGroup">
      <div>
        <label for="status">{{ __('pedidos.status') }} <span>*</span></label>
        <select id="status" class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" name="status" required>
          <option value="">Selecione o status</option>
          <option value="1">Em andamento</option>
          <option value="2">Concluído</option>
        </select>
        {!! $errors->first('status', '<span class="invalid-feedback" role="alert">:message</span>') !!}
      </div>
    </div>


    <div class="formGroup ">
      <div>
        <label for="numero_mesa">{{ __('pedidos.numero_mesa') }} <span>*</span></label>
        <input id="numero_mesa" type="number" min="1" class="form-control{{ $errors->has('numero_mesa') ? ' is-invalid' : '' }}"
          name="numero_mesa" value="{{ old('numero_mesa') }}" required>
        {!! $errors->first('numero_mesa', '<span class="invalid-feedback" role="alert">:message</span>') !!}
      </div>
    </div>

    <div class="cardFooter">
      <input type="submit" value="{{ __('pedidos.create') }}" class="btn btnSecondary addStock">
      <a href="{{ route('pedidos.index') }}" class="btn btnPrimary">{{ __('pedidos.cancel') }}</a>
    </div>
  </div>
     
    </form>
  </div>




</div>
@endsection