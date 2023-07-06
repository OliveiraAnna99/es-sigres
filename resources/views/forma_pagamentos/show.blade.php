@extends('home')

@section('title', __('forma_pagamento.detail'))

@section('content')
<div class="cardContainerShow">
  <div class="containerShowTable">
    <table class="table">
      <tbody>
        <tr>
          <th>{{ __('forma_pagamento.nome') }}</th>
         
        </tr>
        <tr>
          <td>{{ $formaPagamento->nome }}</td>
        
        </tr>
      </tbody>
    </table>
  </div>

  @can('forma_pagamento.read')
  <a href="{{ route('forma_pagamentos.index') }}" class="btn btnSecondary">{{ __('forma_pagamento.back_to_index') }}</a>
  @endcan
</div>
</div>


@endsection