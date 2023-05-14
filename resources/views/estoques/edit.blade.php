@extends('layouts.app')

@section('title', __('estoque.edit'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        @if (request('action') == 'delete' && $estoque)
        @can('delete', $estoque)
            <div class="card">
                <div class="card-header">{{ __('estoque.delete') }}</div>
                <div class="card-body">
                    <label class="form-label text-primary">{{ __('estoque.name') }}</label>
                    <p>{{ $estoque->name }}</p>
                    <label class="form-label text-primary">{{ __('estoque.description') }}</label>
                    <p>{{ $estoque->description }}</p>
                    {!! $errors->first('estoque_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>
                <hr style="margin:0">
                <div class="card-body text-danger">{{ __('estoque.delete_confirm') }}</div>
                <div class="card-footer">
                    <form method="POST" action="{{ route('estoques.destroy', $estoque) }}" accept-charset="UTF-8" onsubmit="return confirm(&quot;{{ __('app.delete_confirm') }}&quot;)" class="del-form float-right" style="display: inline;">
                        {{ csrf_field() }} {{ method_field('delete') }}
                        <input name="estoque_id" type="hidden" value="{{ $estoque->id }}">
                        <button type="submit" class="btn btn-danger">{{ __('app.delete_confirm_button') }}</button>
                    </form>
                    <a href="{{ route('estoques.edit', $estoque) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                </div>
            </div>
        @endcan
        @else
        <div class="card">
            <div class="card-header">{{ __('estoque.edit') }}</div>
            <form method="POST" action="{{ route('estoques.update', $estoque) }}" accept-charset="UTF-8">
                {{ csrf_field() }} {{ method_field('patch') }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="form-label">{{ __('estoque.name') }} <span class="form-required">*</span></label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $estoque->name) }}" required>
                        {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">{{ __('estoque.description') }}</label>
                        <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="4">{{ old('description', $estoque->description) }}</textarea>
                        {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="{{ __('estoque.update') }}" class="btn btn-success">
                    <a href="{{ route('estoques.show', $estoque) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                    @can('delete', $estoque)
                        <a href="{{ route('estoques.edit', [$estoque, 'action' => 'delete']) }}" id="del-estoque-{{ $estoque->id }}" class="btn btn-danger float-right">{{ __('app.delete') }}</a>
                    @endcan
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection
