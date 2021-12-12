<style>
  

.text-gray {
    color: #aaa
}

.img {
    height: 170px;
    width: 140px
}
    </style>

    
<div class="container py-5">

<h2  ><b classe="block-title" style="color:#000;">List des produits </b></h2><br>
    @foreach($restaurant_menus->unique() as $restaurants_menu)
        @foreach($menus->unique() as $menu)
            @if( $restaurants_menu->Id_Menu == $menu->Id  && $restaurants_menu->Id_Restaurant == $restaurants->Id_Restau)               
                <div class="row">
                <div class="col-lg-12 mx-aluto">
                        <!-- List group-->
                        <ul class="list-grolup shadlow">                        
                            <div class="row">
                                @foreach($menu_type_menus->unique()  as $menu_type_menu)
                                    @foreach($phot_plats->unique()  as $phot_plat)
                                        @foreach($plats->unique()  as $plat)
                                            @foreach($type_menus->unique()  as $type_menu)
                                                @if($menu_type_menu->id_menu == $restaurants_menu->menus->Id &&
                                                    $menu_type_menu->id_contenue_menu == $plat->Id &&

                                                    $plat->Id == $phot_plat->Id_Contenue &&
                                                    $type_menu->Id == $plat->Id_type_menu)
                                                        <div class="col-6">
                                                            <!-- list group item-->
                                                            <li class="list-group-item">
                                                                <!-- Custom content-->
                                                                <div class="media align-items-lg-center flex-coldumn flex-lg-row p-3">
                                                                    <div class="media-body order-2 order-lg-1">
                                                                        <h5 class="mt-0 font-weight-bold mb-2">{{$phot_plat->plats->Nom_Ligns}}</h5>
                                                                        <p class="font-italic text-muted mb-0 small">{{$phot_plat->plats->Descrip_Plat}}</p>
                                                                        <div class="d-flex align-items-center justify-content-between mt-1">
                                                                            <h6 class="font-weight-bold my-2">{{$phot_plat->plats->Prix_Plat}} $</h6>
                                                                            <ul class="list-inline small">
                                                                                 <li class="list-inline-item m-0"><i class="fa fa-star text-primary"></i></li>
                                                                                 <li class="list-inline-item m-0"><i class="fa fa-star text-primary"></i></li>
                                                                                 <li class="list-inline-item m-0"><i class="fa fa-star text-primary"></i></li>
                                                                                 <li class="list-inline-item m-0"><i class="fa fa-star text-primary"></i></li>
                                                                                 <li class="list-inline-item m-0"><i class="fa fa-star text-primary"></i></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div><img src="{{asset('/storage/img/plats/'.$phot_plat->photo)}}"
                                                                     alt="Generic placeholder image" width="100" class="ml-lg-5 order-1 order-lg-2">      
                                                                </div> <!-- End -->
                                                                <form method="get" action="{{ url('/visiterestau/'.$restaurants->Id_Restau.'/ProduitDetail/'.$plat->Id ) }}">
                                                                @csrf    
                                                                <!-- <input type="hidden" value="{{$phot_plat->photo}} "name="id_photo"> -->
                                                                    <input type="hidden" value="{{$phot_plat->Id}} "name="id">
                                                                    <button type="submit"  class="btn btn-primary" >Voir détail </button>
                                                                </form>
                                                            </li><br>   
                                                        </div>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                @endforeach
                            </div>
                        </ul> <!-- End -->
                    </div>                             
                </div>
            @endif
        @endforeach
    @endforeach
</div>   

