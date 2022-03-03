<x-app-layout>
    <x-slot name="header">
        {{ __('Produtos') }}
    </x-slot>

    <div class="card">
        <div class="card-header d-flex justify-content-end">
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Cadastrar</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">Codigo</th>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th colspan="2" style="width: 5px">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td> 
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn  bg-gradient-info">    
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            <a href="{{ route('admin.products.destroy', $product->id) }}" onclick="event.preventDefault(); document.getElementById('form-delete-{{ $product->id }}').submit();" class="btn bg-gradient-danger">
                                <i class="fa-solid fa-trash-arrow-up"></i>
                            </a>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" id="form-delete-{{ $product->id }}" class="d-none" method="post">
                                @csrf
                                @method('delete')
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $products->links() }}
        </div>
    </div>
</x-app-layout>