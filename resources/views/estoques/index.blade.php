@extends('home')

@section('title', __('estoque.list'))

@section('content')

<div class="section">
  <div>
    <a href="{{ route('estoques.create') }}" class="btn btnPrimary btnAdd">
      <x-bi-plus-circle class="icon" />
      <p>Adicionar produto</p>
    </a>
  </div>

















  <div>
    <div>
      <div>
        <table class="table">
          <tr>
            <th>{{ __('estoque.item') }}</th>
            <th>{{ __('estoque.quant') }}</th>
            <th>{{ __('estoque.date') }}</th>
          </tr>
          @foreach($estoques as $key => $estoque)
          <tr>
            <td>{{ $estoque->item }}</td>
            <td>{{ $estoque->quant }}</td>
            <td>{{ $estoque->date }}</td>
          </tr>
        </table>
        <!-- <a href="{{ route('estoques.show', $estoque) }}" class="btn btnPrimary btnShow">
          <p>ver</p>
        </a> -->
      </div>
      @endforeach
    </div>
  </div>
</div>

@endsection
