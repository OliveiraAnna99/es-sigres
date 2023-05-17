@extends('home')

@section('title', __('estoque.detail'))

@section('content')
<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">{{ __('estoque.detail') }}</div>
      <div class="card-body">
        <table class="table table-sm">
          <tbody>
            <tr>
              <td>{{ __('estoque.item') }}</td>
              <td>{{ $estoque->item }}</td>
            </tr>
            <tr>
              <td>{{ __('estoque.quant') }}</td>
              <td>{{ $estoque->quant }}</td>
            </tr>
            <tr>
              <td>{{ __('estoque.date') }}</td>
              <td>{{ $estoque->date }}</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="card-footer">
        @can('update', $estoque)
        <a href="{{ route('estoques.edit', $estoque) }}" id="edit-estoque-{{ $estoque->id }}"
          class="btn btn-warning">{{ __('estoque.edit') }}</a>
        @endcan
        <a href="{{ route('estoques.index') }}" class="btn btn-link">{{ __('estoque.back_to_index') }}</a>

        <form method="POST" action="{{ route('estoques.destroy', $estoque) }}" accept-charset="UTF-8"
          class="del-form float-right" style="display: inline;">
          {{ csrf_field() }} {{ method_field('delete') }}
          <input name="estoque_id" type="hidden" value="{{ $estoque->id }}">
          <button type="submit" class="btn btnPrimary">{{__('estoque.delete')}}</button>
        </form>
      </div>
    </div>
  </div>
</div>





@endsection