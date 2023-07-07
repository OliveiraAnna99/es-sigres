@extends('home')

@section('title', __('forma_pagamento.detail'))

@section('content')

<div class="cardContainer">
  <div class="cardContainerContent cardCreate">
    <form method="POST" action="{{ route('forma_pagamentos.store') }}">
      {{ csrf_field() }}

      <div class="cardBody">
        <div class="formGroup">
          <label for="nome">{{ __('forma_pagamento.nome') }} <span>*</span></label>
          <select name="nome" id="nome" class="forma-pagamento-select form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="nome" value="{{ old('nome') }}" required>
            <option value="Espécie">Espécie</option>
            <option value="Pix">Pix</option>
            <option value="Débito">Débito</option>
            <option value="Crédito">Crédito</option>
          </select>

        </div>
      </div>
      <div class="cardFooter">
        <input type="submit" value="{{ __('forma_pagamento.create') }}" class="btn btnSecondary addStock">
        <a href="{{ route('forma_pagamentos.index') }}" class="btn btnPrimary">{{ __('forma_pagamento.cancel') }}</a>
      </div>
    </form>


  </div>
</div>
@endsection