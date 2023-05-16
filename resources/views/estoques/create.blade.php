@extends('home')

@section('title', __('estoque.detail'))

@section('content')

<div class="cardContainer">
    <div class="cardContainerContent cardCreate">
        <form method="POST" action="{{ route('estoques.store') }}">
            {{ csrf_field() }}

            <div class="cardBody">
                <div class="formGroup">
                    <label for="item">{{ __('estoque.item') }} <span>*</span></label>
                    <input id="item" type="text" class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="item" value="{{ old('item') }}" required>
                    {!! $errors->first('item', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>

                <div class="formGroup ">
                    <div>
                        <label for="quant">{{ __('estoque.quant') }} <span>*</span></label>
                        <input id="quant" type="number" min="1" class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="quant" value="{{ old('quant') }}" required>
                        {!! $errors->first('quant', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                </div>

                <div class="formGroup">
                    <label for="date">{{ __('estoque.date') }} <span>*</span></label>
                    <input id="date" type="date" min="1" class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="date" value="{{ old('date') }}" required>
                    {!! $errors->first('date', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>

                <div class="cardFooter">
                    <input type="submit" value="{{ __('estoque.create') }}" class="btn btnSecondary">
                    <a href="{{ route('estoques.index') }}" class="btn btnPrimary">{{ __('estoque.cancel') }}</a>
                </div>
        </form>

    </div>
</div>
@endsection