@extends('home')

@section('title', __('forma_pagamento.list'))

@section('content')

<div class="section">
    <div>
        <a href="{{ route('forma_pagamentos.create') }}" class="btn btnPrimary btnAdd">
            <x-bi-plus-circle class="icon" />
            <p> Cadastrar Forma de Pagamento
            </p>
        </a>
    </div>

    @if($formaPagamentos->isEmpty())
    <div class="empty">
        <h1>Não há formas de pagamento cadastradas</h1>
    </div>

    @else
    <div class="containerTable">
        <table class="table">
            <tr>
                <th>Formas de pagamento disponíveis</th>
            </tr>
            @foreach($formaPagamentos as $forma_pagamento)
            <tr>

                <td>{{ $forma_pagamento->nome }}</td>
                <td>
                    <div class="buttons">
                        <a href="{{ route('forma_pagamentos.edit', $forma_pagamento) }}">
                            <button class="btnSecondary">
                                <x-bi-pen></x-bi-pen>
                            </button>
                        </a>

                        <form method="POST" action="{{ route('forma_pagamentos.destroy', $forma_pagamento) }}" accept-charset="UTF-8">
                            {{ csrf_field() }} {{ method_field('delete') }}
                            <input name="pedido_id" type="hidden" value="{{ $forma_pagamento->id }}">
                            <button type="submit" class="btnPrimary trash">
                                <x-bi-trash />
                            </button>
                        </form>
                    </div>
                </td>
                @endforeach
            </tr>

        </table>
    </div>
    @endif
</div>





@endsection