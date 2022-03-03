<x-app-layout>
    <x-slot name="header">
        {{ __('Produtos') }}
    </x-slot>
    <div class="card">
        <div class="card-body">      
            
            <form enctype="multipart/form-data" action="{{ route('admin.products.update', $product->id) }}" method="post">              
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="form-group">
                      <label for="image">Imagem</label>
                      <input type="file" class="form-control" name="photo" id="photo">
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="Codigo">Codigo</label>
                                <input type="text" class="form-control  @error('code') is-invalid @enderror" id="code" name="code" value="{{ $product->code }}" placeholder="Enter code">
                                @error('code')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nome</label>
                                <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" value="{{ $product->name }}" placeholder="Enter name">
                                @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="category_id">Categoria</label>
                                <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                    <option value="" selected> Selecione</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected':'' }}> {{ $category->name }}</option>  
                                        @endforeach
                                </select>
                                @error('category_id')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="price">Valor</label>
                                <input type="text" class="form-control  @error('price') is-invalid @enderror" id="price" name="price" value="{{ $product->price }}" placeholder="Enter price">
                                @error('price')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="Description">Descrição</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" cols="30" rows="5">{{ $product->description }}</textarea>
                                @error('description')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-dark">Voltar</a>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('js/mask/mask.js') }}" defer></script>
</x-app-layout>