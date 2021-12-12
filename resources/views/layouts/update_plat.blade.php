@extends('layouts.admin')
@section('content')
<!-- modifier plat  -->
<div class="container"><br><br>
  <div class="modasl-body row">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header"> Ajouter un nouveaux menu </div>
          <div class="card-body"><br>
            <form action="{{ url('update_Plat') }}" enctype="multipart/form-data" method="post">
              @csrf
              <div class="row">
                @foreach ( $restaurants as $restaurant )
                @foreach ( $menus as $menu )
                @foreach($restaurant_menus as $restaurant_menu)
                @if( Auth::user()->id == $restaurant->Id_AgentR && $restaurant_menu->Id_Menu ==
                $menu->Id
                && $restaurant_menu->Id_Restaurant == $restaurant->Id_Restau)
                <input type="hidden" name="Id_contenue" value="{{$contenue_menus->Id}}">
                <input type="hidden" name="Id_restau" value="{{$restaurant->Id_Restau}}">
                @endif
                @endforeach
                @endforeach
                @endforeach
                <div class=" col-6">
                  <label for="np" class="col-auto col-form-label col-form-label-sm">Nom du plat :
                    <b style="color : red ;">*</b> </label>
                  <input name="np" id="np" value="{{$contenue_menus->Nom_Ligns}}" class="form-control "
                    placeholder="Nom du plat" require>
                </div>
                <div class=" col-6">
                  <label for="dp" class="col-auto col-form-label col-form-label-sm">Decription du plat
                    : <b style="color : red ;">*</b>
                  </label>
                  <input name="dp" value="{{$contenue_menus->Descrip_Plat}}" type="textarea" id="dp"
                    class="form-control " placeholder="Decription du plat" require>
                </div>
                <div class=" col-6">
                  <label for="cy" class="col-auto col-form-label col-form-label-sm">Type du plat :<b
                      style="color : red ;">*</b></label>
                  <select class="form-control" name="tp" id="cy" require>
                  <option></option>
                    <@foreach ( $type_menus as $type_menu ) 
                   
                    <option value="{{$type_menu->Id}}">{{$type_menu->Type_Menu}}</option>
                      @endforeach
                  </select>
                </div>
                <div class=" col-6">
                  <label for="pp" class="col-auto col-form-label form-control-label col-form-label-sm">Prix du
                    plat : <b style="color : red ;">*</b></label>
                  <input name="pp" type="numeber" id="pp" value="{{$contenue_menus->Prix_Plat}}" class="form-control"
                    placeholder="Prix du plat" require>
                </div>
                <div class=" col-12">
                  <label for="pp" class="col-auto col-form-label form-control-label col-form-label-sm">Photo du
                    plat : <b style="color : red ;">*</b></label>
                  <input name="photo" type="file" id="pp" class="form-control" placeholder="Prix du plat" require>
                </div>
                <div class=" col-6"><br>
                  <input type="submit" class="form-control btn btn-primary" value="Ajouter">
                </div>
                <div class=" col-lg-6"><br>
                  <input type="reset" class="form-control btn btn-dark" data-dismiss="modal" value="Annuler">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection