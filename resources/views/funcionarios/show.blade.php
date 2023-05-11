@extends('home')

@section('title', __('funcionario.detail'))

@section('content')
<div class="showFuncContainer">
    <div class="cardShowFunc">
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
            <a href="{{ route('funcionarios.edit', $funcionario) }}" class="btn btnEdit">
                <p>Editar Funcionário</p>
            </a>
            <a href="{{ route('funcionarios.index') }}" class="btn btnDelete">
                <p>Excluir Funcionário</p>
            </a>
        </div>
    </div>
</div>
@endsection