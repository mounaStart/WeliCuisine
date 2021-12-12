@include('layouts.script')

@extends('/layouts.admin')

@section('content')


<script src="js/jquery-3.2.1.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-AB-9XZd-iQby-bNLYPFyb0pR2Qw3orw&callback=initMap" async defer></script>

<script src="js/script.js"></script>

<div class="container">

<div id="map" style="height:500px; display:none;"></div>
    <div class="col-sm-4">
        <h1>List des restaurants </h1>
        <form action="{{url('/marker')}}" class=""></form>
      
        <div class="form-group">
            <label for="">Title</label>
            <input type="text" class="form-control input-sm" name="title">
        </div>
        <div class="form-group">
            <label for="">Map</label>
            <input type="text" class="form-control input-sm" id='searchmap' >
            <div class="" id='map-canvas'></div>
        </div>
        <div class="form-group">
            <label for="">lalti</label>
            <input type="text" class="form-control input-sm" id='lat'name="lat">
        </div>
        <div class="form-group">
            <label for="">longi</label>
            <input type="text" class="form-control input-sm" id="log" name="lng">
        </div>
        <button class="btn btn-sm btn-danger" type="submit">Save</button>
       
      </form>
    </div>
</div>

<script>
var map;
function initMap() {
map = new google.maps.Map(document.getElementById('map'), {
center: {lat: 9.5162, lng: 123.158},
zoom: 8
});
}
</script>
<script>
    var map = new google.maps.Map(document.getElementById('map-canvas') ,{
        center:{
            lat:27.72 ,
            lng:65.36
        },
        zoom:15
    });
     var marker = new   google.maps.Marker({
         position:{
            lat:27.72 ,
            lng:65.36
         },
         map:map,
         draggable:true 
     });
     var searchbox = new google.maps.places.SearchBox(document.getElementById('searchmap')) ;
     google.maps.event.addListener(searchbox, 'place_Changed',function(){
         var places = searchbox.getPlaces() ;
         var bounds = new google.maps.LatLnBounds() ;

         var i,place ;
         for(i = 0 ;places[i] ; i++){
            bounds.extends(place.geometry.location) ;
            marker.setPosition(place.geometry.location) ;
         }
         map.fitBounds(bounds) ;
         map.setZoom(15) ;
     });
     google.maps.event.addListener(marker , 'position_changed' ,function(){
         var lat = marker.getPosition().lat() ;
         var lng = marker.getPosition().lng() ;
         $('#lat').val(lat) ;
         $('#lng').val(lng) ;
     });
</script>

@endsection

  <!-- Form::open(array('url'=>'/','files'=>true)) -->
   <!-- Form::close() -->