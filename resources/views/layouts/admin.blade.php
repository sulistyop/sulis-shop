<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- include summernote css/js -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
      .navbar{
        z-index: 1;
        top:0;
        display:block;
        position: fixed;
        width: 100%;
      }
    </style>
  </head>
  <body>
      <input type="checkbox" id="check">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse  justify-content-end" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
                <label class="nav-link" for="check">
                    <i class="fas fa-bars" id="sidebar_btn"></i>
                </label>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                    </form>
                    <a class="dropdown-item" href="{{ route('logout') }}">Profile</a>
                </div>
            </li>
          </ul>
        </div>
      </nav>

    <!--header area end-->
    <!--mobile navigation bar start-->
    <div class="mobile_nav">
      <div class="nav_bar">
        <img src="https://badoystudio.com/wp-content/uploads/2018/05/usericon.png" class="mobile_profile_image" alt="">
        <i class="fa fa-bars nav_btn"></i>
      </div>
      <div class="mobile_nav_items">
        <a href="/dashboard"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
        {{-- <a href="#"><i class="fas fa-cogs"></i><span>Components</span></a> --}}
        <a href="/products"><i class="fas fa-table"></i><span>Product</span></a>
        <a href="/category"><i class="fas fa-table"></i><span>Category</span></a>
        {{-- <a href="#"><i class="fas fa-th"></i><span>Forms</span></a> --}}
        {{-- <a href="#"><i class="fas fa-info-circle"></i><span>About</span></a> --}}
        <a href="/setting"><i class="fas fa-receipt"></i><span>Orderan</span></a>
        <a href="/setting"><i class="fas fa-sliders-h"></i><span>Settings</span></a>
      </div>
    </div>
    <!--mobile navigation bar end-->
    <!--sidebar start-->
    <div class="sidebar">
      <div class="profile_info">
        <img src="https://badoystudio.com/wp-content/uploads/2018/05/usericon.png" class="profile_image" alt="">
        <h4>Jessica</h4>
      </div>
      <a href="/dashboard"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
      {{-- <a href="#"><i class="fas fa-cogs"></i><span>Components</span></a> --}}
      <a href="/products"><i class="fas fa-table"></i><span>Product</span></a>
      <a href="/category"><i class="fas fa-table"></i><span>Category</span></a>
      {{-- <a href="#"><i class="fas fa-th"></i><span>Forms</span></a> --}}
      {{-- <a href="#"><i class="fas fa-info-circle"></i><span>About</span></a> --}}
      <a href="/setting"><i class="fas fa-receipt"></i><span>Orderan</span></a>
      <a href="/setting"><i class="fas fa-sliders-h"></i><span>Settings</span></a>
    </div>
    <!--sidebar end-->

    <div class="content">
        @yield('content')
    </div>

    <script type="text/javascript">
    $(document).ready(function(){
      $('.nav_btn').click(function(){
        $('.mobile_nav_items').toggleClass('active');
      });
    });
    </script>
   <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
   <script type="text/javascript">
   $('#summernote').summernote({
       height: 150
   });
   </script>
  </body>
</html>
                           