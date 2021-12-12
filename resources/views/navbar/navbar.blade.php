 
<div class="wrapper">
    <div class="multi_color_border"></div>
    <div class="top_nav">
        <div class="left">
          <div class="logo"><p><span>Diamwely</span>Restau</p></div>
        </div> 
        <div class="right">
            <ul>
                @if (Route::has('login'))
                    @auth 
                    <li></li>
                        @else
                            <li><a  href="{{url('login/agentr') }}">{{ __('Login My  restaurant') }}</a></li>
                            <li><a href="{{ url('/newResto') }}"> {{ __('New restaurant') }}</a></li>
                    @endauth
                @endif
            </ul>
        </div>
    </div>

<nav class="navbar navbar-dark navbar-expand-md    fixsed-top dropdownmenu" id="mainNav">
<div class="container">
  <a class="navbar-brand" href="#page-top"><img src="/assets/img/navbar-logo.svg" alt="..." /></a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    Menu
    <i class="fas fa-bars ms-1"></i>
  </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
  <ul class="navbar-nav  ms-auto py-4 py-lg-0">
  <li class="nav-item"><a class="nav-link "  href="{{url('/')}}">Home</a></li>
      <li class="nav-item"><a class="nav-link "  href="#AllRestaurant">All Restaurant</a></li>
      <li class="nav-item"><a class="nav-link     wrn-btn  " href="#">Search Restaurant</a></li>
  @if (Route::has('login'))
  @auth 
          <li class="nav-item">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
  @else
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true"
         aria-expanded="false" role="button">Registration</a>
        <div class="dropdown-menu" >
          <a class="dropdown-item" href='{{  url("register/client") }}'>{{ __('Login') }} / {{ __('Register') }}</a>
          <a class="dropdown-item" href="{{url('login/agentr') }}">{{ __('My  restaurant') }}</a>
          <a class="dropdown-item"  href="{{ url('/newResto') }}"> {{ __('New restaurant') }}</a>
        </div>
      </li>
      <li class="nav-item"><a class="nav-link" href="{{route('cart.index')}}">Panier<i class="fas fa-shopping-cart">
      </i><span class="nav-link badge badge-pill badge-dark" style="color:#ffffff;">{{ Cart::count() }}</span></a> </li>
  @endauth
@endif               
    </ul>
  </div>
</div>
</nav>


<div class="banner">
    <img src="/assets/img/MAURITANIE-BONAVA.jpg"   alt="banner_img">
  </div>


  
<div class="wrapper">
    <div class="multi_color_border"></div>
    <div class="top_nav">
        <div class="left">
          <div class="logo"><p><span>Diamwely</span>Restau</p></div>
        </div> 
        <div class="right">
            <ul>
                @if (Route::has('login'))
                    @auth 
                    <li></li>
                        @else
                            <li><a  href="{{url('login/agentr') }}">{{ __('Login My  restaurant') }}</a></li>
                            <li><a href="{{ url('/newResto') }}"> {{ __('New restaurant') }}</a></li>
                    @endauth
                @endif
            </ul>
        </div>
    </div>

     

    <!-- <div class="bottom_nav"> -->

    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
     </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="{{url('/')}}">Home <span class="sr-only">(current)</span></a></li>
        <li><a  href="#AllRestaurant">All Restaurant</a></li>
        <li><a class="wrn-btn" href="#">Search Restaurant</a></li>
       
      </ul>

      <ul class="nav navbar-nav navbar-right">
      @if (Route::has('login'))
  @auth 
    <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" 
          aria-expanded="false"> {{ Auth::user()->name }} <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a  href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();"> {{ __('Logout') }}</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
            </li>
         </ul>
    </li>
  @else
       <li><a href='{{  url("login/client") }}'>{{ __('Login') }} / {{ __('Register') }}</a></li>
  <li><a href="{{route('cart.index')}}"><sapn class="glyphicon glyphicon-shopping-cart">
</span><span class="nav-link badge badge-pill badge-dark" style="color:#ffffff;">{{ Cart::count() }}</span></a> </li>
  @endauth
@endif     
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
  
  </div>
  
  <div class="banner">
    <img src="/assets/img/MAURITANIE-BONAVA.jpg"   alt="banner_img">
  </div>
</div>







<div class="wrapper">
    <div class="multi_color_border"></div>
    <div class="top_nav">
        <div class="left">
          <div class="logo"><p><span>Diamwely</span>Restau</p></div>
        </div> 
        <div class="right">
            <ul>
                @if (Route::has('login'))
                    @auth 
                    <li></li>
                        @else
                            <li><a  href="{{url('login/agentr') }}">{{ __('Login My  restaurant') }}</a></li>
                            <li><a href="{{ url('/newResto') }}"> {{ __('New restaurant') }}</a></li>
                    @endauth
                @endif
            </ul>
        </div>
    </div>

<nav class="navbar navbar-default navbar-expand   fixsed-top dropdownmenu" id="mainNav">
<div class="container">
  <a class="navbar-brand" href="#page-top"><img src="/assets/img/navbar-logo.svg" alt="..." /></a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    Menu
    <i class="fas fa-bars ms-1"></i>
  </button>
  
  <div class="collapse navbar-collapse" id="navbarResponsive">
  <ul class="navbar-nav  ms-auto py-4 py-lg-0">
  <li class="nav-item"><a class="nav-link "  href="{{url('/')}}">Home</a></li>
      <li class="nav-item"><a class="nav-link "  href="#AllRestaurant">All Restaurant</a></li>
      <li class="nav-item"><a class="nav-link     wrn-btn  " href="#">Search Restaurant</a></li>
  @if (Route::has('login'))
  @auth 
          <li class="nav-item">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
  @else
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true"
         aria-expanded="false" role="button">Registration</a>
        <div class="dropdown-menu" >
          <a class="dropdown-item" href='{{  url("register/client") }}'>{{ __('Login') }} / {{ __('Register') }}</a>
          <a class="dropdown-item" href="{{url('login/agentr') }}">{{ __('My  restaurant') }}</a>
          <a class="dropdown-item"  href="{{ url('/newResto') }}"> {{ __('New restaurant') }}</a>
        </div>
      </li>
      <li class="nav-item"><a class="nav-link" href="{{route('cart.index')}}">Panier<i class="fas fa-shopping-cart">
      </i><span class="nav-link badge badge-pill badge-dark" style="color:#ffffff;">{{ Cart::count() }}</span></a> </li>
  @endauth
@endif               
    </ul>
  </div>
</div>
</nav> -->
