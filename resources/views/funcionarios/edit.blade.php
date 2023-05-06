@extends('layouts.app')

@section('title', __('funcionario.edit'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        @if (request('action') == 'delete' && $funcionario)
        @can('delete', $funcionario)
            <div class="card">
                <div class="card-header">{{ __('funcionario.delete') }}</div>
                <div class="card-body">
                    <label class="form-label text-primary">{{ __('funcionario.name') }}</label>
                    <p>{{ $funcionario->name }}</p>
                    <label class="form-label text-primary">{{ __('funcionario.description') }}</label>
                    <p>{{ $funcionario->description }}</p>
                    {!! $errors->first('funcionario_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>
                <hr style="margin:0">
                <div class="card-body text-danger">{{ __('funcionario.delete_confirm') }}</div>
                <div class="card-footer">
                    <form method="POST" action="{{ route('funcionarios.destroy', $funcionario) }}" accept-charset="UTF-8" onsubmit="return confirm(&quot;{{ __('app.delete_confirm') }}&quot;)" class="del-form float-right" style="display: inline;">
                        {{ csrf_field() }} {{ method_field('delete') }}
                        <input name="funcionario_id" type="hidden" value="{{ $funcionario->id }}">
                        <button type="submit" class="btn btn-danger">{{ __('app.delete_confirm_button') }}</button>
                    </form>
                    <a href="{{ route('funcionarios.edit', $funcionario) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                </div>
            </div>
        @endcan
        @else
        <div class="card">
            <div class="card-header">{{ __('funcionario.edit') }}</div>
            <form method="POST" action="{{ route('funcionarios.update', $funcionario) }}" accept-charset="UTF-8">
                {{ csrf_field() }} {{ method_field('patch') }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="form-label">{{ __('funcionario.name') }} <span class="form-required">*</span></label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $funcionario->name) }}" required>
                        {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">{{ __('funcionario.description') }}</label>
                        <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="4">{{ old('description', $funcionario->description) }}</textarea>
                        {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="{{ __('funcionario.update') }}" class="btn btn-success">
                    <a href="{{ route('funcionarios.show', $funcionario) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                    @can('delete', $funcionario)
                        <a href="{{ route('funcionarios.edit', [$funcionario, 'action' => 'delete']) }}" id="del-funcionario-{{ $funcionario->id }}" class="btn btn-danger float-right">{{ __('app.delete') }}</a>
                    @endcan
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection
