<x-app-layout>
    <x-slot name="header">
        {{ __('Categoria') }}
    </x-slot>
    <div class="card">
        <div class="card-body">      
            <form action="{{ route('admin.categories.update',$category->id) }}" method="post">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nome</label>
                                <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" value="{{ $category->name }}" placeholder="Enter name">
                                @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Status</label>
                                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                    <option value=""> Selecione</option>
                                    <option value="active"   {{ $category->status == 'active'   ? 'selected':'' }}>Ativo</option>
                                    <option value="inactive" {{ $category->status == 'inactive' ? 'selected':'' }}>Inativo</option>
                                </select>
                                @error('status')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-dark">Voltar</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>