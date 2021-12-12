


@section('bannier')
<style>

.search-sec
 {
padding: 4rem;x!! ;
}
.search-slt
{
   display: block;
   width: 100%;
    font-size: 0.875rem;
    line-height: 1.5;
    background-color: #fff;
     background-image: none;
    border: 1px solid #ccc;
    height: calc(3rem + 2px) !important;
     border-radius: 0;
}
.wrn-btn 
{
    width: 100%;
    font-size: 16px;
    font-weight: 400;
    text-transform: capitalize;
    height: calc(3rem + 2px) !important;
    border-radius: 0;
}

</style>
@endsection
@include('layouts.script')

@extends('/layouts.admin')

@section('content')
<div class="banner-image img-fluid">
    <div class="container-fluid 5">
        <div class="row">
            <div class="test-txt col-lg-12"><br>
                <h1 class="displfay mb-4 font-weight-bold text-white"><b>Découvrez et réservez le meilleur restaurant</b></h1>
                <h2 classe="block-title" style="color:#000;">Souhaitez vous un petit-déjeuner, dejeuner , diner entre <span class="typer" id="some-id"
                        data-delay="200" data-delim=":" data-words="Ami(e):Familles:Entreprise" data-colors="#ffc800">
                    </span><span class="cursor" data-cursorDisplay="_" data-owner="some-id"></span><span
                         >Diamwely</span>Restau est la solution la plus rapide
                </h4>
            </div>
            <div class="col-lg-12 ">
                <div class="banner-phone-image">
                    <section class="search-sec ">
                        <div class="container ">
                            <form action="{{route('restaurant.cherche')}}" method="" novalidate="novalidate">
                                <div class="col-lg-12">
                                    <div class="row border border-success p-1  ">
                                        <div class="col-lg-6 col-md-6 col-sm-12 p-0  ">
                                            <input  name="pays" type="text" class="form-control search-slt" 
                                            placeholder="Ville">
                                        </div>
                                        <div class="col-lg-5 col-md-5 col-sm-12 p-0">
                                            <input value="{{ request()->q ?? '' }}" name="q" type="text" class="form-control search-slt"
                                                placeholder="Restaurant ,Cuisine ....">
                                        </div>
                                        <div class="col-lg-1 col-md-1 col-sm-12 p-0">
                                            <button type="submit" class="btn btn-theme wrn-btn"
                                                style="background-color:#FFCC00"> <span
                                                    class="fa fa-search form-control-icon"></span></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div><br>
   

@include('layouts.type_menu')
      
      @include('PopularResto.popularRestaurant')
       
      
@endsection