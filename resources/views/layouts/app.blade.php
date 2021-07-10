@if( $settings->first()->stop_website == 1 )
    
   <!DOCTYPE html>
   <html>
   <head>
       <title>Closed !</title>
   </head>
   <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
   <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
   <style>
       *
       {
        margin: 0;
        font-family: 'Poppins'
       }
       .websiteClosed
        {
            width: 100%;
            height: 100vh;
            background-color: #333;
            color: #fff;
            position: relative;
            text-align: center;
        }

        .websiteClosed .center
        {
            width: 700px;
            display: block;
            position: absolute;
            left: 25%;
            top: 200px
        }

        .websiteClosed h3
        {
            text-align: center;
            font-size: 40px
        }
        .websiteClosed p
        {
            text-align: center;
        }

        .websiteClosed span
        {
            text-align: center;
        }

        .websiteClosed span i
        {
            text-align: center;
            font-size: 200px;
            color: tomato
        }
   </style>
   <body>
    
     <div class="websiteClosed">
        <div class="center">
            <h3>The Website is Closed Now !</h3>
            <p>The Website Will Open a few hours later</p>
            <span><i class="fa fa-close"></i></span>
        </div>
    </div>

   </body>
   </html>

@else

<!DOCTYPE html>
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset($settings->first()->website_logo) }}" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $settings->first()->website_name }}</title>

    <!-- Scripts -->
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mediaQuery.css') }}" rel="stylesheet">
    
    @if( app()->getLocale() == 'ar' )
        <link href="{{ asset('css/websiteRTL.css') }}" rel="stylesheet">
    @endif


    @if( app()->getLocale() == 'en' )
     <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
      <style>
      *
      {
        font-family: 'Poppins', sans-serif;
      }

  </style>


    @else

        <style>

        @font-face {
            src: url("{{ asset('fonts/Sukar-Regular.otf') }}");
            font-family: Sukar;
        }

      a , th , label ,div , p , span , b , h1 , h2 , h3 , h4 , h5 , h6 , ul , li > a , a.dropdown-toggle
      {
        font-family: Sukar !important;
      }

    
  </style>


    @endif

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img style="width:60px;height: 60px;border-radius: 50%;border:2px solid tomato" src="{{ asset($settings->first()->website_logo) }}"> &nbsp;
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                         <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteName() == 'page.index' ? 'active' : '' }}" href="{{ url('/') }}"> <i class="fa fa-home"></i>  <span>{{ trans('backend.dashboard') }}</span> </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteName() == 'page.about' ? 'active' : '' }}" href="{{ route('page.about') }}"> <i class="fa fa-user-plus"></i> <span>{{ trans('backend.about') }}</span> </a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteName() == 'page.contact' ? 'active' : '' }}" href="{{ route('page.contact') }}"> <i class="fa fa-envelope"></i> <span>{{ trans('backend.contact') }}</span> </a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteName() == 'page.services' ? 'active' : '' }}" href="{{ route('page.services') }}"> <i class="fa fa-cog"></i> <span>{{ trans('backend.services') }}</span> </a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteName() == 'page.meals' ? 'active' : '' }}" href="{{ route('page.meals') }}"> <i class="fa fa-cutlery"></i> <span>{{ trans('backend.meals') }}</span> </a>
                        </li>
                         
                        <li class="nav-item dropdown categories">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               <i class="fa fa-tag"></i> <span>{{ trans('backend.categories') }}</span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              @foreach($categories as $category)
                                <a class="dropdown-item" href="{{ route('meal.category' , $category->id) }}">{{ $category->name }}</a>
                              @endforeach
                            </div>
                          </li>


                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() == 'user.login' ? 'active' : '' }}" href="{{ route('user.login') }}"> <i class="fa fa-sign-in"></i> <span>{{ trans('backend.login') }}</span> </a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() == 'user.register' ? 'active' : '' }}" href="{{ route('user.register') }}"> <i class="fa fa-lock"></i> <span>{{ trans('backend.register') }}</span> </a>
                            </li>
                            
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img style="border:2px solid white;width: 40px;height: 40px;border-radius: 50%" src="{{ asset(auth()->guard('web')->user()->avatar) }}"> &nbsp; {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu profile dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('user.profile') }}"> <i class="fa fa-user-circle fa-lg fa-fw"></i> {{ trans('backend.profile') }}</a>
                                    <a class="dropdown-item" href="{{ route('user.myorder') }}"> <i class="fa fa-shopping-cart fa-lg fa-fw"></i> {{ trans('backend.myorders') }}</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"> <i class="fa fa-power-off fa-lg fa-fw"></i> {{ trans('backend.logout') }}</a>
                                </div>
                            </li>
                        @endguest

                        <div class="clearboth"></div>

                        <!-- Select The Website Language -->
                        <li class="nav-item dropdown languages">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                
                                @if( app()->getLocale() == 'en' )
                                    <img style="width:30px;height: 30px" src="{{ asset('uploads/languages/english.png') }}">
                                @else
                                    <img style="width:30px;height: 30px" src="{{ asset('uploads/languages/arabic.png') }}">
                                @endif

                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                
                                 @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                            <a rel="alternate" hreflang="{{ $localeCode }}"  class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                {{ $properties['native'] }}
                                            </a>
                                    @endforeach
                            </div>
                        </li>


                    </ul>
                </div>
            </div>
        </nav>

        <main class="">
            @yield('content')
        </main>
    </div>



    <!-- Footer -->
    <div class="footer">
        <div class="container">
            
            <div class="row">
                <div class="col-md-6">
                    <p>Copyrights &copy; all rights  reseved 2019</p>
                </div>
                <div class="col-md-6 text-center">
                    <i class="fa fa-facebook fa-2x"></i>
                    <i class="fa fa-twitter fa-2x"></i>
                    <i class="fa fa-youtube fa-2x"></i>
                </div>
            </div>

        </div>
    </div>


    
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/frontend.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            @if( session()->has('success') )
                swal('{{ trans("backend.greatjob") }}' , '{{ session()->get("success") }}' , 'success');
            @endif

            // Storing Comment By AJAX ..
            $('#addComment').submit(function(e){
                e.preventDefault();

                var url = $(this).attr('action');

                $.ajax({

                    url : url ,
                    type : 'POST',
                    dataType : 'HTML',
                    data : $(this).serialize(),
                    success : function(data){
                        $('#addComment')[0].reset();
                        location.reload(true);
                    }

                });

            });


            // Confirm Order ..
            $('#userOrder').click(function(){
                return confirm('Confirm Order !');
            });



            // Image Preview ...
            $("#image").change(function() {
              if (this.files && this.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                  $('#imagePreview').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(this.files[0]);
              }
            });


            // Confirm Delete Order ...
            $('#myOrder').click(function(){
                return confirm('Are You Sure ');
            });


        });
    </script>
</body>
</html>


@endif