 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link"  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('form-logout').submit()" role="button">Sair</a>
        <form id="form-logout" action="{{ route('logout') }}"  method="post" class="d-none">
            @csrf 
        </form>
        
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
      <img src="{{ asset('img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image"> 
          <img src="{{ asset(auth()->user()->logo ?? 'img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-item">
            <x-nav-link href="{{ route('dashboard') }}" active="dashboard">
                <i class="fas fa-home-lg"></i>
                <i class="fas fa-solid fa-house-user"></i>
                <p>
                    Home
                </p>
            </x-nav-link>
          </li>
          <li class="nav-item">
            <x-nav-link href="#" active="">
                <i class="fas fa-users"></i>
                <p>Clientes</p>
            </x-nav-link>
          </li>
          <li class="nav-item">
            <x-nav-link href="#" active="">
                <i class="fas fa-list"></i>
                <p>Categorias</p>
            </x-nav-link>
          </li>
          <li class="nav-item">
            <x-nav-link href="#" >
                <i class="fas fa-th-list"></i>
                <p>Produtos</p>
            </x-nav-link>
          </li>
          <li class="nav-item">
            <x-nav-link href="#" active="">
                
                <i class="fas fa-shopping-basket"></i>
                <p> Pedidos </p>
            </x-nav-link>
          </li>
          
        </ul>
      </nav>
    </div>
  </aside>
