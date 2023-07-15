@extends('home')

@section('title', __('pedido.detail'))

@section('content')
<div class="cardContainer">
  <div class="cardContainerContent cardCreate">
    <form method="POST" action="{{ route('pedidos.store') }}">
      {{ csrf_field() }}



      <div class="cardBody">
      <div class="formGroup">
          <label for="cardapio">Cardápios</label>
          @foreach($cardapios as $cardapio)
          <div>
              <input type="checkbox" id="cardapio_{{ $cardapio->id }}" name="cardapio_id[]" value="{{ $cardapio->id }}">
              <label for="cardapio_{{ $cardapio->id }}">{{ $cardapio->nome }}</label>
          </div>
          @endforeach
      </div>


        <div class="formGroup">
          <div>
            <label for="status">{{ __('pedido.status') }} <span>*</span></label>
            <select id="status" class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" name="status" required>
              <option selected value="1">Em andamento</option>
              <option value="2">Concluído</option>
            </select>
            {!! $errors->first('status', '<span class="invalid-feedback" role="alert">:message</span>') !!}
          </div>
        </div>

        <div class="formGroup">
          <div>
            <label for="forma_pagamento">Forma de Pagamento<span>*</span></label>
            <select id="forma_pagamento" class="form-control{{ $errors->has('forma_pagamento') ? ' is-invalid' : '' }}" name="forma_pagamento" required>
            
            @foreach($fps as $fp)
                <option value="{{$fp->id}}">{{$fp->nome}}</option>
             
             @endforeach
            </select>
            {!! $errors->first('forma_pagamento', '<span class="invalid-feedback" role="alert">:message</span>') !!}
          </div>
        </div>

        <div class="formGroup ">
          <div>
            <label for="numero_mesa">{{ __('pedido.numero_mesa') }} <span>*</span></label>
            <input id="numero_mesa" type="number" min="1" class="form-control{{ $errors->has('numero_mesa') ? ' is-invalid' : '' }}" name="numero_mesa" value="{{ old('numero_mesa') }}" required>
            {!! $errors->first('numero_mesa', '<span class="invalid-feedback" role="alert">:message</span>') !!}
          </div>
        </div>


        <div class="formGroup">
          <label for="obs">{{ __('pedido.obs') }} <span>*</span></label>
          <textarea id="obs" type="text" rows="10" class="form-control{{ $errors->has('obs') ? ' is-invalid' : '' }}" name="obs" value="{{ old('obs') }}" required>
          {!! $errors->first('obs', '<span class="invalid-feedback" role="alert">:message</span>') !!}</textarea>
        </div>


      </div>
      <div class="cardFooter">
        <input type="submit" value="{{ __('pedido.create') }}" class="btn btnSecondary addStock">
        <a href="{{ route('pedidos.index') }}" class="btn btnPrimary">{{ __('pedido.cancel') }}</a>
      </div>
    </form>

  </div>
</div>
@endsection