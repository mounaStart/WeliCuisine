 
<style>
 
 .wrappers {
     padding: 30px;
     max-width: 1200px;
     margin: auto
 }
 /* 
 .h3 {
     font-weight: 900
 } */
 /* 
 .views {
     font-size: 0.85rem
 } */
 
 .btn {
     color: #666;
     font-size: 0.85rem
 }
 
 .btn:hover {
     color: #61b15a
 }
 
 /* .green-label {
     background-color: #defadb;
     color: #48b83e;
     border-radius: 5px;
     font-size: 0.8rem;
     margin: 0 3px
 } */
 /* 
 .radio,
 .checkbox {
     padding: 6px 10px
 } */
 
 .border {
     border-radius: 12px
 }
 /* 
 .options {
     position: relative;
     padding-left: 25px
 }
 
 .radio label,
 .checkbox label {
     display: block;
     font-size: 14px;
     cursor: pointer;
     margin: 0
 }
 
 .options input {
     opacity: 0
 } */
 /* 
 .checkmark {
     position: absolute;
     top: 0px;
     left: 0;
     height: 20px;
     width: 20px;
     background-color: #f8f8f8;
     border: 1px solid #ddd;
     border-radius: 50%
 } */
 /* 
 .options input:checked~.checkmark:after {
     display: block
 } */
 /* 
 .options .checkmark:after {
     content: "";
     width: 9px;
     height: 9px;
     display: block;
     background: white;
     position: absolute;
     top: 52%;
     left: 51%;
     border-radius: 50%;
     transform: translate(-50%, -50%) scale(0);
     transition: 300ms ease-in-out 0s
 } */
 /* 
 .options input[type="radio"]:checked~.checkmark {
     background: #61b15a;
     transition: 300ms ease-in-out 0s
 }
 
 .options input[type="radio"]:checked~.checkmark:after {
     transform: translate(-50%, -50%) scale(1)
 } */
 /* 
 .count {
     font-size: 0.8rem
 } */
 /* 
 label {
     cursor: pointer
 } */
 /* 
 .tick {
     display: block;
     position: relative;
     padding-left: 23px;
     cursor: pointer;
     font-size: 0.8rem;
     margin: 0
 }
 
 .tick input {
     position: absolute;
     opacity: 0;
     cursor: pointer;
     height: 0;
     width: 0
 } */
 /* 
 .check {
     position: absolute;
     top: 1px;
     left: 0;
     height: 18px;
     width: 18px;
     background-color: #f8f8f8;
     border: 1px solid #ddd;
     border-radius: 3px
 }
 
 .tick:hover input~.check {
     background-color: #f3f3f3
 }
 
 .tick input:checked~.check {
     background-color: #61b15a
 } */
 /* 
 .check:after {
     content: "";
     position: absolute;
     display: none
 }
 
 .tick input:checked~.check:after {
     display: block;
     transform: rotate(45deg) scale(1)
 }
 
 .tick .check:after {
     left: 6px;
     top: 2px;
     width: 5px;
     height: 10px;
     border: solid white;
     border-width: 0 3px 3px 0;
     transform: rotate(45deg) scale(2)
 } */
 /* 
 #country {
     font-size: 0.8rem;
     border: none;
     border-left: 1px solid #ccc;
     padding: 0px 10px;
     outline: none;
     font-weight: 900
 } */
 /* 
 .close {
     font-size: 1.2rem
 } */
 /* 
 div.text-muted {
     font-size: 0.85rem
 } */
 
 #sidebar {
     width: 25%;
     float: left
 }
 
 .category {
     font-size: 0.9rem;
     cursor: pointer
 }
 /* 
 .list-group-item {
     border: none;
     padding: 0.3rem 0.4rem 0.3rem 0rem
 } */
 
 .badge-primary {
     background-color: #defadb;
     color: #48b83e
 }
  
 
 #prosducts {
     width: 75%;
     padding-left: 30px;
     margin: 0;
     float: right
 }
 
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
 
 div.h6,
 h6 {
     margin: 0
 }
 
 .product .fa-star {
     font-size: 0.9rem
 }
 
 .rebate {
     font-size: 0.9rem
 }
 
 .btn.btn-primary {
     background-color: #48b83e;
     color: #fff;
     border: 1px solid #008000;
     border-radius: 10px;
     font-weight: 800
 }
 
 .btn.btn-primary:hover {
     background-color: #48b83ee8
 }
 
 img {
     width: 192px;
     height: 132px;
     object-fit: contain
 }
 
 .clear {
     clear: both
 }
 
 .btn.btn-success {
     visibility: hidden
 }
 
 @media(min-width:992px) {
 
     .filter,
     #mobile-filter {
         display: none
     }
 }
 
 @media(min-width:768px) and (max-width:991px) {
 
     .radio,
     .checkbox {
         padding: 6px 10px;
         width: 49%;
         float: left;
         margin: 5px 5px 5px 0px
     }
 
     .filter,
     #mobile-filter {
         display: none
     }
 }
 
 @media(min-width:576px) and (max-width:767px) {
     #sidebar {
         width: 35%
     }
 
     #products {
         width: 105%
     }
 
     .filter,
     #mobile-filter {
         display: none
     }
 
     .h3+.ml-auto {
         margin: 0
     }
 }
 
 @media(max-width:575px) {
     .wrappers {
         padding: 10px
     }
 
     .h3 {
         font-size: 1.3rem
     }
 
     #sidebar {
         display: none
     }
 
     #products {
         width: 100%;
         float: none
     }
 
     #products {
         padding: 0
     }
 
     .clear {
         float: left;
         width: 80%
     }
 
     .btn.btn-success {
         visibility: visible;
         margin: 10px 0px;
         color: #fff;
         padding: 0.2rem 0.1rem;
         width: 20%
     }
 
     .green-label {
         width: 50%
     }
 
     .btn.text-success {
         padding: 0
     }
 
     .content,
     #mobile-filter {
         clear: both
     }
 }
 </style>
 <div class="container">
    <div class="row">
    <h1 class=" text-center"><b>Produits les plus  tendance</b></h1><br><br>
 <div class="wrappers">
             <div id="mobile-filter">
                 <div class="py-3">
                     <h5 class="font-weight-bold">Categories</h5>
                     <ul class="list-group">
                         <li id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" 
                                     aria-selected="true" class="active list-group-item list-group-item-action d-flex justify-content-between align-items-center category"> Menu principale <span class="badge badge-primary badge-pill">328</span> </li>
                         <li  id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                                     aria-controls="nav-profile" aria-selected="false"  class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category"> Dessert <span class="badge badge-primary badge-pill">112</span> </li>
                         <li   id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"
                                 class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category"> Boisson <span class="badge badge-primary badge-pill">32</span> </li>
                         <li   id="nav-last-tab" data-toggle="tab" href="#nav-last" role="tab" aria-controls="nav-contact" aria-selected="false" 
                                 class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category"> Entrée <span class="badge badge-primary badge-pill">48</span> </li>
                     </ul>
                 </div>
             </div>
             <div class="content py-md-0 py-3">
                 <div id="nav-tab" role="tablist">
                     <section id="sidebar">
                         <div class="py-3">
                             <h5 class="font-weight-bold">Categories</h5>
                             <ul class="list-group">
                                 <li id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" 
                                         aria-selected="true" class="active list-group-item list-group-item-action d-flex justify-content-between align-items-center category"> Menu principale <span class="badge badge-primary badge-pill">328</span> </li>
                                 <li  id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                                         aria-controls="nav-profile" aria-selected="false"  class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category"> Dessert <span class="badge badge-primary badge-pill">112</span> </li>
                                 <li   id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"
                                     class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category"> Boisson <span class="badge badge-primary badge-pill">32</span> </li>
                                 <li   id="nav-last-tab" data-toggle="tab" href="#nav-last" role="tab" aria-controls="nav-contact" aria-selected="false" 
                                     class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category"> Entrée <span class="badge badge-primary badge-pill">48</span> </li>
                             </ul>
                         </div>
                     </section> <!-- Products Section -->
                 </div>
             </div>
             <section id="products">
                 <div class="container py-3">
                     <div class="tab-content" id="nav-tabContent">
                         <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                             <div class="row">
                                 @foreach($menu_principal  as $menu_principals)
                            
                                     <div class="col-lg-6 col-md-6 col-sm-10 offset-md-0 offoset-sm-1">
                                         <a href="{{ url('/visiterestauTotal/'.$menu_principals->Id ) }}">
                                             <div class="card"> 
                                                 <DIV Class="col-10">
                                                 <img class="card-img-top"  src="{{asset('/storage/img/plats/'.$menu_principals->photo)}}"></div>
                                                 <div class="card-body">
                                                     <h6 class="font-weight-bold pt-1"><b>{{$menu_principals->Nom_Ligns}}</b></h6>
                                                     <div class="text-muted description">{{$menu_principals->Descrip_Plat}}</div>
                                                     <div class="d-flex align-items-center product"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="far fa-star"></span> </div>
                                                     <div class="d-flex align-items-center justify-content-between pt-3">
                                                         <div class="d-flex flex-column">
                                                             <div class="h6 font-weight-bold">{{$menu_principals->Prix_Plat}} MRU </div>
                                                             <div class="text-muted rebate">{{ $menu_principal_count}}   Restaurants</div>
                                                         </div>
                                                         <!-- <div class="btn btn-primary">Buy now</div> -->
                                                     </div>
                                                 </div>
                                             </div>
                                         </a>
                                     </div><br>
                                 @endforeach
                             </div>
                         </div>
                         <div class="tab-pane fade  show " id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                             <div class="row">
                                 @foreach($Desserts as $Dessert)
                                     <div class="col-lg-6 col-md-6 col-sm-10 offset-md-0 offset-sm-1 pt-md-0 pt-4">
                                         <a href="{{ url('/visiterestauTotal/'.$Dessert->Id) }}">
                                             <div class="card"> <img class="card-img-top" src="{{asset('/storage/img/plats/'.$Dessert->photo)}}">
                                                 <div class="card-body">
                                                     <h6 class="font-weight-bold pt-1"><b> {{$Dessert->Nom_Ligns}} </b></h6>
                                                     <div class="text-muted description">{{$Dessert->Descrip_Plat}}  </div>
                                                     <div class="d-flex align-items-center product"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="far fa-star"></span> </div>
                                                     <div class="d-flex align-items-center justify-content-between pt-3">
                                                         <div class="d-flex flex-column">
                                                             <div class="h6 font-weight-bold"><b>{{$Dessert->Prix_Plat}} MRU</b></div>
                                                             <div class="text-muted rebate">{{ $Desserts_count}}   Restaurants</div>
                                                         </div>
                                                         <!-- <div class="btn btn-primary">Buy now</div> -->
                                                     </div>
                                                 </div>
                                             </div>
                                         </a>
                                     </div>
                                 @endforeach
                             </div>
                         </div>
                         <div class="tab-pane fade show" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                             <div class="row"> 
                                 @foreach($Boissons as $Boisson)
                                     <div class="col-lg-6 col-md-6 col-sm-10 offset-md-0 offset-sm-1 pt-lg-0 pt-4">
                                         <a href="{{ url('/visiterestauTotal/'.$Boisson->Id) }}">
                                             <div class="card"> <img class="card-img-top" src="{{asset('/storage/img/plats/'.$Boisson->photo)}}">
                                                 <div class="card-body">
                                                     <h6 class="font-weight-bold pt-1"><b> {{$Boisson->Nom_Ligns}} </b></h6>
                                                     <div class="text-muted description">{{$Boisson->Descrip_Plat}}</div>
                                                     <div class="d-flex align-items-center product"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="far fa-star"></span> </div>
                                                     <div class="d-flex align-items-center justify-content-between pt-3">
                                                         <div class="d-flex flex-column">
                                                             <div class="h6 font-weight-bold"><b>{{$Boisson->Prix_Plat}} MRU</b></div>
                                                             <div class="text-muted rebate"> {{$Boissons_count}} Restaurants</div>
                                                         </div>
                                                         <!-- <div class="btn btn-primary">Buy now</div> -->
                                                     </div>
                                                 </div>
                                             </div>
                                         </a>
                                     </div>
                                 @endforeach
                             </div>
                         </div>
                         <div class="tab-pane fade show" id="nav-last" role="tabpanel" aria-labelledby="nav-last-tab">
                             <div class="row"> 
                                 @foreach($Entrées as $Entrée)
                                     <div class="col-lg-6 col-md-6 col-sm-10 offset-md-0 offset-sm-1 pt-lg-0 pt-4">
                                         <a href="{{ url('/visiterestauTotal/'.$Entrée->Id) }}">
                                             <div class="card"> <img class="card-img-top" src="{{asset('/storage/img/plats/'.$Entrée->photo)}}">
                                                 <div class="card-body">
                                                     <h6 class="font-weight-bold pt-1"><b> {{$Entrée->Nom_Ligns}} </b></h6>
                                                     <div class="text-muted description">{{$Entrée->Descrip_Plat}}</div>
                                                     <div class="d-flex align-items-center product"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="far fa-star"></span> </div>
                                                     <div class="d-flex align-items-center justify-content-between pt-3">
                                                         <div class="d-flex flex-column">
                                                             <div class="h6 font-weight-bold"><b>{{$Entrée->Prix_Plat}} MRU</b></div>
                                                             <div class="text-muted rebate"> {{$Entrées_count}} Restaurants</div>
                                                         </div>
                                                         <!-- <div class="btn btn-primary">Buy now</div> -->
                                                     </div>
                                                 </div>
                                             </div>
                                         </a>
                                     </div>
                                 @endforeach
                             </div>
                         </div>
                     </div>
                 </div>
             </section>
         </div>