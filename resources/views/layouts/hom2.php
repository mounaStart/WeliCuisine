@extends('layouts.admin')

@section('content')

    <!-- Masthead-->
 
    <div id="banner" class="banner full-screen-mode parallax">
  <div class="container">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="banner-static">
                    <div class="banner-text">
                        <div class="banner-cll">
                              <h1>Découvrez et réservez le meilleur restaurant
                              <span class="typer" id="some-id" data-delay="200" data-delim=":" data-words="Friends:Family:Officemates" data-colors="red"></span><span class="cursor" data-cursorDisplay="_" data-owner="some-id"></span></h1>
                          <section class="search-sec ">
                            <div class="container ">
                                <form action="#" method="post" novalidate="novalidate">
                                  <div class="col-lg-12">
                                    <div class="row border border-success  p-1">
                                      <div class="col-lg-6 col-md-6 col-sm-12 p-0  ">
                                          <input type="text" class="form-control search-slt" placeholder="Mauritanie">
                                      </div>
                                      <div class="col-lg-5 col-md-5 col-sm-12 p-0">
                                          <input type="text" class="form-control search-slt"
                                              placeholder="Restaurant ,Cuisine ....">
                                      </div>
                                      <div class="col-lg-1 col-md-1 col-sm-12 p-0">
                                          <button type="button" class="btn btn-theme wrn-btn"
                                              style="background-color:#FFCC00"> <span
                                                  class="fa fa-search form-control-icon"></span></button>
                                      </div>
                                  </div>
                                  </div>
                                </form>
                              </div>
                            </section>
                        </div>
                        <!-- end banner-cell -->
                    </div>
                    <!-- end banner-text -->
                </div>
                <!-- end banner-static -->
            </div>
            <!-- end col -->
        </div>
        <!-- end container -->
    </div>
    <br>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  <br>  
                    <h2 class="block-title text-center" style="color:#000;"> 
                        Vos Categories
                        </h2>
                    </div>
            
                  
 <!-- Section-->
 <section class="py-5">
 
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
           
               

            @foreach($restaurant_menus as $restaurant_menu )
            @foreach($restaurants as $restaurant )
                 @foreach($menu_type_menus as $menu_type_menu )
                 @foreach($plats as $plat)
                 @foreach($phot_plats as $phot_plat)

                 @if($restaurant_menu->Id_Restaurant == $restaurant_menu->restaurants->Id_Restau &&
                 $restaurant_menu->menus->Id == $restaurant_menu->Id_Menu &&
                 $restaurant_menu->menus->Id == $menu_type_menu->Id_Menu &&
                 $menu_type_menu->Id_Type_Menu == $menu_type_menu->typemenus->Id &&
                 $plat->Id_type_menu == $menu_type_menu->typemenus->Id
                && $plat->Id == $phot_plat->Id_Plat &&
                 $restaurant_menu->restaurants->publier == 'oui' )

                dfdfdfdfdf
                <div class="">
                <div class="carsd  ">
                        <!-- <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale
                        </div> -->
                        <!-- Product image-->
                       
                        <a href="{{ url('/visiterestau/'.$restaurant->Id_Restau) }}" >
                       
                        <img class="card-img-top" width="256px" height="199px" 
                        class="cardd-imcg-top" src="{{asset('/storage/img/plats/'.$phot_plat->photo)}}" alt="..." />
                        <!-- Product details-->
                        <div class="carsd-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">{{$phot_plat->plats->Nom_Plat}}</h5>
                                <!-- Product price-->
                                {{$phot_plat->plats->Prix_Plat}}<br>
                                Restaurants 
                            </div>
                             

                        </div>
                </a>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                           <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">
                                 
                            {{$phot_plat->plats->Descrip_Plat}}</a></div>
                        </div>

                    </div>
                </div>

                 @endif
                 @endforeach
                 @endforeach
                 @endforeach
                 @endforeach
                
          
               @foreach($phot_plats as $phot_plat)
                @foreach($plats as $plat)
              
                @if(
                 $plat->Id == $phot_plat->Id_Plat)
                
                <div class="">
                <div class="carsd  ">
                        <!-- <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale
                        </div> -->
                        <!-- Product image-->
                        @foreach($restaurants as $restaurant )
                        <a href="{{ url('/visiterestau/'.$restaurant->Id_Restau) }}" >
                        @endforeach
                        <img class="card-img-top" width="256px" height="199px" 
                        class="cardd-imcg-top" src="{{asset('/storage/img/plats/'.$phot_plat->photo)}}" alt="..." />
                        <!-- Product details-->
                        <div class="carsd-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">{{$phot_plat->plats->Nom_Plat}}</h5>
                                <!-- Product price-->
                                {{$phot_plat->plats->Prix_Plat}}<br>
                                Restaurants 
                            </div>
                             

                        </div>
                </a>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                           <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">
                                 
                            {{$phot_plat->plats->Descrip_Plat}}</a></div>
                        </div>

                    </div>
                </div>

                

                @endif
                @endforeach
                @endforeach
              
               
               
            </div>
        </div>
        
    </section> 

    
      @endsection
      @if($plat->Nom_Plat === 'Pizza' )
                {{ count(array($restaurants_menu->Id_Restaurant))}}
                @endif