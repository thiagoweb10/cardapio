<x-guest-layout>
    @push('css')
        <link rel="stylesheet" href="{{ mix('css/cardapio.css') }}" >
    @endpush    
<x-header />

<h2 class="mt-4 mb-3 ml-5 font-weight-bold">Mais Pedidos</h2>

<section id="produtos">
    @foreach ($categories as $category )
        @foreach ( $category->products as $product )
            <section class="produto rounded">
                <img src="{{ asset('storage/products/'.$product->photo) }}" alt="Black label" width="210" height="210">
                <p>{{ $product->name }}</p>
                <h4 class="font-weight-bold text-color-price">R$ {{ number_format($product->price,2,",",".") }}</h4>
                <div class="text-center">
                    <a href="{{ route('menu.cart.add', $product->id) }}">
                        <p class="font-weight-bold bto-adicionar text-center">&nbsp; Adicionar Ao Carrinho &nbsp;</p>
                    </a>
                </div>
            </section>
        @endforeach
    @endforeach
</section>

<x-navegation-footer />
</x-guest-layout>