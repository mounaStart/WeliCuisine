
   @include('/layouts.script')
@extends('/layouts.admin')
@section('content')
    <div>
        <img src="{{ asset('assets/img/cover.jpg') }}" class="img-fluid " alt="...">
    </div>
    <br>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
            <h2 class="block-title text-center">
                Les restaurants disposant ce plat
            </h2>
        </div><br>

    
        <div class="container">
            <div class="row">
          
                @foreach($restaurant_menus->unique() as $restaurants_menu)
                    @foreach($restaurants->unique() as $restaurant )
                        @foreach($menus->unique() as $menu)
                            @foreach($menu_type_menus->unique() as $menu_type_menu)
                                @foreach($phot_plats->unique() as $phot_plat)
                                    @foreach($type_menus->unique() as $type_menu)
                                        @if($restaurants_menu->Id_Menu == $menu->Id &&
                                            $restaurants_menu->Id_Restaurant == $restaurant->Id_Restau &&

                                            $menu_type_menu->id_menu == $menu->Id &&
                                            $menu_type_menu->id_contenue_menu ==  $plats->Id &&

                                            $plats->Id == $phot_plat->Id_Contenue &&
                                            $type_menu->Id == $plats->Id_type_menu &&
                                            $restaurant->publier == 'oui' )
                                            <div class="col-xl-4 col-lg-4 col-md-6">
                                                <div class="single_product md-60">
                                                    <img src="{{asset('/storage/img/plats/'.$restaurant->photo)}}" alt="" class="img-fluid">
                                                    <br>
                                                    <h2 class="text-center">
                                                        <a  href="{{ url('/visiterestau/'.$restaurant->Id_Restau ) }}">
                                                         <b classe="block-title" style="color:#000;">{{ $restaurant->Nom_Restau
                                                                }}</a></b>
                                                    </h2>
                                                    <h4>Prix minimal : <B>
                                                        <?php 
                                                           $min_plats = DB::table('restaurants')
                                                           ->join('restaurant_menus as rm', 'restaurants.Id_Restau', '=', 'rm.Id_Restaurant')
                                                           ->join('menus as m', 'm.Id', '=', 'rm.Id_Menu')
                                                           ->join('menu_contenue_menus as mc', 'mc.id_menu',  '=', 'm.Id')
                                                           ->join('contenue_menus as c', 'c.Id',  '=', 'mc.id_contenue_menu')
                                                           ->join('type_menus as tm', 'tm.Id', '=', 'c.Id_type_menu')
                                                           ->join('phot_plats as pp', 'c.Id',  '=', 'pp.Id_Contenue')
                                                           ->select('c.Id','c.Id_type_menu','c.Nom_Ligns' ,'c.Descrip_Plat' ,'pp.photo', 'rm.Id_Restaurant' ,
                                                           'c.Prix_Plat' ,'restaurants.Id_Restau'
                                                           ,\DB::raw('MIN(c.Prix_Plat) as cnt'))->distinct()
                                                           ->where('restaurants.Id_Restau' ,'='  ,$restaurant->Id_Restau) 
                                                          ->get() ;
                                                        ?>
                                                        @foreach($min_plats as $min_plat)
                                                            {{ $min_plat->cnt}}
                                                        @endforeach $ </b> </h4>
                                                    <h3>Contactez nous:</h3>
                                                    <p class="p">
                                                        <font style="vertical-align: inherit;"> Numéro Tel :{{ $restaurant->agentrs->Num_Tel}}</font>
                                                        <br>
                                                        <font style="vertical-align: inherit;"> E-mail: {{ $restaurant->agentrs->email}} </font>
                                                    </p>
                                                </div>
                                            </div>
                                    @endif
                                    @endforeach
                                @endforeach
                            @endforeach
                        @endforeach
                    @endforeach
                @endforeach
            </div>
        </div>
    </div><br><br>
    @if(session('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                aria-hidden="true">x</span></button>
            {{session('success')}}
        </div>
    @endif
@endsection