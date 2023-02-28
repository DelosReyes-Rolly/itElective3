<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" type="text/css"  href="{{ asset('assets/css/bootstrap-4.1.0-min.css') }}">
  
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style4.css') }}">

	<!-- sweetalert js -->
    <script src="{{ asset('assets/js/sweetalert-new.js') }}"></script>

    <!-- Font Awesome JS -->
    <script src="{{ asset('assets/js/fontawesome-solid-5.0.13.js') }}"></script>
    <script src="{{ asset('assets/js/fontawesome-5.0.13.js') }}"></script>


    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="{{ asset('assets/js/jquery-slim.js') }}"></script>

    <!-- Popper.JS -->
    <script src="{{ asset('assets/js/popper.js') }}"></script>

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/js/bootstrap-4.1.0-min.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>

    <!-- title of site -->
    <title>OCSR</title>
    <link rel="shortcut icon" type="image/icon" href='{{ URL::asset("img/ocsr.png")}}'/>

</head>

<body>

    <div class="wrapper">


        <!-- Page Content  -->
        <div id="content" style="padding: 0px;">

            <nav class="navbar navbar-expand-lg navbar-light sticky-top">
                <div class="container-fluid">
                    <div style="padding-left:10px; color: #fff; font-weight:bold; font-style: Verdana;">Welcome, Teacher {{Auth::user()->name}}!</div>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item" title="Home">
                                <a class="header-letter" href="{{ route('home')}}">Home</a>
                            </li>&emsp;
                            <li class="nav-item" title="Profile">
                                <a class="header-letter" href='{{ url("faculty/profile") }}'>Profile</a>
                            </li>&emsp;
                            <li class="nav-item" title="Change Password">
                                <a class="header-letter" href="{{ route('faculty.change_password',['id'=>Auth::user()->id]) }}">Change Password</a>
                            </li>&emsp;
                            <li class="nav-item" title="Logout">
                                <a class="header-letter" href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div style="padding: 20px;">
                <!-- Go back from top -->
                <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-arrow-up"></i></button>
                <script>
                    let mybutton = document.getElementById("myBtn");
                    window.onscroll = function() {scrollFunction()};

                    function scrollFunction() {
                    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                        mybutton.style.display = "block";
                    } else {
                        mybutton.style.display = "none";
                    }
                    }
                    function topFunction() {
                    document.body.scrollTop = 0;
                    document.documentElement.scrollTop = 0;
                    }
                </script>

    

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>