<!-- 
<div id="menu" class="menu-main pad-top-100 pad-bottom-100">
        <div class="container">
            <div class="row" id="menur">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                        <h2 class="block-title text-center" style="color:#000;">
                             Menu
                        </h2> 
                    </div>  <br>  
                    @foreach($restaurant_menus->unique() as $restaurants_menu)
                
                            @foreach($menus->unique() as $menu)
                                 @if( 
                                     $restaurants_menu->Id_Menu == $menu->Id 
                                    && $restaurants_menu->Id_Restaurant == $restaurants->Id_Restau)
                                          
                        <div class="tab-menu">
                                                <a href="#menur"> 
                                <b classe="block-title" style="color:#000;">
                                {{ $menu->Nom_Menu}}</b></a>
                            <div class="slider slider-single"> -->
                                <!-- <div class="row">
                                    @foreach($menu_type_menus->unique()  as $menu_type_menu)
                                    @foreach($phot_plats->unique()  as $phot_plat)
                                    @foreach($plats->unique()  as $plat)
                                    @foreach($type_menus->unique()  as $type_menu)
                                    @if($menu_type_menu->Id_Menu == $restaurants_menu->menus->Id
                                    && $menu_type_menu->Id_Type_Menu ==$type_menu->Id
                                    && $plat->Id == $phot_plat->Id_Plat
                                    && $type_menu->Id == $plat->Id_type_menu
                                     )

                                     <form action="{{route('cart.store')}}" method="post">
                                            @csrf
                                             
                                            <input type="hidden" name="id_plat" value="{{ $phot_plat->Id}}">
                                            <input type="hidden" name="id_restaurant" value="{{ $restaurants->Id_Restau }}">
                                            <input type="hidden" name="Nom_Plat" value="{{ $phot_plat->plats->Nom_Plat }}" > 
                                            <input type="hidden" name="Prix_Plat" value="{{ $phot_plat->plats->Prix_Plat }}">
                                            <button type="submit" class="btn btn-dark">Ajouter au panier </button>
                                           
                                        </forms><br>
                                    <div class="col-xl-6   col-md-6">
                                        <div class="offer-item">
                                            <img src="{{asset('/storage/img/plats/'.$phot_plat->photo)}}" alt=""
                                                class="img-responsive">
                                            <div>
                                                <h3>{{$phot_plat->plats->Nom_Plat}}</h3>
                                                <p>{{$phot_plat->plats->Descrip_Plat}}</p>
                                            </div>
                                            <span class="offer-price">{{$phot_plat->plats->Prix_Plat}} $</span>
                                        </div>
                               
                                      {{ $phot_plat->Id}}
                                       

                                        <a href="{{ url('/agentr/'.$plat->Id ) }}" 
                                        class="btn btn-warning"> <b classe="block-title" style="color:#000;">Modifier  Plat</b></a>      
                             
                                    </div>
                                    @endif
                                    @endforeach
                                    @endforeach
                                    @endforeach
                                    @endforeach
                                </div>
                               
                                <a class="btn btn-warning" data-toggle="modal" data-target="#formulaire"
                                        href="{{ url('/createe') }}"><Strong>Ajoutter plat</Strong></a>
                                  <a href="{{ url('/newMenu') }}" data-toggle="modal" data-target="#deletePlat"
                                        class="btn btn-warning"> <b classe="block-title" style="color:#000;">Suppreimer  Plat</b></a> <br><br>     
                                                -->
                                        <!-- </div> -->
                        <!-- </div>
                        @endif
                            @endforeach
                        
                    @endforeach
  -->
   
   
   <!-- @include('/layouts.script') -->
     <!-- Category Area End-->
        <!-- Latest Products Start -->
        <!-- <section class="latest-product-area padding-bottom">
            <div class="container">
                <div class="row product-btn d-flex justify-content-end align-items-end"> -->
                    <!-- Section Tittle -->
                    <!-- <div class="col-xl-5 col-lg-5 col-md-5">
                        <div class="section-tittle mbD-30">
                            <h2>Type de plat </h2>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7 col-md-7">
                        <div class="properties__button f-right"> -->
                            <!--Nav Button  -->
                            <!-- <nav>                                                                                                
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Menu principale</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Dessert</a>
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Boisson</a>
                                    <a class="nav-item nav-link" id="nav-last-tab" data-toggle="tab" href="#nav-last" role="tab" aria-controls="nav-contact" aria-selected="false">Entrée</a>
                                </div>
                            </nav> -->
                            <!--End Nav Button  -->
                        <!-- </div>
                    </div>
                </div><br><br> -->
                <!-- Nav Card -->
                <!-- <div class="tab-content" id="nav-tabContent"> -->
                    <!-- card one -->
                    <!-- @foreach($restaurant_menus as $restaurants_menu)
                        @foreach($menus as $menu)
                            @if( $restaurants->Id_Restau == $restaurants_menu->Id_Restaurant && 
                            $restaurants_menu->Id_Menu == $menu->Id 
                        )
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="row">
                            Menu pricical -->
                            <!-- @foreach($menu_type_menus as $menu_type_menu)
                                    @foreach($phot_plats as $phot_plat)
                                    @foreach($plats as $plat)
                                    @foreach($type_menus as $type_menu)
                                    @if($menu_type_menu->Id_Menu == $restaurants_menu->menus->Id
                                    && $menu_type_menu->Id_Type_Menu ==$type_menu->Id
                                    && $plat->Id == $phot_plat->Id_Plat
                                    && $type_menu->Id == $plat->Id_type_menu
                                    && $type_menu->Type_Menu == 'Menu Principal')
                                    <div class="col-xl-6   col-md-6">                       
                                        <div class="offer-item">
                                            <img src="{{asset('/storage/img/plats/'.$phot_plat->photo)}}" alt=""
                                                class="img-responsive">
                                            <div>
                                                <h3>{{$phot_plat->plats->Nom_Plat}}</h3>
                                                <p>{{$phot_plat->plats->Descrip_Plat}}</p>
                                            </div>
                                            <span class="offer-price">{{$phot_plat->plats->Prix_Plat}}$</span>
                                        </div>
                                        <form action="{{ route('cart.store')}}" method="post">
                                            @csrf
                                            
                                            <input type="hidden" name="id_plat" value="{{ $phot_plat->Id}}">
                                            <input type="hidden" name="id_restaurant" value="{{ $restaurants->Id_Restau }}">
                                            <input type="hidden" name="Nom_Plat" value="{{ $phot_plat->plats->Nom_Plat }}" > 
                                            <input type="hidden" name="Prix_Plat" value="{{ $phot_plat->plats->Prix_Plat }}">
                                            <button type="submit" class="btn btn-dark">Ajouter au panier </button>
                                         </forms>
                                    </div>
                                    @endif
                                    @endforeach
                                    @endforeach
                                    @endforeach
                                    @endforeach
                        </div>
                    </div>
                     -->
                    <!-- Card two Dessert -->
                    <!-- <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="row">                           
                            @foreach($menu_type_menus as $menu_type_menu)
                                @foreach($phot_plats as $phot_plat)
                                    @foreach($plats as $plat)
                                        @foreach($type_menus as $type_menu)
                                        @if($menu_type_menu->Id_Menu == $restaurants_menu->menus->Id
                                        && $menu_type_menu->Id_Type_Menu ==$type_menu->Id
                                        && $plat->Id == $phot_plat->Id_Plat
                                        && $type_menu->Id == $plat->Id_type_menu
                                        && $type_menu->Type_Menu == 'Dessert')
                                        <div class="col-xl-6   col-md-6">                       
                                            <div class="offer-item">
                                                <img src="{{asset('/storage/img/plats/'.$phot_plat->photo)}}" alt=""
                                                    class="img-responsive">
                                                <div>
                                                    <h3>{{$phot_plat->plats->Nom_Plat}}</h3>
                                                    <p>{{$phot_plat->plats->Descrip_Plat}}</p>
                                                </div>
                                                <span class="offer-price">{{$phot_plat->plats->Prix_Plat}} $</span>
                                            </div>
                                            <form action="{{ route('cart.store')}}" method="post">
                                                @csrf
                                                
                                                <input type="hidden" name="id_plat" value="{{ $phot_plat->Id}}">
                                                <input type="hidden" name="id_restaurant" value="{{ $restaurants->Id_Restau }}">
                                                <input type="hidden" name="Nom_Plat" value="{{ $phot_plat->plats->Nom_Plat }}" > 
                                                <input type="hidden" name="Prix_Plat" value="{{ $phot_plat->plats->Prix_Plat }}">
                                                <button type="submit" class="btn btn-dark">Ajouter au panier </button>
                                            </forms>
                                        </div>
                                        @endif
                                        @endforeach
                                    @endforeach
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                    Card three -->
                    <!-- <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <div class="row">                                                   
                           @foreach($menu_type_menus as $menu_type_menu)
                            @foreach($phot_plats as $phot_plat)
                                    @foreach($plats as $plat)
                                    @foreach($type_menus as $type_menu)
                                    @if(
                                    $menu_type_menu->Id_Menu == $restaurants_menu->menus->Id
                                    && $menu_type_menu->Id_Type_Menu ==$type_menu->Id
                                    && $plat->Id == $phot_plat->Id_Plat
                                    && $type_menu->Id == $plat->Id_type_menu
                                    && $type_menu->Type_Menu == 'Boisson')
                                    <div class="col-xl-6  col-md-6">                       
                                            <div class="offer-item">
                                                <img src="{{asset('/storage/img/plats/'.$phot_plat->photo)}}" alt=""
                                                    class="img-responsive">
                                                <div>
                                                    <h3>{{$phot_plat->plats->Nom_Plat}}</h3>
                                                    <p>{{$phot_plat->plats->Descrip_Plat}}</p>
                                                </div>
                                                <span class="offer-price">{{$phot_plat->plats->Prix_Plat}}$</span>
                                            </div>
                                            <form action="{{ route('cart.store')}}" method="post">
                                                @csrf
                                                
                                                <input type="hidden" name="id_plat" value="{{ $phot_plat->Id}}">
                                                <input type="hidden" name="id_restaurant" value="{{ $restaurants->Id_Restau }}">
                                                <input type="hidden" name="Nom_Plat" value="{{ $phot_plat->plats->Nom_Plat }}" > 
                                                <input type="hidden" name="Prix_Plat" value="{{ $phot_plat->plats->Prix_Plat }}">
                                                <button type="submit" class="btn btn-dark">Ajouter au panier </button>
                                            </forms>
                                    </div>
                                    @endif
                                @endforeach
                            @endforeach
                            @endforeach
                            @endforeach
                        </div>
                    </div>
                    card foure -->
                    <div class="tab-pane fade" id="nav-last" role="tabpanel" aria-labelledby="nav-last-tab">
                        <!-- <div class="row">
                            @foreach($menu_type_menus as $menu_type_menu)
                                    @foreach($phot_plats as $phot_plat)
                                    @foreach($plats as $plat)
                                    @foreach($type_menus as $type_menu)
                                    @if(
                                    $menu_type_menu->Id_Menu == $restaurants_menu->menus->Id
                                    && $menu_type_menu->Id_Type_Menu ==$type_menu->Id
                                    && $plat->Id == $phot_plat->Id_Plat
                                    && $type_menu->Id == $plat->Id_type_menu
                                    && $type_menu->Type_Menu == 'Entrée')
                                    <div class="col-xl-6   col-md-6">                       
                                            <div class="offer-item">
                                                <img src="{{asset('/storage/img/plats/'.$phot_plat->photo)}}" alt=""
                                                    class="img-responsive">
                                                <div>
                                                    <h3>{{$phot_plat->plats->Nom_Plat}}</h3>
                                                    <p>{{$phot_plat->plats->Descrip_Plat}}</p>
                                                </div>
                                                <span class="offer-price">{{$phot_plat->plats->Prix_Plat}}$</span>
                                            </div>
                                            <form action="{{ route('cart.store')}}" method="post">
                                                @csrf
                                                
                                                <input type="hidden" name="id_plat" value="{{ $phot_plat->Id}}">
                                                <input type="hidden" name="id_restaurant" value="{{ $restaurants->Id_Restau }}">
                                                <input type="hidden" name="Nom_Plat" value="{{ $phot_plat->plats->Nom_Plat }}" > 
                                                <input type="hidden" name="Prix_Plat" value="{{ $phot_plat->plats->Prix_Plat }}">
                                                <button type="submit" class="btn btn-dark">Ajouter au panier </button>
                                            </forms>
                                    </div>
                                    @endif
                                    @endforeach
                                    @endforeach
                                    @endforeach
                            @endforeach
                        </div>
                    </div>
                    @endif
                @endforeach
                @endforeach
            </div>
                End Nav Card -->
            <!-- </div>
        </section> -->


