<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    @yield('extra-meta')
    <title>Agency - Start Bootstrap Theme</title>

</haed>
<body>
   

    <!-- <div class="profil_pic_div">
        <form method="post" action="">
        <img src="/assets/img/cover.jpg" id="photo">

        <boutton id="file">chose</bouton> -->
        <script>
            const imgDiv = document.querySelector('.profil_pic_div') ;
            const img = document.querySelector('#photo') ;
            const file = document.querySelector('#file') ;
            const uloadBtn = document.querySelector('#uploadBtn') ;

            imgDiv.addEventListener('mouseenter' , function(){
                uloadBtn.style.display = "block" ;
             });
             imgDiv.addEventListener('mouseenter' , function(){
                uloadBtn.style.display = "none" ;
             });

             file.addEventListener('change',function(){
                const choseFile = this.files[0] ;
                 if(choseFile){
                     const reader = new FileReader('load' , function(){
                         img.setAttribute('src' ,reader.result);
                     });
                     reader.readAsDataURL(choseFile) ;
                 }

             });
               
                   

        </script>
</body>




<!-- 
<div class="wrcapper">
   <div id="mobile-filter">
        <div class="py-3">
            <h5 class="font-weight-bold">Categories</h5>
            <ul class="list-group">
                <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category">Menu principale <span class="badge badge-primary badge-pill">328</span> </li>
                <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category"> Dessert <span class="badge badge-primary badge-pill">112</span> </li>
                <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category"> Boisson <span class="badge badge-primary badge-pill">32</span> </li>
                <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category"> Entrée <span class="badge badge-primary badge-pill">48</span> </li>
            </ul>
        </div>
    </div>
    <div class="content py-md-0 py-3 ">
        <div id="nav-tab" role="tablist">
            <section id="sidebar">
                <div class="py-3">
                    <h5 class="font-weight-bold">Categories</h5>
                    <ul class="list-group">
                        <li
                         id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" 
                         aria-selected="true"
                          class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category">Menu principale <span class="badge badge-primary badge-pill">328</span> </li>
                        <li  
                        id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                         aria-controls="nav-profile" aria-selected="false" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category"> Dessert <span class="badge badge-primary badge-pill">112</span> </li>
                        <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category"> Boisson <span class="badge badge-primary badge-pill">32</span> </li>
                        <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category"> Entrée <span class="badge badge-primary badge-pill">48</span> </li>
                    </ul>
                </div>
            </section> Products Section -->
        <!-- </div>
        <section id="products">
            <div class="container py-3">
                <div class="tab-content" id="nav-tabContent"> -->
                        <!-- card one -->
                    <!-- <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1">
                                <div class="card"> <img class="card-img-top" src="https://www.freepnglogos.com/uploads/cucumber-png/cucumber-png-image-purepng-transparent-png-26.png">
                                    <div class="card-body">
                                        <h6 class="font-weight-bold pt-1">Product title</h6>
                                        <div class="text-muted description">Space for small product description</div>
                                        <div class="d-flex align-items-center product"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="far fa-star"></span> </div>
                                        <div class="d-flex align-items-center justify-content-between pt-3">
                                            <div class="d-flex flex-column">
                                                <div class="h6 font-weight-bold">36.99 USD</div>
                                                <div class="text-muted rebate">48.56</div>
                                            </div>
                                            <div class="btn btn-primary">Buyd now</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="tab-pane fade show active"  id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1">
                                <div class="card"> <img class="card-img-top" src="https://www.freepnglogos.com/uploads/cucumber-png/cucumber-png-image-purepng-transparent-png-26.png">
                                    <div class="card-body">
                                        <h6 class="font-weight-bold pt-1">Product title</h6>
                                        <div class="text-muted description">Spaklkce for small product description</div>
                                        <div class="d-flex align-items-center product"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="far fa-star"></span> </div>
                                        <div class="d-flex align-items-center justify-content-between pt-3">
                                            <div class="d-flex flex-column">
                                                <div class="h6 font-weight-bold">36.99 USD</div>
                                                <div class="text-muted rebate">48.56</div>
                                            </div>
                                            <div class="btn btn-primary">Buyd now</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1">
                                <div class="card"> <img class="card-img-top" src="https://www.freepnglogos.com/uploads/cucumber-png/cucumber-png-image-purepng-transparent-png-26.png">
                                    <div class="card-body">
                                        <h6 class="font-weight-bold pt-1">Prodkkuct title</h6>
                                        <div class="text-muted description">Space for small product description</div>
                                        <div class="d-flex align-items-center product"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="far fa-star"></span> </div>
                                        <div class="d-flex align-items-center justify-content-between pt-3">
                                            <div class="d-flex flex-column">
                                                <div class="h6 font-weight-bold">36.99 USD</div>
                                                <div class="text-muted rebate">48.56</div>
                                            </div>
                                            <div class="btn btn-primary">Buyd now</div>
                                        </div>
                                    </div>
                                </div>
</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div> -->
 




