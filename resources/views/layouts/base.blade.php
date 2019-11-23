<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/bootstrap/sidebar.css') }}" rel="stylesheet">

        {{-- Javascript import --}}
        <script defer src="{{ asset('js/custom/fontawesome/solid.js') }}" ></script>
        <script defer src="{{ asset('js/custom/fontawesome/fontawesome.js') }}" ></script>
        {{-- Extra Style --}}
        @yield('customCSS')


    </head>
    <body>
        
        <div class="wrapper">
            <!-- Sidebar  -->
          <nav id="sidebar">
            <div class="sidebar-header">
                <h3><img class="img-fluid rounded-circle img-thumbnail mx-auto d-block" width="50%" src="{{ asset('images/logo.png') }}" alt="Projet Menvele'ele Logo"></h3>
                <strong>PM</strong>
            </div>

            <ul class="list-unstyled components">
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-home"></i>
                        Home
                    </a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Home 1</a>
                        </li>
                        <li>
                            <a href="#">Home 2</a>
                        </li>
                        <li>
                            <a href="#">Home 3</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-archive"></i>
                        Archives
                    </a>
                    <a href="#">
                        <i class="fas fa-briefcase"></i>
                        Documents
                    </a>
                    <a href="#">
                        <i class="fas fa-copy"></i>
                        Fichiers
                    </a>
                    <a href="{{ route('all_services') }}">
                        <i class="fas fa-briefcase"></i>
                        Services
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-users"></i>
                        Gestion des utilisateurs
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-cog"></i>
                        Paramètres
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

              <button type="button" id="sidebarCollapse" class="btn btn-light">
                  <strong><</strong>
                  <i class="fas fa-align-left"></i>
                  <strong>></strong>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="nav navbar-nav ml-auto">
                      {{-- <li class="nav-item active">
                          <a class="nav-link" href="#">Page</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="#">Page</a>
                      </li>--}}
                      <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-user"></i> Profile</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="#"><i class="fas fa-power-off"></i> Déconnexion</a>
                      </li> 
                  </ul>
              </div>
            </div>
          </nav>

            @yield('content')
        </div>
        </div>

        

        {{-- Javascript import --}}
        <script src="{{ asset('js/custom/jquery-3.3.1.slim.min.js') }}" ></script>
        <script src="{{ asset('js/custom/popper.min.js') }}" ></script>
        <script src="{{ asset('js/custom/bootstrap.min.js') }}" ></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar').toggleClass('active');
                });
            });
        </script>

        {{-- Custom Js --}}
        @yield('customJS')

    </body>

</html>