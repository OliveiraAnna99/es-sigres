@extends('home')

@section('title', __('forma_pagamento.edit'))

@section('content')
<div class="cardContainer">
  <div class="cardContainerContent cardCreate">
    <form method="POST" action="{{ route('forma_pagamentos.update', $formaPagamento) }}" accept-charset="UTF-8">
      {{ csrf_field() }} {{ method_field('patch') }}
      <div class="cardBody">
        <div class="formGroup">
          <label for="nome" class="form-label">{{ __('forma_pagamento.nome') }} <span class="form-required">*</span></label>
          <input id="nome" type="text" class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="nome" value="{{ $formaPagamento->nome }}" required>
          {!! $errors->first('nome', '<span class="invalid-feedback" role="alert">:message</span>') !!}
        </div>
      </div>
      <div class="cardFooter">
        <input type="submit" value="{{ __('forma_pagamento.update') }}" class="btn btnSecondary">
        <a href="{{ route('forma_pagamentos.index') }}" class="btn btnPrimary">{{ __('forma_pagamento.cancel') }}</a>
      </div>
    </form>
  </div>




</div>
@endsection