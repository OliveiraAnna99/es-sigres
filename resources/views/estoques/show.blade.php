@extends('home')

@section('title', __('estoque.detail'))

@section('content')
<div class="containerShow">
  <div class="cardShow">{{ __('estoque.detail') }}
    <div class="containerTable">
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
    <div class="btnShowStock">

      @can('estoque.read')

      <a href="{{ route('estoques.index') }}" class="btn btnSecondary">{{ __('estoque.back_to_index') }}</a>
      @endcan
      @can('estoque.delete')
      <form method="POST" action="{{ route('estoques.destroy', $estoque) }}" accept-charset="UTF-8"
        class="del-form float-right">
        {{ csrf_field() }} {{ method_field('delete') }}
        <input name="estoque_id" type="hidden" value="{{ $estoque->id }}">
        <button type="submit" class="btn btnPrimary">{{__('estoque.delete')}}</button>
      </form>
      @endcan
    </div>
  </div>
</div>




































@endsection