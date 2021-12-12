
<style>


/*****************globals*************/

img {
  max-width: 100%; }

.preview {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
      -ms-flex-direction: column;
          flex-direction: column; }
  @media screen and (max-width: 996px) {
    .preview {
      margin-bottom: 20px; } }

.preview-thumbnail.nav-tabs {
  border: none;
  margin-top: 15px; }
  .preview-thumbnail.nav-tabs li {
    width: 18%;
    margin-right: 2.5%; }
    .preview-thumbnail.nav-tabs li img {
      max-width: 100%;
      display: block; }
    .preview-thumbnail.nav-tabs li a {
      padding: 0;
      margin: 0; }
    .preview-thumbnail.nav-tabs li:last-of-type {
      margin-right: 0; }

.tab-content {
  overflow: hidden; }
  .tab-content img {
    width: 100%;
    -webkit-animation-name: opacity;
            animation-name: opacity;
    -webkit-animation-duration: .3s;
            animation-duration: .3s; }

.cardd {
  margin-top: 50px;
 
  padding: 3em;
  line-height: 1.5em; }

.details {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
      -ms-flex-direction: column;
          flex-direction: column; }



.product-title, .price,  {
  text-transform: UPPERCASE;
  font-weight: bold; }

.checked, .price span {
  color: #ff9f1a; }

.product-title, .rating, .product-description, .price,  {
  margin-bottom: 15px; }

.product-title {
  margin-top: 0; }

/*# sourceMappingURL=style.css.map */
    </style>
    @include('/layouts.script')
    @extends('/layouts.admin')
@section('content')
@if(session('success'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
            aria-hidden="true">x</span></button>
    {{session('success')}}
</div>
@endif
<br>

<div style="text-align:center;width:100%;">
    <img src="{{asset('/storage/img/plats/'.$restaurants->photo)}}" 
    style="height:400px; width:100%;" alt="" class="img-fluid"> 
 </div>                     
  <!-- <div class="cover-photo" style="background:url('{{asset('/storage/img/plats/'.$restaurants->photo)}}') ;"></div> -->
        <div class="profile-info">
            <div class="profile-photo">
                <img class="img-fluid rounded-circle" alt="">
            </div><br>
            <div class="profile-details">
                <h2 class="text-center"> Bienvenue dans
                    <a href="#menur"> <b classe="block-title" style="color:#000;">{{ $restaurants->Nom_Restau
                            }}</a></b>
                </h2>
                <div class="profile-name px-3 pt-2">
                    <h4 class="text-primary mb-0">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                                {{ $restaurants->agentrs->name}} {{ $restaurants->agentrs->Prenom_AgentR}}

                            </font>
                        </font>
                    </h4>
                    <p>
                        <font style="vertical-align: inherit;"> Numéro Tel :{{ $restaurants->agentrs->Num_Tel}}
                    </p>
                    </font>
                </div>
                <div class="profile-email px-2 pt-2">
                    <h4 class="text-muted mb-0">
                        <font style="vertical-align: inherit;">
                            E-mail: {{ $restaurants->agentrs->email}} </font>
                    </h4>
                </div>
            </div>
        </div>
    <br><br>
   
<br>
<div class="container">
		<div class="cardd">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
 				
						<div class="preview-pic tab-content">
						  <div class="tab-pane active" id="pic-1"><img src="{{asset('/storage/img/plats/'.$phot_plats->photo)}}"/></div>
						</div>	
					</div>
					<div class="details col-md-6">
						<h3 class="product-title">{{$plats->Nom_Ligns}}</h3>
						<div class="rating">
							<div class="stars">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
							</div>
							<span class="review-no">41 reviews</span>
						</div>
						<p class="product-description">{{$plats->Descrip_Plat}} Suspendisse quos? Tempus cras iure temporibus? Eu laudantium cubilia sem sem! Repudiandae et! Massa senectus enim minim sociosqu delectus posuere.</p>
						<h4 class="price">Prix  : <span>{{$plats->Prix_Plat}} $</span></h4>
						<div class="action">
							
                            <form action="{{ route('cart.store')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="id_plat" value="{{ $phot_plats->Id}}">
                                            <input type="hidden" name="id_restaurant" value="{{ $restaurants->Id_Restau }}">
                                            <input type="hidden" name="Nom_Plat" value="{{ $phot_plats->plats->Nom_Ligns }}" > 
                                            <input type="hidden" name="Prix_Plat" value="{{ $phot_plats->plats->Prix_Plat }}">
                                            <button type="submit" class="btn btn-dark">Ajouter au panier </button>
                                         </forms>
                                         <a  href="{{ url('/chat-ag-user') }}"class="btn btn-primary ">Contacter  restaurateur </a>
                                          
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



@endsection