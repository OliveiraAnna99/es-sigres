@extends('home')

@section('title', __('cardapio.create'))

@section('content')

<div class="cardContainer">
    <div class="cardContainerContent cardCreate">
        <form method="POST" enctype="multipart/form-data" action="{{ route('cardapios.store') }}">
            {{ csrf_field() }}
            <div class="cardBody">
                <div class="formGroup">
                    <label for="nome">{{ __('cardapio.name') }} <span>*</span></label>
                    <input id="nome" type="text" class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="nome" value="{{ old('nome') }}" required>
                    {!! $errors->first('nome', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>
               
                <div class="formGroup">
                    <label for="valor">{{ __('cardapio.valor') }} <span>*</span></label>
                    <input id="valor" data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0'"  type="text" class="form-control{{ $errors->has('valor') ? ' is-invalid' : '' }} " name="valor" value="{{ old('valor') }}" required>
                    {!! $errors->first('valor', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>

               

           
                <div class="formGroup">
                    <label for="ingredientes">{{ __('cardapio.ingredientes') }} <span>*</span></label>
                    <input id="ingredientes" type="text" class="form-control {{ $errors->has('ingredientes') ? ' is-invalid' : '' }}" name="ingredientes" value="{{ old('ingredientes') }}" required>
                    {!! $errors->first('ingredientes', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>
           
            </div>
            <div class="cardFooter">
                <input type="submit" value="{{ __('cardapio.create') }}" class="btn btnSecondary">
                <a href="{{ route('cardapios.index') }}" class="btn btnPrimary">{{ __('cardapio.cancel') }}</a>
            </div>
        </form>
    </div>
</div>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>

<script>
   
</script>