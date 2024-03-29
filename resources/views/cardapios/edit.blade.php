@extends('home')

@section('title', __('cardapio.edit'))

@section('content')
<div class="cardContainer">
    <div class="cardContainerContent cardCreate">
        <form method="POST" enctype="multipart/form-data" action="{{ route('cardapios.update', $cardapio) }}" accept-charset="UTF-8">
            {{ csrf_field() }} {{ method_field('patch') }}
            <div class="cardBody">
                <div class="formGroup">
                    <label for="nome">{{ __('cardapio.name') }} <span>*</span></label>
                    <input id="nome" type="text" class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="nome" value="{{ old('nome', $cardapio->nome) }}" required>
                    {!! $errors->first('nome', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>

                <div class="formGroup">
                    <label for="valor">{{ __('cardapio.valor') }} <span>*</span></label>
                    <input id="valor" type="text" class="form-control{{ $errors->has('valor') ? ' is-invalid' : '' }} " name="valor" value="{{ old('valor',  $cardapio->valor) }}" required>
                    {!! $errors->first('valor', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>

                <div class="formGroup">
                    <label for="estoque_id">{{ __('pedido.estoque_id') }} <span>*</span></label>
                    @foreach($estoques as $estoque)
                    <div>
                        <input type="checkbox" id="ingrediente_{{$estoque->id}}" class="{{ $errors->has('estoque_id') ? ' is-invalid' : '' }}" name="estoque_id[]" value="{{intval($estoque->id)}}" {{ old('estoque_id') && in_array($estoque->id, old('estoque_id')) ? 'checked' : '' }} required>
                        <label for="estoque_{{$estoque->id}}">{{$estoque->item}}</label>
                    </div>
                    @endforeach
                    {!! $errors->first('estoque_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>
            </div>
            <div class="cardFooter">
                <input type="submit" value="Atualizar item" class="btn btnSecondary">
                <a href="{{ route('cardapios.index') }}" class="btn btnPrimary">{{ __('cardapio.cancel') }}</a>
            </div>
        </form>
    </div>
</div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js" integrity="sha256-u7MY6EG5ass8JhTuxBek18r5YG6pllB9zLqE4vZyTn4=" crossorigin="anonymous"></script>

<script type="text/javascript">

</script>