<x-app-layout>
    <x-slot name="header">
        {{ __('Colaboradores') }}
    </x-slot>

    

    <div class="card">
        <div class="card-body">      
            <form action="{{ route('admin.collaborators.update', $user->id) }}" method="post">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nome</label>
                                <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" value="{{ $user->name }}" placeholder="Enter name">
                                @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $user->email }}" placeholder="Enter email">
                                @error('email')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Senha</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
                                @error('password')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Confirme a Senha</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Password">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Alterar</button>
                    <a href="{{ route('admin.collaborators.index') }}" class="btn btn-dark">Voltar</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>