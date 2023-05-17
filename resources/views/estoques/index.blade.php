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
      <div class="containerTable">
        <table class="table">
          <tr>
            <th>{{ __('estoque.item') }}</th>
            <th>{{ __('estoque.quant') }}</th>
            <th>{{ __('estoque.date') }}</th>
          </tr>
          <tr>
            @foreach($estoques as $key => $estoque)
            <td>{{ $estoque->item }}</td>
            <td>{{ $estoque->quant }}</td>
            <td>{{ $estoque->date }}</td>
            <td>
              <div class="buttons">
                <button class="btnSecondary">
                  <a href="{{ route('estoques.edit', $estoque) }}">
                    Editar
                  </a>
                </button>

                <button class="btnPrimary">
                  <a href="#">
                    <x-bi-trash class="trash" />
                  </a>
                </button>
              </div>
            </td>
          </tr>
          @endforeach

        </table>
      </div>
    </div>
  </div>
</div>



@endsection
