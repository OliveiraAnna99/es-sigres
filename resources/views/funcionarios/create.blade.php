@extends('home')

@section('title', __('funcionario.create'))

@section('content')

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">{{ __('funcionario.create') }}</div>
            <form method="POST" action="{{ route('funcionarios.store') }}" accept-charset="UTF-8">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="nome" class="form-label">{{ __('funcionario.name') }} <span class="form-required">*</span></label>
                        <input id="nome" type="text" class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="nome" value="{{ old('nome') }}" required>
                        {!! $errors->first('nome', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="cpf" class="form-label">{{ __('funcionario.cpf') }} <span class="form-required">*</span></label>
                        <input id="cpf" type="text" class="form-control{{ $errors->has('cpf') ? ' is-invalid' : '' }} " name="cpf" value="" required>
                        {!! $errors->first('cpf', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="endereco" class="form-label">{{ __('funcionario.endereco') }} <span class="form-required">*</span></label>
                        <input id="endereco" type="text" class="form-control{{ $errors->has('endereco') ? ' is-invalid' : '' }} " name="endereco" value="{{ old('endereco') }}" required>
                        {!! $errors->first('endereco', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-row">

                        <div class="col">

                            <label for="contato" class="form-label">{{ __('funcionario.contato') }} <span class="form-required">*</span></label>
                            <input id="contato" type="text" class="form-control{{ $errors->has('contato') ? ' is-invalid' : '' }} " name="contato" value="{{ old('contato') }}" required>
                            {!! $errors->first('contato', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                        </div>
                        <div class="col">

                            <label for="dataNascimento" class="form-label">{{ __('funcionario.dataNascimento') }} <span class="form-required">*</span></label>
                            <input id="dataNascimento" type="date" class="form-control{{ $errors->has('dataNascimento') ? ' is-invalid' : '' }} " name="dataNascimento" value="{{ old('dataNascimento') }}" required>
                            {!! $errors->first('dataNascimento', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="rg" class="form-label">{{ __('funcionario.rg') }} <span class="form-required">*</span></label>
                        <input id="rg" type="text" class="form-control{{ $errors->has('rg') ? ' is-invalid' : '' }} " name="rg" value="{{ old('rg') }}" required>
                        {!! $errors->first('rg', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>

                    <div class="form-group">
                        <label for="funcao" class="form-label">{{ __('funcionario.funcao') }} <span class="form-required">*</span></label>
                        <input id="funcao" type="text" class="form-control{{ $errors->has('funcao') ? ' is-invalid' : '' }} " name="funcao" value="{{ old('funcao') }}" required>
                        {!! $errors->first('funcao', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>

                    <div class="form-group">
                        <label for="login" class="form-label">{{ __('funcionario.login') }} <span class="form-required">*</span></label>
                        <input id="login" type="text" class="form-control{{ $errors->has('login') ? ' is-invalid' : '' }} " name="login" value="{{ old('login') }}" required>
                        {!! $errors->first('login', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>

                   
                </div>
                <div class="card-footer">
                    <input type="submit" value="{{ __('funcionario.create') }}" class="btn btn-success">
                    <a href="{{ route('funcionarios.index') }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
<script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js" integrity="sha256-u7MY6EG5ass8JhTuxBek18r5YG6pllB9zLqE4vZyTn4=" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function($){
      
        $('#cpf').mask('000.000.000-00', {reverse: true});
        
      
    });
</script>