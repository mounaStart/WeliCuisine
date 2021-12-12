<div id="menu" class="menu-main pad-top-100 pad-bottom-100">
  <div class="container">
    <div class="row" id="menur">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
          <h2 class="block-title text-center" style="color:#000;">
            Votre Menu
          </h2>
          <a href="{{ url('/newMenu') }}" data-toggle="modal" data-target="#newMenu" class="btn btn-warning"> <b
              classe="block-title" style="color:#000;">Ajouter Menu</b></a>

          <a href="{{ url('/newMenu') }}" data-toggle="modal" data-target="#deleteMenu" class="btn btn-warning"> <b
              classe="block-title" style="color:#000;">Supprimer Menu</b></a>
        </div> <br>
       
        <div class="modal fade" id="newMenu">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Les informations d'un menu :</h4>
                <button type="button" class="close" data-dismiss="modal">
                  <span>&times;</span>
                </button>
              </div>
              <div class="modal-body row">
                <form action="{{ url('storemenu') }}" enctype="multipart/form-data" method="post">
                  @csrf
                  <fieldset class="shelduler-border">
                    <legend class="shelduler-border" style="text-align: center ;">
                      <p>Ajouter un nouveaux menu </p>
                    </legend>
                    <div class="form-group">
                      <label for="nm" class="col-auto col-form-label col-form-label-sm">Nom de votre menu :
                        <b style="color : red ;">*</b> </label>
                      <div class=" col">
                        <input name="nm" id="nm" class="form-control " placeholder="Nom de votre menu" require>
                      </div>
                      <label for="nr" class="col-auto col-form-label col-form-label-sm">Nom du Restau:
                        <b style="color : red ;">*</b> </label>
                      <div class=" col">
                        <select id="edit-sexe" class="form--field__sexe form-sexe required form-control"
                          data-drupal-selector="edit-sexe" type="text" id="edit-sexe" name="nr" value=""
                          required="required" aria-required="true">
                          @foreach ( $restaurants as $restaurant )
                          @if( Auth::user()->id == $restaurant->Id_AgentR)
                         
                          <option value="{{$restaurant->Id_Restau}}"> {{ $restaurant->Nom_Restau}}</option>
                          @endif
                          @endforeach
                        </select>
                      </div><br>
                      <input type="submit" class="btn btn-primary" value="Ajouter">
                      <input type="reset" class="btn btn-warning" data-dismiss="modal" value="Annuler">
                    </div>
                  </fieldset> 
                </form>
              </div>
            </div>
          </div>
        </div>
        
        @foreach($restaurant_menus->unique() as $restaurants_menu)
        @foreach($restaurants->unique() as $restaurant )
        @foreach($menus->unique() as $menu)
        @if( Auth::user()->id == $restaurant->Id_AgentR &&
        $restaurants_menu->Id_Menu == $menu->Id &&
        $restaurants_menu->Id_Restaurant == $restaurant->Id_Restau)

        

        <!-- SUprression menu  -->
        <div class="modal fade" id="deleteMenu">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Les informations d'un menu :</h4>
                <button type="button" class="close" data-dismiss="modal">
                  <span>&times;</span>
                </button>
              </div>
              <div class="modal-body row">
                <form action="{{ route('deletemenu') }}" enctype="multipart/form-data" method="post">
                  @csrf
                  <fieldset class="shelduler-border">
                    <legend class="shelduler-border" style="text-align: center ;">
                      <p>Suppression d'un menu </p>
                    </legend>
                    <div class="form-group">
                      <label for="nr" class="col-auto col-form-label col-form-label-sm">Nom de votre menu:
                        <b style="color : red ;">*</b> </label>
                      <div class=" col">
                        <select id="edit-sexe" class="form--field__sexe form-sexe required form-control"
                          data-drupal-selector="edit-sexe" type="text" id="edit-sexe" name="nom_menu" value=""
                          required="required" aria-required="true">
                          <option value="{{$menu->Id}}"> {{ $menu->Nom_Menu}}</option>
                        </select>
                      </div><br>
                      <input type="submit" class="btn btn-danger" value="Supprimer">
                      <input type="reset" class="btn btn-warning" data-dismiss="modal" value="Annuler">
                    </div>
                  </fieldset>
                </form>
              </div>
            </div>
          </div>
        </div>
       
        <div class="modal fade" id="addPlat">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Les informations d'un plat' :</h4>
                <button type="button" class="close" data-dismiss="modal">
                  <span>&times;</span>
                </button>
              </div>
              <div class="modal-body row">
                <form action="{{ url('storeplat') }}" enctype="multipart/form-data" method="post">
                  @csrf
                  <fieldset class="shelduler-border">
                    <legend class="shelduler-border" style="text-align: center ;">
                      <p>Ajouter un nouveaux plat </p>
                    </legend>
                    <div class="form-group">
                      <label for="nm" class="col-auto col-form-label col-form-label-sm">Nom du menu :
                        <b style="color : red ;">*</b> </label>
                      <div class=" col">
                        <select class="form-control" name="nm" id="nm" require>
                          <option value="{{$menu->Id}}">
                            {{$menu->Nom_Menu}}
                          </option>
                        </select>
                      </div>
                      <label for="np" class="col-auto col-form-label col-form-label-sm">Nom du plat :
                        <b style="color : red ;">*</b> </label>
                      <div class=" col">
                        <input name="np" id="np" class="form-control " placeholder="Nom du plat" require>
                      </div>

                    </div>
                    <label for="dp" class="col-auto col-form-label col-form-label-sm">Decription du plat : <b
                        style="color : red ;">*</b>
                    </label>
                    <div class=" col">
                      <div class=" col">
                        <input name="dp" type="textarea" id="dp" class="form-control " placeholder="Decription du plat"
                          require>
                      </div>
                    </div>
                    <label for="tp" class="col-auto col-form-label col-form-label-sm">Type du plat :<b
                        style="color : red ;">*</b></label>
                    <div class=" col">
                      <select class="form-control" name="tp" id="tp" require>
                        @foreach ( $type_menus as $type_menu ) 
                        
                        <option value="{{$type_menu->Id}}">{{$type_menu->Type_Menu}}</option>
                        @endforeach
                      </select>
                    </div>
                    <label for="pp" class="col-auto col-form-label form-control-label col-form-label-sm">Prix du
                      plat : <b style="color : red ;">*</b></label>
                    <div class=" col">
                      <input name="pp" type="numeber" id="pp" class="form-control" placeholder="Prix du plat" require>
                    </div>
                    <label for="photo" class="col-auto col-form-label form-control-label col-form-label-sm">Photo du
                      plat : <b style="color : red ;">*</b></label>
                    <div class=" col">
                      <input name="photo" type="file" id="photo" class="form-control" placeholder="Prix du plat" require>
                    </div>
                  </fieldset>
                  <input type="submit" class="btn btn-warning" style="background:#ffc107; color:white;" value="Ajouter">
                  <input type="reset" class="btn " style="background:#f5f5f5; color:#000;" data-dismiss="modal" value="Annuler">
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-menu">
          <a href="#menur"><b classe="block-title" style="color:#000;">
              {{ $menu->Nom_Menu}}</b></a>
          <div class="row">
         

            @foreach($menu_contenue_menus as $menu_contenue_menu)
            @foreach($contenue_menus as $contenue_menu)
            @foreach($phot_plats->unique() as $phot_plat)
            @if($contenue_menu->Id == $menu_contenue_menu->id_contenue_menu &&
            $menu_contenue_menu->id_menu == $menu->Id &&
            $contenue_menu->Id == $phot_plat->Id_Contenue)
            <div class="col-xl-6   col-md-6">
              <div class="offer-item">
                <img src="{{asset('/storage/img/plats/'.$phot_plat->photo)}}" alt="" class="img-responsive">
                <div>
                  <h3>{{$contenue_menu->Nom_Ligns}}</h3>
                  <p>{{$contenue_menu->Descrip_Plat}}</p>
                </div>
                <span class="offer-price">{{$contenue_menu->Prix_Plat}} $</span>
              </div>

              <a href="{{ url('/agentr/'.$contenue_menu->Id ) }}" class="btn btn-warning"> <b classe="block-title"
                  style="color:#000;">Modifier Plat</b></a>
            </div>
            @endif
            @endforeach
            @endforeach
            @endforeach
           
          </div>
          <a class="btn btn-warning" data-toggle="modal" data-target="#addPlat"
            href="{{ url('/createe') }}"><Strong>Ajoutter plat</Strong></a>
          <a href="{{ url('/newMenu') }}" data-toggle="modal" data-target="#deletePlat" class="btn btn-warning"> <b
              classe="block-title" style="color:#000;">Suppreimer Plat</b></a> <br><br>
        </div>
        <!-- Suppression d'une plat  -->
        <div class="modal fade" id="deletePlat">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Les informations d'un plat :</h4>
                <button type="button" class="close" data-dismiss="modal">
                  <span>&times;</span>
                </button>
              </div>
              <div class="modal-body row">
                <form action="{{ route('deleteplat') }}" enctype="multipart/form-data" method="post">
                  @csrf
                  <fieldset class="shelduler-border">
                    <legend class="shelduler-border" style="text-align: center ;">
                      <p>Suppression d'un plat</p>
                    </legend>
                    <div class="form-group">
                      <label for="nr" class="col-auto col-form-label col-form-label-sm">Nom de votre menu:
                        <b style="color : red ;">*</b> </label>
                      <div class=" col">
                        <select id="edit-sexe" class="form--field__sexe form-sexe required form-control"
                          data-drupal-selector="edit-sexe" type="text" id="edit-sexe" name="nom_plat" value=""
                          required="required" aria-required="true">
                          @foreach($menu_contenue_menus as $menu_contenue_menu)
                          @foreach($contenue_menus as $contenue_menu)
                          @foreach($phot_plats->unique() as $phot_plat)
                          @if($contenue_menu->Id == $menu_contenue_menu->id_contenue_menu &&
                          $menu_contenue_menu->id_menu == $menu->Id &&
                          $contenue_menu->Id == $phot_plat->Id_Contenue)
                          <option value="{{$contenue_menu->Id}}"> {{$contenue_menu->Nom_Ligns}}</option>
                          @endif
                          @endforeach
                          @endforeach
                          @endforeach
                        </select>
                      </div><br>
                      <input type="submit" class="btn btn-danger" value="Supprimer">
                      <input type="reset" class="btn btn-warning" data-dismiss="modal" value="Annuler">
                    </div>
                  </fieldset>
                </form>
              </div>
            </div>
          </div>
        </div>
        @endif
        @endforeach
        @endforeach
        @endforeach