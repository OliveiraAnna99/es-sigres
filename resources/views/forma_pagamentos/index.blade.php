@extends('home')

@section('title', __('forma_pagamento.list'))

@section('content')

<div class="section">
    <div class="topSection">
        @can('forma_pagamento.create')
        <a href="{{ route('forma_pagamentos.create') }}" class="btn btnPrimary btnAdd">
            <x-bi-plus-circle class="icon" />
            <p> Cadastrar Forma de Pagamento
            </p>
        </a>
        @endcan
        <form class='form-search' method="GET" action="" accept-charset="UTF-8" class="form-inline">
            <div class="formGroup">
                <input class="input-search" placeholder="Pesquise por um pagamento..." name="q" type="text" id="q" class="form-control mx-sm-2" value="{{ request('q') }}">
            </div>
            <button type="submit" class="btnSecondary btn btnReset"><x-bi-search class="m-1"></x-bi-search></button>
            <a href="{{ route('forma_pagamentos.index') }}" class="btnReset btn btnPrimary">Limpar</a>
        </form>
    </div>

    <div>
        <div>
            <div class="containerTable">
                <table class="table">
                    <tr>
                        <th>{{ __('forma_pagamento.forma_pagamento') }}</th>
                        <th>Ações</th>
                    </tr>
                    @foreach($formaPagamentos as $forma_pagamento)
                    <tr>

                        <td>{{ $forma_pagamento->nome }}</td>


                        <td>
                            <div class="buttons">
                                <a href="{{ route('forma_pagamentos.show', $forma_pagamento) }}">
                                    <button class="btnSecondary">
                                        Ver
                                    </button>
                                </a>
                                @can('forma_pagamento.update')
                                <a href="{{ route('forma_pagamentos.edit', $forma_pagamento) }}">
                                    <button class="btnSecondary">
                                        <x-bi-pen></x-bi-pen>
                                    </button>
                                </a>
                                @endcan

                                @can('forma_pagamento.delete')
                                <form method="POST" action="{{ route('forma_pagamentos.destroy', $forma_pagamento) }}" accept-charset="UTF-8">
                                    {{ csrf_field() }} {{ method_field('delete') }}
                                    <input name="pedido_id" type="hidden" value="{{ $forma_pagamento->id }}">
                                    <button type="submit" class="btnPrimary trash">
                                        <x-bi-trash />
                                    </button>
                                </form>
                                @endcan
                            </div>
                        </td>
                        @endforeach
                    </tr>

                </table>
            </div>
        </div>
    </div>
</div>





@endsection