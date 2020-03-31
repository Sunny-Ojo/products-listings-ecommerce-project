<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>@yield('title', 'Sunshinecoders porducts listing | Welcome')</title>

        <!-- Bootstrap core CSS -->
        <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
          <!-- Custom styles for this template -->
        <link href="{{ asset('css1/shop-homepage.css') }}" rel="stylesheet" />
        <link href="{{asset('vendor1/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="/products">{{ config('app.name') }}</a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarResponsive"
                    aria-controls="navbarResponsive"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/products"
                                >Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="{{route('about')}}">About</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('contact.create')}}">Contact</a>
                        </li>
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('products.create') }}">
                                    <i class="fa fa-edit"></i> {{ __('Create a new Product') }}
                                 </a>

                                 <a class="dropdown-item" href="{{ route('viewmyproducts') }}">
                                   <i class="fa fa-th-list"></i>  {{ __('My    Products') }}
                                </a>
                                 <a class="dropdown-item" href="{{ route('viewcart') }}">
                                    <i class="fa fa-shopping-basket"></i>    {{ __('View    Cart') }}
                                    </a>
                                 <a class="dropdown-item" href="{{ route('viewwishlist') }}">
                                   <i class="fa fa-heart"></i>  {{ __('My    wishist') }}
                                 </a>
   <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                 <i class="fa fa-sign-out-alt"></i>    {{ __('Logout') }}
                                 </a>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                     @csrf
                                 </form>
                             </div>
                         </li>
                     @endguest

                     </ul>
                 </div>
             </div>
        </nav>

        <div class="container">

@yield('content')
        </div>
        <!-- Page Content -->

        <!-- /.container -->

        <!-- Footer -->
        {{-- <footer class="py-3 bg-dark mt-4">
            <div class="container">
                <p class="m-0 text-center text-white">
                    Copyright &copy; Sunshinecoder's Products listing, 2019 - {{ date('Y') }}
                </p>
            </div>
            <!-- /.container -->
        </footer> --}}

        <!-- Bootstrap core JavaScript -->
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    </body>
</html>
