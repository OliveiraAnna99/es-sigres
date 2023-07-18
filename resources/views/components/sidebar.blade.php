<div class="sidebarContainer">
    <p class="logo-sidebar"><span>Sig</span>Restaurant</p>

    <nav class="selectContainer">
        @can('funcionario.all')
        <a class="navContainer {{request()->routeIs('funcionarios*') ? 'active' : ''}}" href="{{ route('funcionarios.index') }}">
            <x-bi-person-fill class="icon" />
            <p>Funcionários</p>
        </a>
        @endcan
        @can('pedido.all')
        <a class="navContainer {{request()->routeIs('pedidos*') ? 'active' : ''}}" href="{{ route('pedidos.index') }}">
            <x-bi-cart-fill class="icon" />
            <p>Pedidos</p>
        </a>
        @endcan
        @can('estoque.all')
        <a class="navContainer {{request()->routeIs('estoques*') ? 'active' : ''}}" href="{{ route('estoques.index') }}">
            <!-- <x-bi-bag-fill class="icon" /> -->
            <!-- <x-bi-box-fill class="icon" /> -->
            <x-bi-boxes class="icon" />
            <p>Estoque</p>
        </a>
        @endcan
        @can('cardapio.all')
        <a class="navContainer {{request()->routeIs('cardapios*') ? 'active' : ''}}" href="{{ route('cardapios.index') }}">
            <!-- <x-bi-bag-fill class="icon" /> -->
            <!-- <x-bi-box-fill class="icon" /> -->
            <x-bi-book-fill class="icon" />
            <p>Cardápio</p>
        </a>
        @endcan
        @can('cardapio.all')
        <a class="navContainer {{request()->routeIs('formas_pagamentos*') ? 'active' : ''}}" href="{{ route('forma_pagamentos.index') }}">
            <!-- <x-bi-bag-fill class="icon" /> -->
            <!-- <x-bi-box-fill class="icon" /> -->
            <x-bi-cash-coin class="icon" />
            <p>Formas de Pagamento</p>
        </a>
        @endcan
        <a class="navContainer" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
            <x-bi-door-closed-fill class="icon" />
            <p>Sair</p>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </nav>

</div>