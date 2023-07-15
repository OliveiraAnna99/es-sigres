@extends('home')

@section('title', __('pedido.edit'))

@section('content')
<div class="cardContainer">
  <div class="cardContainerContent cardCreate">
    <form method="POST" action="{{ route('pedidos.store') }}">
      {{ csrf_field() }}



      <div class="cardBody">
        <div class="formGroup" style="gap: 10px">
          <label for="cardapio_id">{{ __('pedido.cardapio_id') }} <span>*</span></label>
          <div class="items-cardapio">
            @foreach($cardapios as $cardapio)
            <div style="display: flex; align-items: center; gap: 10px">
              <input type="checkbox" id="cardapio_{{$cardapio->id}}" class="checkbox {{ $errors->has('cardapio_id') ? ' is-invalid' : '' }}" name="cardapio_id[]" value="{{intval($cardapio->id)}}" {{ old('cardapio_id') && in_array($cardapio->id, old('cardapio_id')) ? 'checked' : '' }}>
              <label for="cardapio_{{$cardapio->id}}">{{$cardapio->nome}}</label>
            </div>
            @endforeach
          </div>
          {!! $errors->first('cardapio_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
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


        <div class="formGroup ">
          <div>
            <label for="numero_mesa">{{ __('pedido.numero_mesa') }} <span>*</span></label>
            <input id="numero_mesa" type="number" min="1" class="form-control{{ $errors->has('numero_mesa') ? ' is-invalid' : '' }}" name="numero_mesa" value="{{ old('numero_mesa') }}" required>
            {!! $errors->first('numero_mesa', '<span class="invalid-feedback" role="alert">:message</span>') !!}
          </div>
        </div>


        <div class="formGroup">
          <label for="obs">{{ __('pedido.obs') }} <span>*</span></label>
          <textarea id="obs" type="text" rows="10" name="obs" value="{{ old('obs') }}">
          </textarea>
        </div>
      </div>
      <div class="cardFooter">
        <input type="submit" value="Editar Pedido" class="btn btnSecondary addStock">
        <a href="{{ route('pedidos.index') }}" class="btn btnPrimary">Voltar</a>
      </div>

    </form>
  </div>




</div>
@endsection