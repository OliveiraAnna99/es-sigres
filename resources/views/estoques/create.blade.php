<div class="cardContainer">
    <div class="cardContainerContent cardCreate">
        <form method="POST" action="{{ route('estoques.store') }}">
            {{ csrf_field() }}

            <div class="cardBody">
                <div class="formGroup">
                    <label for="nome">{{ __('estoque.name') }} <span>*</span></label>
                    <input id="nome" type="text" class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="nome" value="{{ old('nome') }}" required>
                    {!! $errors->first('nome', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>

                <div class="cardFooter">
                    <input type="submit" value="{{ __('estoque.create') }}" class="btn btnSecondary">
                    <a href="{{ route('estoques.index') }}" class="btn btnPrimary">{{ __('estoque.cancel') }}</a>
                </div>

        </form>
    </div>
</div>
@endsection
<!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js" integri
  ty="sha256-u7MY6EG5ass8JhTuxBek18r5YG6pllB9zLqE4vZyTn4=" crossorigin="anonymous"></script> -->

<!-- <script type="text/javascript">
    $(document).ready(function($) {

        $('#cpf').mask('000.000.000-00');
        $('#contato').mask('(00) 00000-0000');
        $('#rg').mask('000.000.000');

    });
</script> -->