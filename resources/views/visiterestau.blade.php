@extends('/layouts.admin')
@section('content')
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
     
@if(session('success'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
            aria-hidden="true">x</span></button>
    {{session('success')}}
</div>
@endif
@include("/layouts.menuClient2")
@endsection