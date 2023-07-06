@extends('home')

@section('title', __('estoque.list'))

@section('content')

<div class="section">
  <div>
    @can('estoque.create')
    <a href="{{ route('estoques.create') }}" class="btn btnPrimary btnAdd">
      <x-bi-plus-circle class="icon" />
      <p>Adicionar item</p>
    </a>
    @endcan
  </div>

  <div>
    <div>
      <div class="containerTable">
        <table class="table">
          <tr>
            <th>Item</th>
            <th>Quantidade</th>
            <th>Data de Validade</th>
            <th>Ações</th>
          </tr>

          @foreach($estoques as $key => $estoque)
          <tr>
            <td>{{ $estoque->item }}</td>
            <td>{{ $estoque->quant }}</td>
            <td>{{ $estoque->date }}</td>
            <td>
              <div class="buttons">
                @can('estoque.update')
                <a href="{{ route('estoques.edit', $estoque) }}">
                  <button class="btnSecondary">
                    <x-bi-pen></x-bi-pen>
                  </button>
                </a>
                @endcan

                @can('estoque.delete')
                <form method="POST" action="{{ route('estoques.destroy', $estoque) }}" accept-charset="UTF-8">
                  {{ csrf_field() }} {{ method_field('delete') }}
                  <input name="estoque_id" type="hidden" value="{{ $estoque->id }}">
                  <button type="submit" class="btnPrimary trash">
                    <x-bi-trash />
                  </button>
                </form>
                @endcan

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