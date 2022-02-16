<x-guest-layout>
    <div class="login-box">
        <div class="card card-outline card-primary">
           <div class="card-header text-center">
              <a href="{{ route('home') }}" class="h4"><b>Cardapio</b> <h6>Online</h6></a>
           </div>
           <div class="card-body">
              <p class="login-box-msg">Sign in to start your session</p>
              <form action="{{ route('login') }}" method="post">
                @csrf
                 <div class="input-group mb-3">
                    <input type="email" class="form-control @error('email') is-invalid  @enderror" name="email" placeholder="E-mail">
                    <div class="input-group-append">
                       <div class="input-group-text">
                          <span class="fas fa-envelope"></span>
                       </div>
                    </div>
                 </div>
                 @error('email')
                        <span class=" input-group mb-3 alert alert-danger"> {{ $message }}</span> 
                    @enderror
                 <div class="input-group mb-3">
                    <input type="password" class="form-control @error('password') is-invalid  @enderror" name="password" placeholder="Senha">
                    <div class="input-group-append">
                       <div class="input-group-text">
                          <span class="fas fa-lock"></span>
                       </div>
                    </div>
                 </div>
                    @error('password')
                        <span class=" input-group mb-3 alert alert-danger"> {{ $message }}</span> 
                    @enderror
                 <div class="row">
                    <div class="col-8">
                       <div class="icheck-primary">
                          <input type="checkbox" name="remember" id="remember">
                          <label for="remember">
                          Remember Me
                          </label>
                       </div>
                    </div>
                    <div class="col-4">
                       <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                    </div>
                 </div>
              </form>
              
              <div class="social-auth-links text-center mt-2 mb-3">
                 <a href="#" class="btn btn-block btn-primary">
                    <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                 </a>
                 <a href="#" class="btn btn-block btn-danger">
                    <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                 </a>
              </div>
              <p class="mb-1">
                 <a href="{{ route('password.request') }}">I forgot my password</a>
              </p>
              <!--
                <p class="mb-0">
                    <a href="register.html" class="text-center">Register a new membership</a>
                </p>
              -->
           </div>
        </div>
     </div>
</x-guest-layout>
