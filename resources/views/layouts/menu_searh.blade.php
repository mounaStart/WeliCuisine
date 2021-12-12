@include('/layouts.script')

@if(request()->input())
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <h3 class=" text-center" style="color:#000;">
        {{ $total}} resultat(s) pour la recherche {{request()->q}} et {{request()->pays}}
    </h3>
</div>
@endif

<div class="container">
    <div class="row">
        
        @if($restaurants_villes != null)
            @foreach($restaurants_villes as $restaurants_ville)
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single_product md-60">
                        <img src="{{asset('/storage/img/plats/'.$restaurants_ville->photo)}}" alt="" class="img-fluid">
                        <br>
                        <h2 class="text-center">
                            <a href="{{ url('/visiterestau/'.$restaurants_ville->Id_Restau ) }}"><b classe="block-title" style="color:#000;">{{ $restaurants_ville->Nom_Restau}}</a></b>
                        </h2>
                        <h3>Lieux :<b>{{$restaurants_ville->ville}}</b></h3>
                        <h4>Prix minimal : 
                            <B>
                                <?php 
                                    $min_plats = DB::table('restaurants')
                                    ->join('restaurant_menus as rm', 'restaurants.Id_Restau', '=', 'rm.Id_Restaurant')
                                    ->join('menus as m', 'm.Id', '=', 'rm.Id_Menu')
                                    ->join('menu_type_menus as mt', 'mt.Id_Menu', '=', 'rm.Id_Menu')
                                    ->join('type_menus as tm', 'tm.Id', '=', 'mt.Id_Type_Menu')
                                    ->join('plats as p', 'tm.Id',  '=', 'p.Id_type_menu')
                                    ->select('p.Id',  'p.Prix_Plat',\DB::raw('MIN(p.Prix_Plat) as cnt'))->distinct()
                                    ->where('restaurants.Id_Restau' ,'='  ,$restaurants_ville->Id_Restau) 
                                    ->get() ;
                                ?>
                                @foreach($min_plats as $min_plat) 
                                    {{ $min_plat->cnt}}  $ 
                                @endforeach
                            </b> 
                        </h4>
                        <h3>Contactez nous:</h3>
                        <p class="p">
                            <font style="vertical-align: inherit;"> Numéro Tel :{{ $restaurants_ville->Num_Tel}}</font>
                            <br>
                            <font style="vertical-align: inherit;"> E-mail: {{ $restaurants_ville->email}} </font>
                        </p>
                    </div>
                </div>
            @endforeach
            @else
            <div class=""></div>
        @endif
        @if($restaurants != null)
            @foreach($restaurants->unique() as $restaurant)
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single_product md-60">
                        <img src="{{asset('/storage/img/plats/'.$restaurant->photo)}}" alt="" class="img-fluid">
                        <br>
                        <h2 class="text-center">
                            <a href="{{ url('/visiterestau/'.$restaurant->Id_Restau ) }}"><b classe="block-title" style="color:#000;">{{ $restaurant->Nom_Restau}}</a></b>
                        </h2>
                        <h4>Prix minimal :
                            <b>
                                <?php 
                                    $min_plats = DB::table('restaurants')
                                    ->join('restaurant_menus as rm', 'restaurants.Id_Restau', '=', 'rm.Id_Restaurant')
                                    ->join('menus as m', 'm.Id', '=', 'rm.Id_Menu')
                                    ->join('menu_type_menus as mt', 'mt.Id_Menu', '=', 'rm.Id_Menu')
                                    ->join('type_menus as tm', 'tm.Id', '=', 'mt.Id_Type_Menu')
                                    ->join('plats as p', 'tm.Id',  '=', 'p.Id_type_menu')
                                    ->select('p.Id',  'p.Prix_Plat',\DB::raw('MIN(p.Prix_Plat) as cnt'))->distinct()
                                    ->where('restaurants.Id_Restau' ,'='  ,$restaurant->Id_Restau) 
                                    ->get() ;
                                ?>
                                @foreach($min_plats as $min_plat)
                                {{ $min_plat->cnt}}
                                @endforeach $
                            </b>
                        </h4>
                        <h3>Contactez nous:</h3>
                        <p class="p">
                            <font style="vertical-align: inherit;"> Numéro Tel :{{ $restaurant->agentrs->Num_Tel}}</font>
                                <br>
                            <font style="vertical-align: inherit;"> E-mail: {{ $restaurant->agentrs->email}} </font>
                        </p>
                    </div>
                </div>
            @endforeach
            @else
            <div class=""></div>
        @endif
    </div>
</div>