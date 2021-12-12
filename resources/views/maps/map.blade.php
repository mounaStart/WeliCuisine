@include('layouts.script')

@extends('/layouts.admin')

@section('content')


<script src="js/jquery-3.2.1.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-AB-9XZd-iQby-bNLYPFyb0pR2Qw3orw&callback=initMap" async defer></script>

<script src="js/script.js"></script>

<div class="container">

<h2>Restaurant</h2>

<div class="map" id="app">

<gmap-map 
   :center="{lat:10,lng:10} "
   :zoom="7"
   :style="width: 100%; height: 320px;"
   ></gmap-map>
</div>
</div>


<script src="{{ mix('js/app.js') }}"></script>
@endsection

  <!-- Form::open(array('url'=>'/','files'=>true)) -->
   <!-- Form::close() -->