@extends('home')

@section('title', __('funcionario.edit'))

@section('content')
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
<div class="cardContainer">
    <div class="cardContainerContent cardCreate">
        <form method="POST" action="{{ route('funcionarios.update', $funcionario) }}" accept-charset="UTF-8">
            {{ csrf_field() }} {{ method_field('patch') }}
            <div class="cardBody">
                <div class="formGroup">
                    <label for="nome" class="form-label">{{ __('funcionario.name') }} <span class="form-required">*</span></label>
                    <input id="nome" type="text" class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="nome" value="{{ $funcionario->nome }}" required>
                    {!! $errors->first('nome', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>
                <div class="formGroup">
                    <label for="cpf" class="form-label">{{ __('funcionario.cpf') }} <span class="form-required">*</span></label>
                    <input id="cpf" type="text" class="form-control{{ $errors->has('cpf') ? ' is-invalid' : '' }} " name="cpf" value="{{ $funcionario->cpf }}" required>
                    {!! $errors->first('cpf', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>
                <div class="formGroup">
                    <label for="endereco" class="form-label">{{ __('funcionario.endereco') }} <span class="form-required">*</span></label>
                    <input id="endereco" type="text" class="form-control{{ $errors->has('endereco') ? ' is-invalid' : '' }} " name="endereco" value="{{ $funcionario->endereco }}" required>
                    {!! $errors->first('endereco', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>

                <div class="formGroup">
                    <label for="contato" class="form-label">{{ __('funcionario.contato') }} <span class="form-required">*</span></label>
                    <input id="contato" type="text" class="form-control{{ $errors->has('contato') ? ' is-invalid' : '' }} " name="contato" value="{{ $funcionario->contato }}" required>
                    {!! $errors->first('contato', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>
                <div class="formGroup">
                    <label for="dataNascimento" class="form-label">{{ __('funcionario.dataNascimento') }} <span class="form-required">*</span></label>
                    <input id="dataNascimento" type="date" class="form-control{{ $errors->has('dataNascimento') ? ' is-invalid' : '' }} " name="dataNascimento" value="{{ $funcionario->dataNascimento}}" required>
                    {!! $errors->first('dataNascimento', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>


                <div class="formGroup">
                    <label for="rg" class="form-label">{{ __('funcionario.rg') }} <span class="form-required">*</span></label>
                    <input id="rg" type="text" class="form-control{{ $errors->has('rg') ? ' is-invalid' : '' }} " name="rg" value="{{ $funcionario->rg }}" required>
                    {!! $errors->first('rg', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>

                <div class="formGroup">
                    <label for="funcao" class="form-label">{{ __('funcionario.funcao') }} <span class="form-required">*</span></label>
                    <input id="funcao" type="text" class="form-control{{ $errors->has('funcao') ? ' is-invalid' : '' }} " name="funcao" value="{{ $funcionario->funcao }}" required>
                    {!! $errors->first('funcao', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>

                <div class="formGroup">
                    <label for="login" class="form-label">{{ __('funcionario.login') }} <span class="form-required">*</span></label>
                    <input id="login" type="text" class="form-control{{ $errors->has('login') ? ' is-invalid' : '' }} " name="login" value="{{ $funcionario->login }}" required>
                    {!! $errors->first('login', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>
            </div>
            <div class="cardFooter">
                <input type="submit" value="{{ __('funcionario.update') }}" class="btn btnSecondary">
                <a href="{{ route('funcionarios.show', $funcionario) }}" class="btn btnPrimary">{{ __('app.cancel') }}</a>
                @can('delete', $funcionario)
                <a href="{{ route('funcionarios.edit', [$funcionario, 'action' => 'delete']) }}" id="del-funcionario-{{ $funcionario->id }}" class="btn btnPrimary">{{ __('app.delete') }}</a>
                @endcan
            </div>
        </form>
    </div>
</div>
</div>
@endif
@endsection
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js" integrity="sha256-u7MY6EG5ass8JhTuxBek18r5YG6pllB9zLqE4vZyTn4=" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function($) {

        $('#cpf').mask('000.000.000-00');
        $('#contato').mask('(00) 00000-0000');
        $('#rg').mask('00.000.000-0');


    });
</script>