<!-- @include('/layouts.script')
        <sectidon class="latest-product-area padding-bottdom">
            <div class="container">
                <div class="row product-btn d-flex justify-content-end align-items-end">
                    Section Tittle -->
                    <!-- <div class="col-xl-5 col-lg-5 col-md-5">
                        <div class="section-tittle mbD-30">
                            <h2>Type de plat </h2>
                        </div>
                    </div><br><br>
                    <div class="col-xl-7 col-lg-7 col-md-7">
                        <div class="properties__button f-right"> -->
                            <!--Nav Button  -->
                            <!-- <nav>                                                                                                
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" 
                                    href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Menu principale</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab"
                                     href="#nav-profile" role="tab" aria-controls="nav-profile"
                                      aria-selected="false">Dessert</a>
                                    <a class="nav-item nav-link" 
                                    id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab"
                                     aria-controls="nav-contact" aria-selected="false">Boisson</a>
                                    <a class="nav-item nav-link"
                                     id="nav-last-tab" data-toggle="tab" href="#nav-last" role="tab" 
                                     aria-controls="nav-contact" aria-selected="false">Entrée</a>
                                </div>
                            </nav> -->
                            <!--End Nav Button  -->
                        <!-- </div>
                    </div>
                </div><br><br>
                <div class="tab-content" id="nav-tabContent"> -->
                    <!-- card one -->
                    <!-- <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="row"> -->
                            <!-- Menu pricical -->
                        <!-- @foreach($menu_principal  as $menu_principals)
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="single-product mb-60">
                                <a href="{{ url('/visiterestauTotal/'.$menu_principals->Id ) }}">
                                    <div class="product-img text-center">
                                        <img src="{{asset('/storage/img/plats/'.$menu_principals->photo)}}" alt="">
                                    </div>
                                    <div class="product-caption text-center">
                                        <div class="product-ratting">Nom :{{$menu_principals->Nom_Plat}}
                                        </div>
                                        <div class="price">
                                            <ul>
                                                <li>Prix :<b>{{$menu_principals->Prix_Plat}} $</b></li>
                                            </ul> 
                                          {{ $menu_principal_count}} Restaurants
                                        </div>
                                    </div>
                                </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div> -->
                    <!-- Card two Dessert -->
                    <!-- <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="row">                           
                        @foreach($Desserts as $Dessert)
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="single-product mb-60">
                                <a href="{{ url('/visiterestauTotal/'.$Dessert->Id) }}">
                                    <div class="product-img text-center">
                                        <img src="{{asset('/storage/img/plats/'.$Dessert->photo)}}" alt="">
                                        
                                    </div>
                                    <div class="product-caption text-center">
                                        <div class="product-ratting">Nom:<b> {{$Dessert->Nom_Plat}} </b></div>
                                        <div class="price">
                                            <ul>
                                             <li>Prix :<b>{{$Dessert->Prix_Plat}} $</b></li>
                                            </ul> 
                                          {{ $Desserts_count}}   Restaurants
                                        </div>
                                    </div>
                                </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div> -->
                    <!-- Card three -->
                    <!-- <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <div class="row">                                                   
                        @foreach($Boissons as $Boisson)
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="single-product mb-60">
                                <a href="{{ url('/visiterestauTotal/'.$Boisson->Id) }}">
                                    <div class="product-img text-center">
                                        <img src="{{asset('/storage/img/plats/'.$Boisson->photo)}}" alt="">
                                    </div>
                                    <div class="product-caption text-center">
                                        <div class="product-ratting">Nom:<b> {{$Boisson->Nom_Plat}}</b></div>
                                        <div class="price">
                                            <ul>
                                                <li>Prix:<b>{{$Boisson->Prix_Plat}} $</b></li>
                                            </ul> 
                                           {{$Boissons_count}} Restaurants
                                        </div>
                                    </div>
                                </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div> -->
                    <!-- card foure -->
                    <!-- <div class="tab-pane fade" id="nav-last" role="tabpanel" aria-labelledby="nav-last-tab">
                        <div class="row">
                        @foreach($Entrées as $Entrée)
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="single-product mb-60">
                                <a href="{{ url('/visiterestauTotal/'.$Entrée->Id ) }}">  
                                    <div class="product-img text-center">
                                        <img src="{{asset('/storage/img/plats/'.$Entrée->photo)}}" alt="">
                                    </div>
                                    <div class="product-caption text-center">
                                        <div class="product-ratting">Nom :<b>{{$Entrée->Nom_Plat}}</b></div>
                                        <div class="price">
                                            <ul>
                                                <li>Prix:{{$Entrée->Prix_Plat}}</li>
                                            </ul>  
                                            {{$Entrées_count}} Restaurants
                                        </div>
                                    </div>
                                </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div> -->
                <!-- End Nav Card -->
            <!-- </div>
        </section> -->
        <!-- Latest Products End -->

        <!-- @include('PopularResto.popularRestaurant') -->
      
  
        
                                             
                                      
	