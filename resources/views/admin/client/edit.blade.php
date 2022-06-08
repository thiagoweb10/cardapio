<x-app-layout>
    <x-slot name="header">
        {{ __('Categoria') }}
    </x-slot>
    <div class="card">
        <div class="card-body">      
            <form action="{{ route('admin.clients.update',$client->id) }}" method="post">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nome</label>
                                <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" value="{{ $client->name }}" placeholder="Enter name">
                                @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Celular</label>
                                <input type="text" class="form-control  @error('cell') is-invalid @enderror" id="cell" name="cell" value="{{ $client->cell }}" placeholder="Enter celular">
                                @error('cell')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Telefone</label>
                                <input type="text" class="form-control  @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ $client->phone }}" placeholder="Enter Telefone">
                                @error('phone')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="{{ route('admin.clients.index') }}" class="btn btn-dark">Voltar</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>