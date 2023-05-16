<div class="sidebarContainer">
    <div class="profileSection">
        <p>SigRestaurant</p>
    </div>

    <nav class="selectContainer">
        <a class="navContainer">
            <x-bi-cart-fill class="icon" />
            <p>Pedidos</p>
        </a>
        <a class="btn navContainer" href="{{ route('funcionarios.index') }}">
            <x-bi-person-fill class="icon" />
            <p>Funcionários</p>
        </a>
        <a class="btn navContainer" href="{{ route('estoques.index') }}">
            <!-- <x-bi-bag-fill class="icon" /> -->
            <!-- <x-bi-box-fill class="icon" /> -->
            <x-bi-boxes class="icon" />
            <p>Estoques</p>
        </a>
    </nav>

</div>