@extends('home')

@section('title', __('estoque.edit'))

@section('content')
<div class="cardContainer">
  <div class="cardContainerContent cardCreate">
    <form method="POST" action="{{ route('estoques.update', $estoque) }}" accept-charset="UTF-8">
      {{ csrf_field() }} {{ method_field('patch') }}
      <div class="cardBody">
        <div class="formGroup">
          <label for="item" class="form-label">{{ __('estoque.item') }} <span class="form-required">*</span></label>
          <input id="item" type="text" class="form-control{{ $errors->has('item') ? ' is-invalid' : '' }}" name="item"
            value="{{ $estoque->item }}" required>
          {!! $errors->first('item', '<span class="invalid-feedback" role="alert">:message</span>') !!}
        </div>
        <div class="formGroup">
          <label for="quant" class="form-label">{{ __('estoque.quant') }} <span class="form-required">*</span></label>
          <input id="quant" type="text" class="form-control{{ $errors->has('quant') ? ' is-invalid' : '' }} "
            name="quant" value="{{ $estoque->quant }}" required>
          {!! $errors->first('quant', '<span class="invalid-feedback" role="alert">:message</span>') !!}
        </div>
        <div class="formGroup">
          <label for="date" class="form-label">{{ __('estoque.date') }} <span class="form-required">*</span></label>
          <input id="date" type="text" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }} " name="date"
            value="{{ $estoque->date }}" required>
          {!! $errors->first('date', '<span class="invalid-feedback" role="alert">:message</span>') !!}
        </div>


      </div>
      <div class="cardFooter">
        <input type="submit" value="{{ __('estoque.update') }}" class="btn btnSecondary">
        <a href="{{ route('estoques.show', $estoque) }}" class="btn btnPrimary">{{ __('estoque.cancel') }}</a>
      </div>
    </form>
  </div>




</div>
@endsection