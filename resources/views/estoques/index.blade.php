@extends('layouts.app')

@section('title', __('estoque.list'))

@section('content')
<div class="mb-3">
    <div class="float-right">
        @can('create', new App\Models\Estoque)
            <a href="{{ route('estoques.create') }}" class="btn btn-success">{{ __('estoque.create') }}</a>
        @endcan
    </div>
    <h1 class="page-title">{{ __('estoque.list') }} <small>{{ __('app.total') }} : {{ $estoques->total() }} {{ __('estoque.estoque') }}</small></h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                    <div class="form-group">
                        <label for="q" class="form-label">{{ __('estoque.search') }}</label>
                        <input placeholder="{{ __('estoque.search_text') }}" name="q" type="text" id="q" class="form-control mx-sm-2" value="{{ request('q') }}">
                    </div>
                    <input type="submit" value="{{ __('estoque.search') }}" class="btn btn-secondary">
                    <a href="{{ route('estoques.index') }}" class="btn btn-link">{{ __('app.reset') }}</a>
                </form>
            </div>
            <table class="table table-sm table-responsive-sm table-hover">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('app.table_no') }}</th>
                        <th>{{ __('estoque.name') }}</th>
                        <th>{{ __('estoque.description') }}</th>
                        <th class="text-center">{{ __('app.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($estoques as $key => $estoque)
                    <tr>
                        <td class="text-center">{{ $estoques->firstItem() + $key }}</td>
                        <td>{!! $estoque->name_link !!}</td>
                        <td>{{ $estoque->description }}</td>
                        <td class="text-center">
                            @can('view', $estoque)
                                <a href="{{ route('estoques.show', $estoque) }}" id="show-estoque-{{ $estoque->id }}">{{ __('app.show') }}</a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-body">{{ $estoques->appends(Request::except('page'))->render() }}</div>
        </div>
    </div>
</div>
@endsection
