@include('layouts.script')
@extends('layouts.admin')
@section('content')
<br>
@if (session()->has('popup'))
<div class="container">
  <div class="alert  a alert-success" role="alert">
    Votre restaurant est maintenant disponible chez les clients
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
        aria-hidden="true">x</span></button>
  </div>
</div>
@endif

@if(session('success-agentr'))
<div class="container">
  <div class="alert alert-success">
    {{session('success-agentr')}}
  </div>
</div>
@endif
@if(session('error'))
<div class="container">
  <div class="alert alert-danger">
    {{session('error')}}
  </div>
</div>
@endif
@if($total_restaura < 2)
<div class="container-fluid">
  <div class="profile card card-body">
    <div class="profile-head">
      <div class="photo-content">
        <div class="row"><br>
          <h1 class="text-center block-title" style="color:#000;">Le restaurants que vous disposez </h1><br>
          @foreach($restaurants as $restaurant)
          @if( Auth::user()->id == $restaurant->Id_AgentR)
          <img src="{{asset('/storage/img/plats/'.$restaurant->photo)}}" alt=""
              style="height:370px;"  class="img-fluid">
          <div class="col">
            <div style="float:right ;">
              <a href="{{ url('/change/img') }}" data-toggle="modal" data-target="#ChangePhot"
                class="btn btn-primary btn-block">
                <b>Change picture</b></a>
            </div><br><br>
            <div class="profile-info">
              <div class="profile-photo">
                <img src="assets/img/profile.png" class="img-fluid rounded-circle" alt="">
              </div>
              <div class="profile-details">
                <h2 class="text-center">
                  <a href="#menur"> <b classe="block-title" style="color:#000;">{{ $restaurant->Nom_Restau }}</a></b>
                  Restaurant
                </h2>
              </div>
            </div>
          </div>
          <!-- Modifier photo  -->
          <div class="modal fade" id="ChangePhot">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                  </button>
                </div>
                <div class="modal-body row">
                  <form action="{{ route('change.photo') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <fieldset class="shelduler-border">
                      <legend class="shelduler-border" style="text-align: center ;">
                        <p>Modification photo restaurant </p>
                      </legend>
                      <label for="pp" class="col-auto col-form-label form-control-label col-form-label-sm">Photo
                        :</label>
                      <div class=" col">
                        <input name="photo" type="file" id="pp" class="form-control" placeholder="Prix du plat" require>


                        <input name="id_restau" type="hidden" value="{{$restaurant->Id_Restau}}">

                      </div>
                      <input type="submit" class="btn btn-info" value="Ajouter">
                      <input type="reset" class="btn btn-warning" data-dismiss="modal" value="Annuler">
                    </fieldset>
                  </form>
                </div>
              </div>
            </div>
          </div>


          @endif
          @endforeach

        </div><br>
        <div class="profile-details">
          <div class="profile-email px-2 pt-2">
            <p class="text-center">
              <font style="vertical-align: inherit;"> Total des commandes :

                <b classe="block-title" style="color:#000;">
                  <a href="#" data-toggle="modal" data-target="#TotalComande" class="btn">
                    {{ $menuTotal_commande}}</a></b>
              </font>
              <br> Total des visiteurs :
              @foreach($total_visitRestau as $total_visitRestaus)
              <b classe="block-title" style="color:#000;"> {{ $total_visitRestaus->tvisite }}</b>
              @endforeach
            </p>
          </div>
          <div class="profile-name px-3 pt-2">
            <h4 class="text-primary mb-0">
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">{{Auth::user()->name}} {{Auth::user()->Prenom_AgentR}}</font>
              </font>
            </h4>
            <p>
              <font style="vertical-align: inherit;"> Numéro Tel :{{Auth::user()->Num_Tel}}
            </p>
            </font>
          </div>
          <div class="profile-email px-2 pt-2">
            <h4 class="text-muted mb-0">
              <font style="vertical-align: inherit;">E-mail: {{Auth::user()->email}} </font>
            </h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="deroulantb" data-toggle="dropdown"
    aria-haspopup="true" aria-expanded="false">Publier Restaurant</button>
  <div class="dropdown-menu" aria-labelledby="deroulantb">
    @foreach($restaurants as $restaurant )
    @if( Auth::user()->id == $restaurant->Id_AgentR  )
    <a href="{{ url('/publierReso/'.$restaurant->Id_Restau)}} " class="dropdown-item">{{ $restaurant->Nom_Restau }}</a>
    @endif
    @endforeach
  </div>
</div>

