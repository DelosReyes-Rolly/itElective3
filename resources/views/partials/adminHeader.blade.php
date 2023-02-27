<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
    <!-- Our Custom CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style4.css') }}">
    
    <!-- Font Awesome JS -->
    <script src="{{ asset('assets/js/fontawesome-solid-5.0.13.js') }}"></script>
    <!-- <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script> -->
    <script src="{{ asset('assets/js/fontawesome-5.0.13.js') }}"></script>
    <!-- <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script> -->
	<!-- additional? -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
    <script src="{{ asset('assets/js/sweetalert-new.js') }}"></script>
    
        <!-- title of site -->
        <title>Online Course Subject Registration</title>
        <link rel="shortcut icon" type="image/icon" href='{{ URL::asset("img/ocsr.png")}}'/>

        <!--style.css-->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<style>
    a{
        text-decoration:none;
    }
</style>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar" class="sticky-top h-100 vh-100" style="box-shadow: 0 4px 16px rgba(0,0,0,0.4);">
            <div class="sidebar-header sticky-top">
                <div class="title" style="text-shadow: 0 4px 16px rgba(0,0,0,1);"><img src="{{url('/img/ocsr.png')}}" style="width: 80px; height: 80px;"><div style="font-size: 20px;"> Online Course Subject Registration </div> <br/> OCSR</div>
                <strong> <img src="{{url('/img/ocsr.png')}}" style="width: auto; height: auto;"></strong>
            </div>

            <ul class="list-unstyled components">
                <li title="Dashboard">
                    <a href='{{ url("/") }}'>
                        <i class="fas fa-chalkboard"></i>
                        <span class="hide-word title-word"> <b>Dashboard</b> </span>
                    </a>
                </li>
                <li>
                    <a href="#academicSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" title="School Management Access">
                    <i class="fas fa-school"></i>
                        <span class="hide-word title-word">
                            <b>
                                <div class="Ashort">Schedule</div>
                                <div class="Along">Scheduling</div>
                            </b>
                        </span>
                    </a>
                    <ul class="collapse list-unstyled" id="academicSubmenu">
                        <li title="School year">
                            <a href='{{ url("/gradingschoolyear") }}'><i class="fas fa-calendar-alt"></i> <span class="hide-word"> <b>Week</b></span></a>
                        </li>
                        <li title="Grade Levels">
                            <a href='{{ url("/gradinggradelevels") }}'><i class="fas fa-signal"></i> <span class="hide-word"> <b>Others</b></span></a>
                        </li>
                    </ul>
                </li>
            </ul>


            <ul class="list-unstyled components">
                <div style="padding-left:8px;">Admin Priveleges</div>
                <li>
                    <a href='{{ url("/gradingfaculty") }}' title="Faculties">
                        <i class="fas fa-user-tie"></i>
                        <span class="hide-word title-word"> <b>Faculties</b> </span>
                    </a>
                    <a href='{{ route('create_faculty') }}' title="Faculties">
                        <i class="fas fa-user-tie"></i>
                        <span class="hide-word title-word"> <b>Faculty Accounts</b> </span>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content" style="padding: 0px;">

            <nav class="navbar navbar-expand-lg navbar-light sticky-top">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                    </button>
                    <div style="padding-left:10px; color: #fff; font-weight:bold; font-style: Verdana;">Welcome {{Auth::user()->name}}!</div>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item" title="Profile">
                                <a class="header-letter" href='{{ url("admin/profile") }}'>Profile</a>
                            </li>&emsp;
                            <li class="nav-item" title="Change Password">
                                <a class="header-letter" href="{{ url('password-admin',['id'=>Auth::user()->id]) }}">Change Password</a>
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


    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="{{ asset('assets/js/jquery-slim.js') }}"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <!-- Popper.JS -->
    <script src="{{ asset('assets/js/popper.js') }}"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script> -->

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>