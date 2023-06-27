@extends('home')

@section('title', 'Erro')

@section('content')
<div class="cardContainer">
    <div class="cardContainerContent">
        <div class="cardBody">
            <h2>Erro</h2>
            <p>{{ $message }}</p>
        </div>
    </div>
</div>
@endsection