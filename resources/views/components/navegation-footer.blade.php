<div class="d-flex justify-content-center  bottom-0 end-0">
    <div class="p-2">
        <a href="/" class="btn btn-app" title="Inicio">
            <i class="fas fa-home"></i>
        </a>
    </div>
    <div class="p-2">
        <a href="{{ route('menu.search') }}" class="btn btn-app" title="Pesquisar">
            <i class="fas fa-search"></i>
        </a>
    </div>
    <div class="p-2">
        <a href="{{ route('menu.cart') }}" class="btn btn-app" title="Minhas Compras">
            <span class="badge bg-purple">{{ session()->get('itemsCar') }}</span>
            <i class="fas fa-shopping-cart"></i>
        </a>
    </div>
</div>