<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Agency - Start Bootstrap Theme</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <link href="/css1/styles.css" rel="stylesheet" /> 
    <link rel="stylesheet" href="/dist/style.css"> 
    
 
    <link rel="stylesheet" href="/bootstrap/css/style.css">
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css"> -->
    <!-- Site CSS -->
    <link rel="stylesheet" href="/bootstrap/css/style.css">
  

    <style>


/* Style the tab */
.tab {
 
  background-color: #f1f1f1;
 
}

/* Style the buttons that are used to open the tab content */
.tab button {
  background-color: #ddd;
  float: left;
  width:320px;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 12px 16px;
  
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #000000;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}

div.scrollmenu {
  background-color: #333;
  overflow: auto;
  white-space: nowrap;
}

div.scrollmenu a {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px;
  text-decoration: none;
}

div.scrollmenu a:hover {
  background-color: #777;
}
.vertical-menu {
  /* width: 300px; Set a width if you like */
}

.vertical-menu a {
  background-color: #eee; /* Grey background color */
  color: black; /* Black text color */
  display: block; /* Make the links appear below each other */
  padding: 12px; /* Add some padding */
  text-decoration: none; /* Remove underline from links */
}

.vertical-menu a:hover {
  background-color: #ccc; /* Dark grey background on mouse-over */
}

.vertical-menu a.active {
  background-color: yellow; /* Add a green color to the "active/current" link */
  color: white;
}
        .tt{
            border: 1px solid #c3c3c3;
            display:flex;
            flex-wrap:wrap;
            align-content:right;
        }
        .dropdownmenu ul,
        .dropdownmenu li {
            margin: 0;
            padding: 0;
        }

        .dropdownmenu ul {

            list-style: none;

        }

        .dropdownmenu li {
            float: left;
            position: relative;
            width: auto;
        }

        .dropdownmenu a {
            color: #FFFFFF;
            display: block;
            font: bold 12px/20px sans-serif;
            padding: 10px 25px;
            text-align: center;
            text-decoration: none;
            -webkit-transition: all .25s ease;
            -moz-transition: all .25s ease;
            -ms-transition: all .25s ease;
            -o-transition: all .25s ease;
            transition: all .25s ease;
        }

        .dropdownmenu li:hover a {}

        #submenu {
            left: 0;
            opacity: 0;
            position: absolute;
            top: 35px;
            visibility: hidden;
            z-index: 1;
        }

        li:hover ul#submenu {
            opacity: 1;
            top: 50px;
            /* adjust this as per top nav padding top & bottom comes */
            visibility: visible;

        }

        #submenu li {
            float: none;
            width: 100%;
        }

        #submenu a:hover {
            color: #000000;
            padding: 14px 15px !important;
            text-decoration: none;
            transition: all 0.2s ease-in-out;
        }

        #submenu a {
            background-color: #efefef;
            ;
            color: #071c1f !important;
        }

        #q-input {
            float: left;
            border: 0;
            width: 160px;
            height: 16px;
            padding: 0 0 0 10px;
        }

        #search {
            float: left;
            border: 0;

            padding: 0 0 0 10px;
        }

        h1 {
            margin-left: 50px;
        }

        .img-fluid {
            max-width: 100%;
            height: auto;
        }

        #inpu {
            width: 402px;
            height: 40px;
            padding: 19.2px 8px;
        }

        .user_card {
            height: 243px;
            width: 550px;

            margin-bottom: auto;

            position: relative;
            display: flex;
            justify-content: center;
            flex-direction: column;
            font-family: 10px Raleway, Arial, sans-serif;
            float: right;

        }

        .search-sec {
            padding: 2rem;
        }

        .search-slt {
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
        .wrn-btn {
            width: 100%;
            font-size: 16px;
            font-weight: 400;
            text-transform: capitalize;
            height: calc(3rem + 2px) !important;
            border-radius: 0;
        }
        .photo-content .cover-photo {
    /* background: url(/assets/img/cover.jpg); */
    /* background-size: cover;
    background-position: center;
    min-height: 250px;
    width: 100%; */
}


.authincation-content {
  background: #fff;
  box-shadow: 0 0 35px 0 rgba(154, 161, 171, 0.15);
  border-radius: 5px; }
  [data-theme-version="dark"] .authincation-content {
    background: #1e2746;
    box-shadow: none; }

    </style>

    
</head>

<body>
     
@include("layouts.navbar")
  
  <div class="contednt-wrapper">
  @yield('content')
  </div>








    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <Script>
        var menu = document.getElementsByClassName('dropdownmenu');
        menu;
    </script>
   

    
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{ asset('plugins/morris/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/knob/jquery.knob.js') }}"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
<script src="extensions/editable/bootstrap-table-editable.js"></script>
   <!-- ALL JS FILES -->
   <script src="js/all.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/custom.js"></script>

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
  <!-- ALL JS FILES -->
  <script src="/bootstrap/js/all.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="/bootstrap/js/custom.js"></script>

    
</body>

</html>