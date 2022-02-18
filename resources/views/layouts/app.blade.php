<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/fontawesome.css') }}">
        <link rel="stylesheet" href="{{ mix('css/icheck-bootstrap.css') }}">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        


    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            @include('layouts.navigation')

            <!-- Page Content -->
            <div class="content-wrapper">
                 
                <div class="content-header">
                    <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                        <h1 class="m-0"> {{ $header }}</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                
                {{ $slot }}
            </div>

            <footer class="main-footer">
                <strong>Copyright © 2022 <a href="{{ route('dashboard') }}"> {{ config('app.name') }}</a>.</strong>
                Todos os direitos reservados.
                <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
                </div>
            </footer>
        </div>
        
        <script src="{{ mix('js/jquery.js') }}" defer></script>
        <script src="{{ mix('js/jquery-ui.js') }}" defer></script>
        <script src="{{ mix('js/bootstrap.bundle.min.js') }}" defer></script>
        <script src="{{ mix('js/adminlte.min.js') }}" defer></script>
        <script src="{{ mix('js/demo.js')}}"></script>
    </body>
</html>
