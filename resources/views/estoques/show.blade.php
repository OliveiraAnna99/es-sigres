@extends('home')

@section('title', __('estoque.detail'))

@section('content')
<div class="cardContainerShow">
  <div class="containerShowTable">
    <table class="table">
      <tbody>
        <tr>
          <th>{{ __('estoque.item') }}</th>
          <th>{{ __('estoque.quant') }}</th>
          <th>{{ __('estoque.date') }}</th>
        </tr>
        <tr>
          <td>{{ $estoque->item }}</td>
          <td>{{ $estoque->quant }}</td>
          <td>{{ $estoque->date }}</td>
        </tr>
      </tbody>
    </table>
  </div>

  @can('estoque.read')
  <a href="{{ route('estoques.index') }}" class="btn btnSecondary">{{ __('estoque.back_to_index') }}</a>
  @endcan
</div>
</div>




































@endsection