<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('extra-meta')
    <title>Agency - Start Bootstrap Theme</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    @yield('banier')
    @yield('extra-script')
    @yield('nav-script')
    @yield('type_menu')
    @yield('test')
    @yield('test2')
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
  
    <link href="/css/styles.css" rel="stylesheet" /> 
    <link rel="stylesheet" href="/css/style.css"> 
    <link rel="stylesheet" href="/bootstrap/css/style.css">
    <!-- <link rel="stylesheet" href="{{ asset('/plugins/ijaboCropTool/ijaboCropTool.min.css') }}"> -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    @yield('bannier')
     
   
<style>
     .photo-content .cover-photo {
    /* background: url(/assets/img/cover.jpg); */
    /* background-size: cover; */
    /* background-position: center; */
    background-repeat: no-repeat;
    min-height: 469px;
    min-width: 100%;
}
.latest-product-area .nav-tabs .nav-link {
  border: 0;
  border-bottom: 2px solid transparent;
} 


@media (max-width: 767px) {
  /* line 88, ../../SAIFUL/Running_project/250 eCommerce_HTML/250 eCommerce_HTML/250 eCommerce_HTML/assets/scss/_latest_products.scss */
  .latest-product-area .nav-tabs .nav-link {
    padding: .5rem .6rem;
  }
}
.latest-product-area .nav-tabs .nav-item.show .nav-link, .latest-product-area .nav-tabs .nav-link.active {
  color: #ff003c;
}
.latest-product-area .nav-tabs .nav-item {
  padding-bottom: 10px;
  display: block;
  color: #8f8f96;
  text-transform: capitalize;
  font-size: 16px;
}
.latest-product-area .nav-tabs {
  margin-bottom: 15px;
  padding-bottom: 0px;
  position: relative;
  border: 0;
  display: flex;
  justify-content: center;
}
.product_description_area .nav.nav-tabs {
  display: block;
  border: none;
  padding: 10px 0px;
}
.product_description_area .nav.nav-tabs li {
  display: inline-block;
  margin-right: 7px;
}
.product_description_area .nav.nav-tabs li:last-child {
  margin-right: 0px;
}

.product_description_area .nav.nav-tabs li a {
  padding: 0px;
  border: none;
  line-height: 38px;
  background: #fff;
  border: 1px solid #eeeeee;
  border-radius: 0px;
  padding: 0px 30px;
  color: #415094;
  font-size: 13px;
  font-weight: normal;
  border-radius: 50px;
}

@media (max-width: 991px) {
  /* line 843, ../../SAIFUL/Running_project/250 eCommerce_HTML/250 eCommerce_HTML/250 eCommerce_HTML/assets/scss/_product.scss */
  .product_description_area .nav.nav-tabs li a {
    padding: 0px 20px;
    margin-bottom: 10px;
  }
}

.product_description_area .nav.nav-tabs li a.active {
  background: #2577fd;
  color: #fff;
  border-color: #2577fd;
}


</style>
    
</head>

<body>
     
@include("/layouts.navbar")
  
    <div class="contednt-wrapper">
    @yield('content')
    </div>


    <!-- All script js -->

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- ALL JS FILES -->
    <script src="/bootstrap/js/all.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <!-- <script src="/bootstrap/js/custom.js"></script> -->
    <script>
    function openCity(evt, cityName) {
      // Declare all variables
      var i, tabcontent, tablinks;

      // Get all elements with class="tabcontent" and hide them
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }

      // Get all elements with class="tablinks" and remove the class "active"
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }

      // Show the current tab, and add an "active" class to the button that opened the tab
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";
    }
</script>
<script src="/plugins/jquery/jquery.min.js"></script>
<script src="{{ asset('/plugins/ijaboCropTool/ijaboCropTool.min.js') }}"></script>
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>


$.ajaxSetup({
     headers:{
       'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
     }
  });
  
</script>
@yield('extra-js')

@yield('script-tjs')
        
</body>

</html>
 