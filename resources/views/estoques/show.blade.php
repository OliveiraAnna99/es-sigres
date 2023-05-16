@extends('home')

@section('title', __('estoque.detail'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ __('estoque.detail') }}</div>
            <div class="card-body">
                <table class="table table-sm">
                    <tbody>
                        <tr>
                            <td>{{ __('estoque.name') }}</td>
                            <td>{{ $estoque->name }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('estoque.description') }}</td>
                            <td>{{ $estoque->description }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                @can('update', $estoque)
                <a href="{{ route('estoques.edit', $estoque) }}" id="edit-estoque-{{ $estoque->id }}" class="btn btn-warning">{{ __('estoque.edit') }}</a>
                @endcan
                <a href="{{ route('estoques.index') }}" class="btn btn-link">{{ __('estoque.back_to_index') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection