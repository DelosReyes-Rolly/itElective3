<!DOCTYPE html>
<html lang="en">
    <head>
	
		<!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"> -->
        <!-- meta data -->
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <!--font-family-->
		<link rel="stylesheet" type="text/css"  href="{{ asset('assets/css/google-font-poppins.css') }}">
		<!-- <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&amp;subset=devanagari,latin-ext" rel="stylesheet"> -->
        
        <!-- title of site -->
        <title>OCSR</title>

        <!-- For favicon png -->
		<link rel="shortcut icon" type="image/icon" href='{{ URL::asset("img/shs.png")}}'/>

		<!--animate.css-->
        <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
		
        <!--bootstrap.min.css-->
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
		
		<!-- bootsnav -->
		<link rel="stylesheet" href="{{ asset('assets/css/bootsnav.css') }}" >	
        
        <!--style.css-->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        
        <!--responsive.css-->
        <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/fontawesome-5.6.3.css') }}"/>
		<!-- transition -->
		<script>
			function reveal() {
			var reveals = document.querySelectorAll(".reveal");

			for (var i = 0; i < reveals.length; i++) {
				var windowHeight = window.innerHeight;
				var elementTop = reveals[i].getBoundingClientRect().top;
				var elementVisible = 150;

				if (elementTop < windowHeight - elementVisible) {
				reveals[i].classList.add("active");
				} else {
				reveals[i].classList.remove("active");
				}
			}
			}

			window.addEventListener("scroll", reveal);
		</script>
    </head>
    <body>
        <!-- top-area Start -->
		<header class="top-area">
			<div class="header-area">
				<!-- Start Navigation -->
			    <nav class="navbar navbar-default bootsnav navbar-fixed dark no-background" style="box-shadow: 0 4px 16px rgba(0,0,0,0.4);">

			        <div class="container">

			            <!-- Start Header Navigation -->
			            <div class="navbar-header">
			                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
			                    <i class="fa fa-bars"></i>
			                </button>
			                <a class="navbar-brand" href='{{ url("/") }}'><div class="svnhshead">ONLINE COURSE SUBJECT REGISTRATION</div>OCSR</a>
			            </div><!--/.navbar-header-->
			            <!-- End Header Navigation -->

			            <!-- Collect the nav links, forms, and other content for toggling -->
			            <div class="collapse navbar-collapse menu-ui-design left-to-right" id="navbar-menu">
			                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
			                	<li class=" smooth-menu active"></li>
			                    <li class="smooth-menu"><a class="a-header" href='{{ url("/") }}'>Home</a></li>
								<li class="smooth-menu"><a class="a-header" href='{{ url("/login") }}'>Login</a></li>
                                <li class="smooth-menu"><a class="a-header" href='{{ url("/register") }}'>Register</a></li>
                            </ul><!--/.nav -->
			            </div><!-- /.navbar-collapse -->
			        </div><!--/.container-->
			    </nav><!--/nav-->
			    <!-- End Navigation -->
			</div><!--/.header-area-->

		    <div class="clearfix"></div>

		</header><!-- /.top-area-->
		<!-- top-area End -->
        

        <!-- end of enrollment report -->



		<!-- Include all js compiled plugins (below), or include individual files as needed -->


		<script src="{{ asset('assets/js/jquery.js') }}"></script>
		
		<!--bootstrap.min.js-->
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('assets/js/jquery-easing.js') }}"></script>
		<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script> -->
	     
        <!--Custom JS-->
        <script src="{{ asset('jquery.js') }}"></script>
    </body>
</html>