<div id="menu" class="menu-main pad-top-100 pad-bottom-100" style=" box-sizing: border-box;">
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
                                    $restaurants_menu->Id_Menu == $menu->Id)
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
                                                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 " style="width: 50%;">
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
                                                                        <!-- <input type="hidden" name="Nom_Plat" value="{{ $phot_plat->plats->Nom_Plat }}" > 
                                                                                <input type="hidden" name="Prix_Plat" value="{{ $phot_plat->plats->Prix_Plat }}"> -->
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
                                                            @if($menu_type_menu->Id_Menu == $restaurants_menu->menus->Id
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
                                                                        <input type="hidden" name="id_plat" value="{{{ $phot_plat->Id}}">
                                                                        <input type="hidden" name="id_restaurant" value="{{ $restaurants->Id_Restau }}">
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
                                                            @if($menu_type_menu->Id_Menu == $restaurants_menu->menus->Id
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
                                                                        <input type="hidden" name="id_plat" value="  {{ $phot_plat->Id }}">
                                                                        <input type="hidden" name="id_restaurant" value="{{ $restaurants->Id_Restau }}">
                                                                        <!-- <input type="hidden" name="Nom_Plat" value="{{ $phot_plat->plats->Nom_Plat }}" > 
                                                                                <input type="hidden" name="Prix_Plat" value="{{ $phot_plat->plats->Prix_Plat }}"> -->
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
                                                            @if($menu_type_menu->Id_Menu == $restaurants_menu->menus->Id
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
                                                                    <input type="hidden" name="id_plat" value="{{  $phot_plat->Id }}">
                                                                    <input type="hidden" name="id_restaurant" value="{{ $restaurants->Id_Restau }}">
                                                                    <!-- <input type="hidden" name="Nom_Plat" value="{{ $phot_plat->plats->Nom_Plat }}" > 
                                                                            <input type="hidden" name="Prix_Plat" value="{{ $phot_plat->plats->Prix_Plat }}"> -->
                                                                    <button type="submit" class="btn btn-dark">Ajouter au panier </button>
                                                                </forms>
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
                </div>
            </div>
        </div>
    </div>
                
                