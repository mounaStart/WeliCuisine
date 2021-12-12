 
 @include('layouts.type_menu')
<div id="div_top_hypers">
    <ul id="ul_top_hypers">
        <li>&#8227; <a href="" class="a_top_hypers"> Inbox</a></li>
        <li>&#8227; <a href="" class="a_top_hypers"> Compose</a></li>
        <li>&#8227; <a href="" class="a_top_hypers"> Reports</a></li>
        <li>&#8227; <a href="" class="a_top_hypers"> Preferences</a></li>
        <li>&#8227; <a href="" class="a_top_hypers"> logout</a></li>
    </ul>
</div>
<section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
             
            @foreach($restaurant_menus->unique('Id') as $restaurant_menu    => $name )
          
                @foreach($restaurants->unique('Id') as $restaurant )
                @foreach($menu_type_menus->unique('Id') as $menu_type_menu )
                @foreach($plats->unique('Id') as $plat)
                @foreach($phot_plats->unique('Id') as $phot_plat)

                @if($name->Id_Restaurant == $restaurant->Id_Restau &&
                $name->menus->Id == $name->Id_Menu &&
                $name->menus->Id == $menu_type_menu->Id_Menu &&
                $menu_type_menu->Id_Type_Menu == $menu_type_menu->typemenus->Id &&
                $plat->Id_type_menu == $menu_type_menu->typemenus->Id
                && $plat->Id == $phot_plat->Id_Plat 
                 )
                
                <div class="">
                    <div class="">
                    <a href="{{ url('/visiterestau/'.$restaurant->Id_Restau) }}">
                  
                            <!-- Product details-->
                            <div class="carsd-body p">
                                <div class="text-center">
                                    <!-- Product name-->
                                
                                      
                                    <img class="card-img-top" width="256px" height="199px" class="cardd-imcg-top"
                                src="{{asset('/storage/img/plats/'.$phot_plat->photo)}}" alt="..." /> 
                                    <h5 class="fw-blder" style="color:#000000;">{{$phot_plat->plats->Nom_Plat}}</h5>
                                    <!-- Product price-->
                                    
                                  
                              Restaurants
                                </div>
                            </div>
                            </a>
                      
                        <!-- Product actions
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">
                                    {{$phot_plat->plats->Descrip_Plat}}</a></div>
                        </div> -->
                    </div>
                </div>
                @endif
                @endforeach
                @endforeach
                @endforeach
                @endforeach
                @endforeach
            </div>
        </div>
    </section>

    <!-- @foreach($restaurant_menus as $restaurant_menu )
                @foreach($restaurants as $restaurant )
                @foreach($menu_type_menus as $menu_type_menu )
                @foreach($plats as $plat)

                @if($restaurant_menu->Id_Restaurant == $restaurant->Id_Restau &&
                $restaurant_menu->menus->Id == $menu_type_menu->Id_Menu &&
                $menu_type_menu->Id_Type_Menu == $menu_type_menu->typemenus->Id &&

                $plat->Id_type_menu == $menu_type_menu->typemenus->Id
                )
                {{count(array('$restaurant->Id_Restau'))}}
@endif
@endforeach
@endforeach
@endforeach
@endforeach
    @if($plat->Nom_Plat === 'Pizza' )
    {{ count(array($restaurants_menu->Id_Restaurant))}}
    @endif -->

 