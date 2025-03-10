<x-guest-layout>
    @push('css')
        <link rel="stylesheet" href="{{ mix('css/cardapio.css') }}" >
    @endpush
    <x-header />
    
    <div class="d-flex justify-content-center justify-content-center mt-3">
        <div class="col-lg-6 col-sm-12 align-items-center align-content-center">
            @foreach ( $products as $product )
                <div class="d-flex flex-row justify-content-center mt-2  p-2 box-item-car rounded flex-grow-1">
                    
                    <div class="p-2 w-40">
                        <img src="http://127.0.0.1:8000/storage/products/{{ $product['product']->photo }}" alt="" width="100" height="100">
                    </div>
                    <div class="p-2 w-100">
                        <h3>{{ $product['product']->name }}</h3>
                        <p> Quantidade: {{ $product['quantity'] }}</p>
                        <div class="float-left mt- h4 font-weight-bold text-warning ">
                            {{ 'R$ '.number_format(floatval($product['total']),2,",",".") }}
                        </div>
                        <div class="float-right align-self-end">
                            <a href="{{ route('menu.cart.add', $product['product']->id) }}" class="btn btn-warning " title="Aumentar Quantidade do Item">
                                <i class="fas fa-plus-circle green-text" style="color: white"></i> 
                            </a>
                            <a href="{{ route('menu.cart.remove', $loop->index) }}" class="btn btn-danger" title="Remover">
                                <i class="fas fa-trash"></i> 
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
             
        </div>
    </div>
    
    <div class="container">
        <form action="{{ route('menu.cart.checkout') }}" class="mt-3" method="post">
            @csrf
            <div class="p-2 mb-3 bg-purple text-right rounded" style="color: #ffb800 !important">
                <strong>Total: </strong> {{ 'R$ '.number_format( floatval($products->sum('total')) ,2,",",".") }}
            </div>
            
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <div class="card card-primary collapsed-card">
                        <div class="card-header  bg-purple">
                            <h3 class="card-title">Dados Cliente</h3>
                            <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                            </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="name">Nome</label>
                                        <input type="text" class="form-control" id="name" name="name">
                                        @error('name')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="phone">Telefone</label>
                                        <input type="text" class="form-control" id="phone" name="phone">
                                        @error('phone')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="cell">Celular</label>
                                        <input type="text" class="form-control" id="cell" name="cell">
                                        @error('cell')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="cell"> Tipo de Pagamento </label>
                                        <select name="type_payment_id" id="type_payment_id" class="form-control">
                                            <option value="">Selecione</option>
                                            @foreach ( $typePayments as $typePayment )
                                                <option value="{{ $typePayment->id }}">{{ $typePayment->name }}</option>
                                            @endforeach
                                        </select>
                                        
                                        
                                        @error('cell')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <p class="font-weight-bold">Vai ser entrega ? </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <div class="form-group ml-4">
                                        <input type="radio" name="delivery" value="false" id="delivery-no" class="form-check-input">
                                        <label for="delivery-no" class="form-check-label">Não</label>
                                    </div>
                                </div>
                                <div class="col-1">
                                    <div class="form-group">
                                        <input type="radio" checked name="delivery" value="true" id="delivery-yes" class="form-check-input">
                                        <label for="delivery-yes" class="form-check-label">Sim</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="card card-primary collapsed-card">
                        <div class="card-header  bg-purple">
                            <h3 class="card-title">Dados Entrega</h3>
                            <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                            </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="zipcode">CEP</label>
                                        <input type="text" class="form-control" id="zipcode" name="zipcode">
                                        @error('zipcode')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="address">Endereço</label>
                                            <input type="text" class="form-control" id="address" name="address">
                                            @error('address')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="number">Numero</label>
                                            <input type="text" class="form-control" id="number" name="number">
                                            @error('number')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="neigbordhood">Bairro</label>
                                        <input type="text" class="form-control" id="neighborhood" name="neighborhood">
                                        @error('neighborhood')
                                                <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="complement">Complemento</label>
                                        <input type="text" class="form-control" id="complement" name="complement">
                                        @error('complement')
                                                <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="city">Cidade</label>
                                        <input type="text" class="form-control" id="city" name="city">
                                        @error('city')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="state">Estado</label>
                                        <input type="text" class="form-control" id="state" name="state">
                                        @error('state')
                                                <span class="text-danger  small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end card-footer border rounded">
                <a href="{{ route('home') }}" class="btn btn-primary"> Continuar Comprando</a> &nbsp;
                <button class="btn btn-success"> Finalizar Compra</button>
            </div>
        </form>
    </div>
    @push('scripts')
        <script>
            document.getElementById('zipcode').addEventListener('change', function(){
                fetch(`https://viacep.com.br/ws/${this.value}/json/`)
                    .then(e => e.json())
                    .then(response => {
                        document.getElementById('address').value = response.logradouro;
                        document.getElementById('neighborhood').value = response.bairro;
                        document.getElementById('complement').value = response.complemento;
                        document.getElementById('city').value = response.localidade;
                        document.getElementById('state').value = response.uf;
                    });
            });
        </script>
    @endpush
</x-guest-layout>