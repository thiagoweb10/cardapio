<x-app-layout>
    <x-slot name="header">
        {{ __('Categorias') }}
    </x-slot>

    <div class="card">
        <div class="card-header d-flex justify-content-end">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Cadastrar</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">ID</th>
                        <th>Nome</th>
                        <th>Celular</th>
                        <th colspan="2" style="width: 5px">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                    <tr>
                        <td>{{ $client->id }}</td>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->cell }}</td>
                        <td> 
                            <a href="{{ route('admin.clients.edit', $client->id) }}" class="btn  bg-gradient-info">    
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $clients->links() }}
        </div>
    </div>
</x-app-layout>