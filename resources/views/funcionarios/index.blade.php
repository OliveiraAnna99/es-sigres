@extends('layouts.app')

@section('title', __('funcionario.list'))

@section('content')
<div class="mb-3">
    <div class="float-right">
        @can('create', new App\Models\Funcionario)
            <a href="{{ route('funcionarios.create') }}" class="btn btn-success">{{ __('funcionario.create') }}</a>
        @endcan
    </div>
    <h1 class="page-title">{{ __('funcionario.list') }} <small>{{ __('app.total') }} : {{ $funcionarios->total() }} {{ __('funcionario.funcionario') }}</small></h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                    <div class="form-group">
                        <label for="q" class="form-label">{{ __('funcionario.search') }}</label>
                        <input placeholder="{{ __('funcionario.search_text') }}" name="q" type="text" id="q" class="form-control mx-sm-2" value="{{ request('q') }}">
                    </div>
                    <input type="submit" value="{{ __('funcionario.search') }}" class="btn btn-secondary">
                    <a href="{{ route('funcionarios.index') }}" class="btn btn-link">{{ __('app.reset') }}</a>
                </form>
            </div>
            <table class="table table-sm table-responsive-sm table-hover">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('app.table_no') }}</th>
                        <th>{{ __('funcionario.name') }}</th>
                        <th>{{ __('funcionario.description') }}</th>
                        <th class="text-center">{{ __('app.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($funcionarios as $key => $funcionario)
                    <tr>
                        <td class="text-center">{{ $funcionarios->firstItem() + $key }}</td>
                        <td>{!! $funcionario->name_link !!}</td>
                        <td>{{ $funcionario->description }}</td>
                        <td class="text-center">
                            @can('view', $funcionario)
                                <a href="{{ route('funcionarios.show', $funcionario) }}" id="show-funcionario-{{ $funcionario->id }}">{{ __('app.show') }}</a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-body">{{ $funcionarios->appends(Request::except('page'))->render() }}</div>
        </div>
    </div>
</div>
@endsection
