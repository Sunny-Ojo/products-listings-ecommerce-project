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

        <title>@yield('title', 'Sunshinecoders products listing | Welcome')</title>

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

        <!-- Page Content -->
        <div class="container">
            <div class="row ">
                <div class="col-lg-3">
                    <h1 class="my-4">Items<span class="text-danger">S</span><span class="text-warning">how</span> &circledR;</h1>
                    <div class="list-group">
                        <h4 class="bg-success text-white p-1 text-center">Categories</h4>
                        <a href="/products " class="list-group-item">All products</a>

                        @if (count($cat)> 0)
                            @foreach ($cat as $item)
                    <a href="/categories/{{$item->name}} " class="list-group-item">{{ $item->name }}</a>

                            @endforeach
                            @else
                            <p>No Categories yet</p>
                        @endif
                    </div>
                </div>
                <!-- /.col-lg-3 -->

                <div class="col-lg-9">
                    @include('layouts.msg')

                    <div
                        id="carouselExampleIndicators"
                        class="carousel slide my-4"
                        data-ride="carousel"
                    >
                        <ol class="carousel-indicators">
                            <li
                                data-target="#carouselExampleIndicators"
                                data-slide-to="0"
                                class="active"
                            ></li>
                            <li
                                data-target="#carouselExampleIndicators"
                                data-slide-to="1"
                            ></li>
                            <li
                                data-target="#carouselExampleIndicators"
                                data-slide-to="2"
                            ></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <img
                                    class="d-block img-fluid"
                                    src="{{ asset('img/image1.jpg') }}"
                                    alt="First slide"
                                />
                            </div>
                            <div class="carousel-item">
                                <img
                                    class="d-block img-fluid"
                                    src="{{ asset('img/download.jpg') }}"
                                    alt="Second slide"
                                />
                            </div>
                            <div class="carousel-item">
                                <img
                                    class="d-block img-fluid"
                                    src="{{ asset('img/img2.jpg') }}"
                                    alt="Third slide"
                                />
                            </div>
                        </div>
                        <a
                            class="carousel-control-prev"
                            href="#carouselExampleIndicators"
                            role="button"
                            data-slide="prev"
                        >
                            <span
                                class="carousel-control-prev-icon"
                                aria-hidden="true"
                            ></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a
                            class="carousel-control-next"
                            href="#carouselExampleIndicators"
                            role="button"
                            data-slide="next"
                        >
                            <span
                                class="carousel-control-next-icon"
                                aria-hidden="true"
                            ></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <hr class="bg-warning">
        <div class="row">
                                @yield('content')

        </div>

                    <!-- /.row -->
                </div>
                <!-- /.col-lg-9 -->
                </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->

        <!-- Footer -->
        <footer class="py-3 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white">
                    Copyright &copy; Sunshinecoder's Products listing, 2019 - {{ date('Y') }}
                </p>
            </div>
            <!-- /.container -->
        </footer>

        <!-- Bootstrap core JavaScript -->
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    </body>
</html>
