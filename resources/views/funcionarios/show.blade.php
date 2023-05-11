@extends('home')

@section('title', __('funcionario.detail'))

@section('content')

<div class="cardContainer">
    <div class="cardContainerContent">
        <div class="cardBody">
            <div>
                <p class="funcTitle">{{ __('funcionario.name') }}</p>
                <p>{{ $funcionario->nome }}</p>
            </div>
            <div>
                <p class="funcTitle">{{ __('funcionario.cpf') }}</p>
                <p>{{ $funcionario->cpf }}</p>
            </div>
            <div>
                <p class="funcTitle">{{ __('funcionario.endereco') }}</p>
                <p>{{ $funcionario->endereco }}</p>
            </div>
            <div>
                <p class="funcTitle">{{ __('funcionario.contato') }}</p>
                <p>{{ $funcionario->contato }}</p>
            </div>
            <div>
                <p class="funcTitle">{{ __('funcionario.dataNascimento') }}</p>
                <p>{{ $funcionario->dataNascimento }}</p>
            </div>
            <div>
                <p class="funcTitle">{{ __('funcionario.rg') }}</p>
                <p>{{ $funcionario->rg }}</p>
            </div>
            <div>
                <p class="funcTitle">{{ __('funcionario.funcao') }}</p>
                <p>{{ $funcionario->funcao }}</p>
            </div>
            <div>
                <p class="funcTitle">{{ __('funcionario.login') }}</p>
                <p>{{ $funcionario->login }}</p>
            </div>
        </div>
        <div class="cardFooter">
            <a href="{{ route('funcionarios.edit', $funcionario) }}" class="btn btnSecondary">
                <p>Editar Funcionário</p>
            </a>
            <form method="POST" action="{{ route('funcionarios.destroy', $funcionario) }}" accept-charset="UTF-8" onsubmit="return confirm(&quot;{{ __('funcionario.delete_confirm') }}&quot;)" class="del-form float-right" style="display: inline;">
                {{ csrf_field() }} {{ method_field('delete') }}
                <button type="submit" class="btn btnPrimary">Excluir funcionário</button>
            </form>
        </div>
    </div>
</div>
@endsection