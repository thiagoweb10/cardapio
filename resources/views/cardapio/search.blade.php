<x-guest-layout>
    @push('css')
        <link rel="stylesheet" href="{{ mix('css/cardapio.css') }}" >
    @endpush  
<x-header />
<h1 class="mt-2 ml-4 font-weight-bold">Menu</h1>
<form action="#">
    <div class="d-flex justify-content-center mt-1 p-4">
        <input type="text" id="search"  class="form-control" placeholder="Pesquisar">
    </div>
</form>

<section id="produtos">
    @foreach ($categories as $category )
        @foreach ( $category->products as $product )
            <section class="produto rounded">
                <img src="{{ asset('storage/products/'.$product->photo) }}" alt="Black label" width="210" height="210">
                <p>{{ $product->name }}</p>
                <h4 class="font-weight-bold text-color-price">R$ {{ number_format($product->price,2,",",".") }}</h4>
                <div class="text-center">
                    <a href="{{ route('menu.cart.add', $product->id) }}">
                        <p class="font-weight-bold bto-adicionar text-center">&nbsp; Adicionar &nbsp;</p>
                    </a>
                </div>
            </section>
        @endforeach
    @endforeach
</section>

<x-navegation-footer />
</x-guest-layout>