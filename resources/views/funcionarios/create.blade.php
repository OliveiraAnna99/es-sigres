@extends('home')

@section('title', __('funcionario.create'))

@section('content')

<div class="cardContainer">
    <div class="cardContainerContent cardCreate">
        <form method="POST" action="{{ route('funcionarios.store') }}">
            {{ csrf_field() }}
            <div class="cardBody">
                <div class="formGroup">
                    <label for="nome">{{ __('funcionario.name') }} <span>*</span></label>
                    <input id="nome" type="text" class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="nome" value="{{ old('nome') }}" required>
                    {!! $errors->first('nome', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>
                <div class="formGroup">
                    <label for="cpf">{{ __('funcionario.cpf') }} <span>*</span></label>
                    <input id="cpf" type="text" class="form-control{{ $errors->has('cpf') ? ' is-invalid' : '' }} " name="cpf" value="{{ old('cpf') }}" required>
                    {!! $errors->first('cpf', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>
                <div class="formGroup">
                    <label for="endereco">{{ __('funcionario.endereco') }} <span>*</span></label>
                    <input id="endereco" type="text" class="form-control{{ $errors->has('endereco') ? ' is-invalid' : '' }} " name="endereco" value="{{ old('endereco') }}" required>
                    {!! $errors->first('endereco', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>

                <div class="formGroup">
                    <label for="contato">{{ __('funcionario.contato') }} <span>*</span></label>
                    <input id="contato" type="text" class="form-control{{ $errors->has('contato') ? ' is-invalid' : '' }} " name="contato" value="{{ old('contato') }}" required>
                    {!! $errors->first('contato', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>
                <div class="formGroup">
                    <label for="dataNascimento">{{ __('funcionario.dataNascimento') }} <span>*</span></label>
                    <input id="dataNascimento" type="date" class="form-control{{ $errors->has('dataNascimento') ? ' is-invalid' : '' }} " name="dataNascimento" value="{{ old('dataNascimento') }}" required>
                    {!! $errors->first('dataNascimento', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>
                <div class="formGroup">
                    <label for="rg">{{ __('funcionario.rg') }} <span>*</span></label>
                    <input id="rg" type="text" class="form-control{{ $errors->has('rg') ? ' is-invalid' : '' }} " name="rg" value="{{ old('rg') }}" required>
                    {!! $errors->first('rg', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>

                <div class="formGroup">
                    <label for="funcao">{{ __('funcionario.funcao') }} <span>*</span></label>
                    <input id="funcao" type="text" class="form-control{{ $errors->has('funcao') ? ' is-invalid' : '' }} " name="funcao" value="{{ old('funcao') }}" required>
                    {!! $errors->first('funcao', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>

                <div class="formGroup">
                    <label for="login">{{ __('funcionario.login') }} <span>*</span></label>
                    <input id="login" type="text" class="form-control{{ $errors->has('login') ? ' is-invalid' : '' }} " name="login" value="{{ old('login') }}" required>
                    {!! $errors->first('login', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>
            </div>
            <div class="cardFooter">
                <input type="submit" value="{{ __('funcionario.create') }}" class="btn btnSecondary">
                <a href="{{ route('funcionarios.index') }}" class="btn btnPrimary">{{ __('funcionario.cancel') }}</a>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js" integrity="sha256-u7MY6EG5ass8JhTuxBek18r5YG6pllB9zLqE4vZyTn4=" crossorigin="anonymous"></script>

<script>
    function validarCPF(cpf) {
        cpf = cpf.replace(/[^\d]/g, '');

        if (cpf.length !== 11) {
            return false;
        }

        if (/(\d)\1{10}/.test(cpf)) {
            return false;
        }

        var soma = 0;
        for (var i = 0; i < 9; i++) {
            soma += parseInt(cpf.charAt(i)) * (10 - i);
        }
        var dv1 = soma % 11 < 2 ? 0 : 11 - (soma % 11);

        soma = 0;
        for (var j = 0; j < 10; j++) {
            soma += parseInt(cpf.charAt(j)) * (11 - j);
        }
        var dv2 = soma % 11 < 2 ? 0 : 11 - (soma % 11);

        if (dv1 !== parseInt(cpf.charAt(9)) || dv2 !== parseInt(cpf.charAt(10))) {
            return false;
        }

        return true;
    }

    function validarFormulario() {
        var cpfInput = document.getElementById('cpf');
        var cpf = cpfInput.value.replace(/[^\d]/g, ''); // Remover caracteres especiais do CPF

        if (cpf.length !== 11 || !validarCPF(cpf)) {
            alert('CPF inválido');
            cpfInput.focus();
            return false;
        }

        return true;
    }

    $(document).ready(function() {
        $('#cpf').mask('000.000.000-00');
        $('#contato').mask('(00) 00000-0000');
        $('#rg').mask('000.000.000');

        $('form').on('submit', function(e) {
            if (!validarFormulario()) {
                e.preventDefault(); // Impedir o envio do formulário se o CPF for inválido
            }
        });
    });
</script>
@endsection