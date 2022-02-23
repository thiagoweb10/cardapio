<x-app-layout>
    <x-slot name="header">
        {{ __('Colaboradores') }}
    </x-slot>

    <div class="card">
        <div class="card-header d-flex justify-content-end">
            <a href="{{ route('admin.collaborators.create') }}" class="btn btn-primary">Cadastrar</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th colspan="2" style="width: 5px">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user )
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td> 
                            <a href="{{ route('admin.collaborators.edit', $user->id) }}" class="btn  bg-gradient-info">    
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            <a href="{{ route('admin.collaborators.destroy', $user->id) }}" onclick="event.preventDefault(); document.getElementById('form-delete-{{ $user->id }}').submit();" class="btn bg-gradient-danger">
                                <i class="fa-solid fa-trash-arrow-up"></i>
                            </a>
                            <form action="{{ route('admin.collaborators.destroy', $user->id) }}" id="form-delete-{{ $user->id }}" class="d-none" method="post">
                                @csrf
                                @method('delete')
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>
</x-app-layout>