<!-- 

<div id="menu" class="menu-main pad-top-100 pad-bottom-100">
    <div class="container">
        <div class="row" id="menur">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                    <h2 class="block-title text-center" style="color:#000;">
                        Menu 
                    </h2>
                   
                
                </div>
                
                
                        <div class="tab-menu">
                      
                    @foreach($restaurant_menus as $restaurants_menu)
                        @foreach($menus as $menu)
                            @if( $restaurants->Id_Restau == $restaurants_menu->Id_Restaurant && 
                            $restaurants_menu->Id_Menu == $menu->Id 
                        )
                       
                     
                
                            
                            <div class="slider slider-nav">
                                <div class="tab-title-menu">
                                    <h2>Menu principale</h2>
                                    <p> <i class="flaticon-dinner"></i> </p>
                                </div>
                                <div class="tab-title-menu">
                                    <h2>Boisson</h2>
                                    <p> <i class="flaticon-coffee"></i> </p>
                                </div>
                                <div class="tab-title-menu">
                                    <h2>Entrée</h2>
                                    <p> <i class="flaticon-canape"></i> </p>
                                </div>
                                <div class="tab-title-menu">
                                    <h2>Dessert</h2>
                                    <p><i class="flaticon-desert"></i> </p>
                                </div>
                            </div>
                            <div class="slider slider-single">
                                <div>
                                    @foreach($menu_type_menus as $menu_type_menu)
                                    @foreach($phot_plats as $phot_plat)
                                    @foreach($plats as $plat)
                                    @foreach($type_menus as $type_menu)
                                    @if($menu_type_menu->Id_Menu == $restaurants_menu->menus->Id
                                    && $menu_type_menu->Id_Type_Menu ==$type_menu->Id
                                    && $plat->Id == $phot_plat->Id_Plat
                                    && $type_menu->Id == $plat->Id_type_menu
                                    && $type_menu->Type_Menu == 'Menu Principal')
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                                        <div class="offer-item">
                                            <img src="{{asset('/storage/img/plats/'.$phot_plat->photo)}}" alt=""
                                                class="img-responsive">
                                            <div>
                                                <h3>{{$phot_plat->plats->Nom_Plat}}</h3>
                                                <p>{{$phot_plat->plats->Descrip_Plat}}</p>
                                            </div>
                                            <span class="offer-price">$25</span>
                                        </div>
                                    </div>
                                    <form action="{{ route('cart.store')}}" method="post">
                                        @csrf
                                        
                                        <input type="hidden" name="id_plat" value="{{ $phot_plat->Id}}">
                                        <input type="hidden" name="id_restaurant" value="{{ $restaurants->Id_Restau }}">
                                        <input type="hidden" name="Nom_Plat" value="{{ $phot_plat->plats->Nom_Plat }}" > 
                                        <input type="hidden" name="Prix_Plat" value="{{ $phot_plat->plats->Prix_Plat }}">
                                      <button type="submit" class="btn btn-dark">Ajouter au panier </button>
                                    </forms>
                                   
                                    @endif
                                    @endforeach
                                    @endforeach
                                    @endforeach
                                    @endforeach
                                </div>
                                <div>
                                    @foreach($menu_type_menus as $menu_type_menu)
                                    @foreach($phot_plats as $phot_plat)
                                    @foreach($plats as $plat)
                                    @foreach($type_menus as $type_menu)
                                    @if(
                                    $menu_type_menu->Id_Menu == $restaurants_menu->menus->Id
                                    && $menu_type_menu->Id_Type_Menu ==$type_menu->Id
                                    && $plat->Id == $phot_plat->Id_Plat
                                    && $type_menu->Id == $plat->Id_type_menu
                                    && $type_menu->Type_Menu == 'Boisson')
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                                        <div class="offer-item">
                                            <img src="{{asset('/storage/img/plats/'.$phot_plat->photo)}}" alt=""
                                                class="img-responsive">
                                            <div>
                                                <h3>{{$phot_plat->plats->Nom_Plat}}</h3>
                                                <p>{{$phot_plat->plats->Descrip_Plat}}</p>
                                            </div>
                                            <span class="offer-price">$25</span>
                                        </div>
                                    </div>
                                    <form action="{{ route('cart.store')}}" method="post">
                                        @csrf
                                        
                                        <input type="hidden" name="id_plat" value="{{ $phot_plat->Id}}">
                                        <input type="hidden" name="id_restaurant" value="{{ $restaurants->Id_Restau }}">
                                        <input type="hidden" name="Nom_Plat" value="{{ $phot_plat->plats->Nom_Plat }}" > 
                                        <input type="hidden" name="Prix_Plat" value="{{ $phot_plat->plats->Prix_Plat }}"> -->
                                      <!-- <button type="submit" class="btn btn-dark">Ajouter au panier </button>
                                    </forms>
                                   
                                    @endif
                                    @endforeach
                                    @endforeach
                                    @endforeach
                                    @endforeach
                                </div>
                                <div>
                                    @foreach($menu_type_menus as $menu_type_menu)
                                    @foreach($phot_plats as $phot_plat)
                                    @foreach($plats as $plat)
                                    @foreach($type_menus as $type_menu)
                                    @if(
                                    $menu_type_menu->Id_Menu == $restaurants_menu->menus->Id
                                    && $menu_type_menu->Id_Type_Menu ==$type_menu->Id
                                    && $plat->Id == $phot_plat->Id_Plat
                                    && $type_menu->Id == $plat->Id_type_menu
                                    && $type_menu->Type_Menu == 'Entrée')
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                                        <div class="offer-item">
                                            <img src="{{asset('/storage/img/plats/'.$phot_plat->photo)}}" alt=""
                                                class="img-responsive">
                                            <div>
                                                <h3>{{$phot_plat->plats->Nom_Plat}}</h3>
                                                <p>{{$phot_plat->plats->Descrip_Plat}}</p>
                                            </div>
                                            <span class="offer-price">$25</span>
                                        </div>
                                    </div>
                                    <form action="{{ route('cart.store')}}" method="post">
                                        @csrf
                                        
                                        <input type="hidden" name="id_plat" value="{{ $phot_plat->Id}}">
                                        <input type="hidden" name="id_restaurant" value="{{ $restaurants->Id_Restau }}">
                                        <input type="hidden" name="Nom_Plat" value="{{ $phot_plat->plats->Nom_Plat }}" > 
                                        <input type="hidden" name="Prix_Plat" value="{{ $phot_plat->plats->Prix_Plat }}"> -->
                                      <!-- <button type="submit" class="btn btn-dark">Ajouter au panier </button>
                                    </forms>
                                   
                                    @endif
                                    @endforeach
                                    @endforeach
                                    @endforeach
                                    @endforeach
                                </div>
                                <div>
                                    @foreach($menu_type_menus as $menu_type_menu)
                                    @foreach($phot_plats as $phot_plat)
                                    @foreach($plats as $plat)
                                    @foreach($type_menus as $type_menu)
                                    @if(
                                    $menu_type_menu->Id_Menu == $restaurants_menu->menus->Id
                                    && $menu_type_menu->Id_Type_Menu ==$type_menu->Id
                                    && $plat->Id == $phot_plat->Id_Plat
                                    && $type_menu->Id == $plat->Id_type_menu
                                    && $type_menu->Type_Menu == 'Dessert')
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                                        <div class="offer-item">
                                            <img src="{{asset('/storage/img/plats/'.$phot_plat->photo)}}" alt=""
                                                class="img-responsive">
                                            <div>
                                                <h3>{{$phot_plat->plats->Nom_Plat}}</h3>
                                                <p>{{$phot_plat->plats->Descrip_Plat}}</p>
                                            </div>
                                            <span class="offer-price">$phot_plat->plats->Prix_Plat</span>
                                        </div>
                                    </div>
                                    <form action="{{ route('cart.store')}}" method="post">
                                        @csrf
                                        
                                        <input type="hidden" name="id_plat" value="{{ $phot_plat->Id}}">
                                        <input type="hidden" name="id_restaurant" value="{{ $restaurants->Id_Restau }}"> -->
                                        <!-- <input type="hidden" name="Nom_Plat" value="{{ $phot_plat->plats->Nom_Plat }}" > 
                                        <input type="hidden" name="Prix_Plat" value="{{ $phot_plat->plats->Prix_Plat }}"> -->
                                      <!-- <button type="submit" class="btn btn-dark">Ajouter au panier </button>
                                    </forms>
                                   
                                    @endif
                                    @endforeach
                                    @endforeach
                                    @endforeach
                                    @endforeach
                                </div>
                            </div>
                        </div>
                @endif
                @endforeach
                @endforeach
             -->
                

        
	