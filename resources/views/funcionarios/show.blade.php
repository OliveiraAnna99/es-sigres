@extends('home')

@section('title', __('funcionario.detail'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">{{ __('funcionario.detail') }}</div>
            <div class="card-body">
                <table class="table table-sm">
                    <tbody>
                        <tr><td>{{ __('funcionario.name') }}</td><td>{{ $funcionario->nome }}</td></tr>
                        <tr><td>{{ __('funcionario.cpf') }}</td><td>{{ $funcionario->cpf }}</td></tr>
                        <tr><td>{{ __('funcionario.endereco') }}</td><td>{{ $funcionario->endereco }}</td></tr>
                        <tr><td>{{ __('funcionario.contato') }}</td><td>{{ $funcionario->contato }}</td></tr>
                        <tr><td>{{ __('funcionario.dataNascimento') }}</td><td>{{ $funcionario->dataNascimento }}</td></tr>
                        <tr><td>{{ __('funcionario.rg') }}</td><td>{{ $funcionario->rg }}</td></tr>
                        <tr><td>{{ __('funcionario.funcao') }}</td><td>{{ $funcionario->funcao }}</td></tr>
                        <tr><td>{{ __('funcionario.login') }}</td><td>{{ $funcionario->login }}</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                    <a href="{{ route('funcionarios.edit', $funcionario) }}" id="edit-funcionario-{{ $funcionario->id }}" class="btn btn-warning">{{ __('funcionario.edit') }}</a>
                <a href="{{ route('funcionarios.index') }}" class="btn btn-link">{{ __('funcionario.back_to_index') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