@else
<div class="container-fluid">
  <div class="profile card card-body px-3 pt-3 pb-0">
    <div class="profile-head">
      <div class="photo-content">
        <div class="row"><br>
          <h1 class="text-center block-title" style="color:#000;">Les restaurants que vous disposez </h1><br>
          @foreach($restaurants as $restaurant)
          @if( Auth::user()->id == $restaurant->Id_AgentR)
          <div class="col-xl-6 col-lg-6 col-md-6">
            <div class="single_product md-60"><img src="{{asset('/storage/img/plats/'.$restaurant->photo)}}" alt=""
                class="img-fluid"> </div>
            <div style="float:right ;">
              <a href="{{ url('/change/img') }}" data-toggle="modal" data-target="#ChangePhot"
                class="btn btn-primary btn-block">
                <b>Change picture</b></a>

            </div><br><br>
            <div class="profile-info">
              <div class="profile-photo">
                <img src="assets/img/profile.png" class="img-fluid rounded-circle" alt="">
              </div>
              <div class="profile-details">
                <h2 class="text-center">
                  <a href="#menur"> <b classe="block-title" style="color:#000;">{{ $restaurant->Nom_Restau }}</a></b>
                  Restaurant
                </h2>
              </div>
            </div>
          </div>
          <!-- Modifier photo  -->
          <div class="modal fade" id="ChangePhot">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                  </button>
                </div>
                <div class="modal-body row">
                  <form action="{{ route('change.photo') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <fieldset class="shelduler-border">
                      <legend class="shelduler-border" style="text-align: center ;">
                        <p>Modification photo restaurant </p>
                      </legend>
                      <label for="pp" class="col-auto col-form-label form-control-label col-form-label-sm">Photo
                        :</label>
                      <div class=" col">
                        <input name="photo" type="file" id="pp" class="form-control" placeholder="Prix du plat" require>


                        <input name="id_restau" type="hidden" value="{{$restaurant->Id_Restau}}">

                      </div>
                      <input type="submit" class="btn btn-info" value="Ajouter">
                      <input type="reset" class="btn btn-warning" data-dismiss="modal" value="Annuler">
                    </fieldset>
                  </form>
                </div>
              </div>
            </div>
          </div>


          @endif
          @endforeach

        </div><br>
        <div class="profile-details">
          <div class="profile-email px-2 pt-2">
            <p class="text-center">
              <font style="vertical-align: inherit;"> Total des commandes :

                <b classe="block-title" style="color:#000;">
                  <a href="#" data-toggle="modal" data-target="#TotalComande" class="btn">
                    {{ $menuTotal_commande}}</a></b>
              </font>
              <br> Total des visiteurs :
              @foreach($total_visitRestau as $total_visitRestaus)
              <b classe="block-title" style="color:#000;"> {{ $total_visitRestaus->tvisite }}</b>
              @endforeach
            </p>
          </div>
          <div class="profile-name px-3 pt-2">
            <h4 class="text-primary mb-0">
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">{{Auth::user()->name}} {{Auth::user()->Prenom_AgentR}}</font>
              </font>
            </h4>
            <p>
              <font style="vertical-align: inherit;"> Numéro Tel :{{Auth::user()->Num_Tel}}
            </p>
            </font>
          </div>
          <div class="profile-email px-2 pt-2">
            <h4 class="text-muted mb-0">
              <font style="vertical-align: inherit;">E-mail: {{Auth::user()->email}} </font>
            </h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="deroulantb" data-toggle="dropdown"
    aria-haspopup="true" aria-expanded="false">Publier Restaurant</button>
  <div class="dropdown-menu" aria-labelledby="deroulantb">
    @foreach($restaurants as $restaurant )
    @if( Auth::user()->id == $restaurant->Id_AgentR  )
    <a href="{{ url('/publierReso/'.$restaurant->Id_Restau)}} " class="dropdown-item">{{ $restaurant->Nom_Restau }}</a>
    @endif
    @endforeach
  </div>
</div>


@endif
<!-- <Total commande -->
<div class="modal fade" id="TotalComande">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>
      <div class="modal-body row">
        <div class=" shaddow mbs-3">
          <table class="table table-bordered table-hover bg-white mb-0">
            <thead class="thead-dark">
              <tr>
                <th>Nom Plat </th>
                <th>Nom client</th>
                <th>Montant payé</th>
                <th>Date paiments</th>
              </tr>
            </thead>
            <tbody>
              @foreach($list_commande as $list_commandes)
              <tr>
                <td>{{$list_commandes->Nom_Ligns}}</td>
                <td>{{ $list_commandes->name}} {{$list_commandes->Prenom_Client}}</td>
                <td>{{$list_commandes->Montant_Paye}}</td>
                <td>{{$list_commandes->Date_Paiment}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@include("layouts.menu")








@endsection