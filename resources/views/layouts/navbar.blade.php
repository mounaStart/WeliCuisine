<div class="wrapper">
    <div class="multi_color_border"></div>
    <div class="top_nav">
        <div class="left">
            <div class="logo">
                <p><span>Diamwely</span>Restau</p>
            </div>
        </div>
        <div class="right">
            <ul>
                @if (Route::has('login'))
                    @auth
                        <li></li>
                        @else
                        <li><a href="{{url('login/agentr') }}">{{ __('Login My restaurant') }}</a></li>
                        <li><a href="{{ url('/newResto') }}"> {{ __('New restaurant') }}</a></li>
                    @endauth
                @endif
            </ul>
        </div>
    </div>
    <!-- Nav bar  -->
    <nav class="navbar navbar-expand-lg  justify-content-between " style="background :#f9f9f9 ;" id="mainNav">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/')}}">Home<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item"><a class="nav-link " href="#AllRestaurant">All Restaurant</a></li>
                    <li class="nav-item"><a class="nav-link     wrn-btn  " href="#">Search Restaurant</a></li>
                </ul>
                <ul class="navbar-nav  ms-auto py-4 py-lg-0">
                    @if (Route::has('login'))
                    @auth
                    <li class="nav-item">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="nav-link dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();"> {{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{route('cart.index')}}">Panier<i
                                class="fas fa-shopping-cart">
                            </i><span class="nav-link badge badge-pill badge-dark" style="color:#ffffff;">{{
                                Cart::count() }}</span></a> </li>
                    @else
                    <li class="nav-item"><a class="nav-link     wrn-btn  " href='{{  url("register/client") }}'>{{ __('Login') }} / {{__('Register') }}</a></li>
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" role="button">Registration</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href='{{  url("register/client") }}'>{{ __('Login') }} / {{
                                __('Register') }}</a>
                            <a class="dropdown-item" href="{{url('login/agentr') }}">{{ __('My restaurant') }}</a>
                            <a class="dropdown-item" href="{{ url('/newResto') }}"> {{ __('New restaurant') }}</a>
                        </div>
                    </li> -->
                    <li class="nav-item"><a class="nav-link" href="{{route('cart.index')}}">Panier<i
                                class="fas fa-shopping-cart">
                            </i><span class="nav-link badge badge-pill badge-dark" style="color:#ffffff;">{{
                                Cart::count() }}</span></a> </li>
                    @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</div>
