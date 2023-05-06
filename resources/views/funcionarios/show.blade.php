@extends('home')

@section('title', __('funcionario.detail'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ __('funcionario.detail') }}</div>
            <div class="card-body">
                <table class="table table-sm">
                    <tbody>
                        <tr><td>{{ __('funcionario.name') }}</td><td>{{ $funcionario->name }}</td></tr>
                        <tr><td>{{ __('funcionario.description') }}</td><td>{{ $funcionario->description }}</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                @can('update', $funcionario)
                    <a href="{{ route('funcionarios.edit', $funcionario) }}" id="edit-funcionario-{{ $funcionario->id }}" class="btn btn-warning">{{ __('funcionario.edit') }}</a>
                @endcan
                <a href="{{ route('funcionarios.index') }}" class="btn btn-link">{{ __('funcionario.back_to_index') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
