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
                        <th>Status</th>
                        <th colspan="2" style="width: 5px">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ __($category->status) }}</td>
                        <td> 
                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn  bg-gradient-info">    
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            <a href="{{ route('admin.categories.destroy', $category->id) }}" onclick="event.preventDefault(); document.getElementById('form-delete-{{ $category->id }}').submit();" class="btn bg-gradient-danger">
                                <i class="fa-solid fa-trash-arrow-up"></i>
                            </a>
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" id="form-delete-{{ $category->id }}" class="d-none" method="post">
                                @csrf
                                @method('delete')
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $categories->links() }}
        </div>
    </div>
</x-app-layout>