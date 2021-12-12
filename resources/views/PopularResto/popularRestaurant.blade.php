<style>
    
.card:hover {
    transform: scale(1.1);
    transition: all 0.5s ease-in-out;
    cursor: pointer
}

.card-body {
    padding: 0.5rem
}

.card-body .description {
    font-size: 0.78rem;
    padding-bottom: 8px
}


img {
    width: 192px;
    height: 132px;
    object-fit: contain
}
</style>
<div class="container">
   <div class="row">
       
                <h1 class=" text-center"><b>Les restaurants les plus populaires</b></h1><br><br>
 @foreach( $villes  as  $ville)
                <h2>Restaurants populaire à   {{ $ville->ville}}  </h2><br>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="row">
                            @foreach($restaurants_villes  as $restaurants_ville)
                                @if($restaurants_ville->ville == $ville->ville)
                                        <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1 ">
                                                <div class="card"> 
                                                <a href="{{ url('/visiterestau/'.$restaurants_ville->Id_Restau ) }}">
                                                     <img class="card-img-top img-fluid image" src="{{asset('/storage/img/plats/'.$restaurants_ville->photo)}}">
                                                    <div class="card-body">
                                                        <h6 class="font-weight-bold pt-1"><b>{{$restaurants_ville->Nom_Restau}}</b></h6>
                                                     </a>
                                                        <div class="text-muted description">
                                                            @foreach($Type_menu_Restau_Polulaires as $Type_menu_Restau_Polulaire)
                                                                @if($Type_menu_Restau_Polulaire->Id_Restau == $restaurants_ville->Id_Restaurant)  
                                                                {{$Type_menu_Restau_Polulaire->Type_Menu}}
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                        <div class="d-flex align-items-center justify-content-between pt-3">
                                                            <div class="d-flex flex-column">
                                                                <div class="h6 font-weight-bold">
                                                                    <h4>Prix moyen :
                                                                        <B>
                                                                            <?php 
                                                                            $min_plats = DB::table('restaurants')
                                                                            ->join('restaurant_menus as rm', 'restaurants.Id_Restau', '=', 'rm.Id_Restaurant')
                                                                            ->join('menus as m', 'm.Id', '=', 'rm.Id_Menu')
                                                                            ->join('menu_type_menus as mt', 'mt.Id_Menu', '=', 'rm.Id_Menu')
                                                                            ->join('type_menus as tm', 'tm.Id', '=', 'mt.Id_Type_Menu')
                                                                            ->join('plats as p', 'tm.Id',  '=', 'p.Id_type_menu')
                                                                            ->select('p.Id',  'p.Prix_Plat'
                                                                            ,\DB::raw('MIN(p.Prix_Plat) as cnt'))->distinct()
                                                                            ->where('restaurants.Id_Restau' ,'='  ,$restaurants_ville->Id_Restau) 
                                                                            ->get() ;
                                                                            ?>
                                                                            @foreach($min_plats as $min_plat)
                                                                                {{ $min_plat->cnt}}
                                                                            @endforeach  MRU
                                                                        </b> 
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                            <!-- <div class="btn btn-primary">Buy now</div> -->
                                                        </div>
                                                    </div>
                                                </div><br>
                                           
                                        </div>
                                @endif
                            @endforeach
                        </div><br>
                    </div>
                </div>
            @endforeach
            </div>
        </section>
    </div>
