<?php
session_start();
if(!$_SESSION["email"]){
header("location:index.html");
}

$redirect_uri = 'http://localhost/juspay/index.php';
?>
<!DOCTYPE html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Meetutu Web App</title>
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700" rel="stylesheet" type="text/css">
				  <link rel="shortcut icon" href="tree.png" type="image/x-icon">

        <link rel="stylesheet" href="css/font-awesome.min.css">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Fancybox -->
        <link rel="stylesheet" href="css/jquery.fancybox.css">
        <!-- owl carousel -->
        <link rel="stylesheet" href="css/owl.carousel.css">
        <!-- Animate -->
        <link rel="stylesheet" href="css/animate.css">
        <!-- Main Stylesheet -->
        <link rel="stylesheet" href="css/main.css">
        <style>
        .colorgraph {
  height: 5px;
  border-top: 0;
  background: #c4e17f;
  border-radius: 5px;
  background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
}
.btn-space {
    margin-top: 10px;
}

    .google-maps iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100% !important;
        height: 100% !important;
    }
        </style>
        
        
 <!---####################################################################################################################################### -->     
        
<script src="https://apis.google.com/js/platform.js" async defer></script>
<meta name="google-signin-client_id" content="517088903669-an7k4nucf5552lstdgshi5u92fsnkf2d.apps.googleusercontent.com">
 <!---####################################################################################################################################### -->  
<script>
	function mapload(){
 if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(initMap);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

      function initMap(position) {
		lat=position.coords.latitude;
		lon=position.coords.longitude;
		console.log(lat,lon);
	}
	
	
	 <!---####################################################################################################################################### -->  
	
	 function signOut() {
		 window.location = "https://mail.google.com/mail/u/0/?logout&hl=en";
		 window.location.href = 'logout.php';
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
     
      
    });
  }
	
	
function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
  console.log('Name: ' + profile.getName());
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
}

 <!---####################################################################################################################################### -->  
</script>
		
    </head>
	
    <body onload="mapload()">
		
        <!--
        Fixed Navigation
        ==================================== -->
        <header id="navigation" class="navbar-fixed-top">
            <div class="container">

                <div class="navbar-header">
                    <!-- responsive nav button -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- /responsive nav button -->

                    <!-- logo -->
                    <h1 class="navbar-brand">
                        <a href="#body">
                           <h1><b> MEETUTU</b></h1>
                        </a>
                    </h1>
                    <!-- /logo -->

                    </div>

                    <!-- main nav -->
                    <nav class="collapse navigation navbar-collapse navbar-right" role="navigation">
                        <ul id="nav" class="nav navbar-nav">
                            <li class="current"><a href="#home">Home</a></li>
                            <li><a href="bootstrapmodal2.php">Requests</a></li>
                            <li><a href="javascript:signOut();">Logout</a></li>
                           
                        </ul>
                    </nav>
                    <!-- /main nav -->
                </div>

            </div>
        </header>
        <!--
        End Fixed Navigation
        ==================================== -->


        <!--
        Home Slider
        ==================================== -->
        <section id="home">     
            <div id="home-carousel" class="carousel slide" data-interval="false">
                <ol class="carousel-indicators">
                    <li data-target="#home-carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#home-carousel" data-slide-to="1"></li>
             
                </ol>
                <!--/.carousel-indicators-->

                <div class="carousel-inner">

                    <div class="item active"  style="background-image: url('img/slider/teach.png')" >
                        <div class="carousel-caption">
                            <div class="animated bounceInRight">
                                <h2>Meetutu - Teacher</h2><br><h3>To the world you may be just a teacher but to your students you are a HERO</h3>
                                <p>Meetutu is for everyone who is passionate about learning things. It is for those who can teach and those who want to Learn.</p>
                            </div>
                        </div>
                    </div>              

                    <div class="item" style="background-image: url('img/slider/teach2.jpg')">                
                        <div class="carousel-caption">
                            <div class="animated bounceInDown">
                                <h2>Meetutu </h2><br><h3>The Art of Teaching is the Art of Assisting discovery.</h3>
                                <p>Learning has never been this easy. Meetutu is a revolutionary platform</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/.carousel-inner-->
                <nav id="nav-arrows" class="nav-arrows hidden-xs hidden-sm visible-md visible-lg">
                    <a class="sl-prev hidden-xs" href="#home-carousel" data-slide="prev">
                        <i class="fa fa-angle-left fa-3x"></i>
                    </a>
                    <a class="sl-next" href="#home-carousel" data-slide="next">
                        <i class="fa fa-angle-right fa-3x"></i>
                    </a>
                </nav>

            </div>
        </section>
        <!--
        End #home Slider
        ========================== -->

         <hr class="colorgraph">

 
 
       <section id="about">
            <div class="container">
                <div class="row">

                    <div class="section-title text-center wow fadeInUp">
                        <h1>Map Scanner</h1>    
                        <h5>Meetutu has smart mapscanner which scans for people who are in 1km radius to your location and can connect people.</h5>
                          <hr class="colorgraph">
                        	<a href="http://127.0.0.1:4545" class="btn btn-primary btn-lg">Start MapScanner</a>
                       
                    </div>
                    
                   
                </div>
            </div>
        </section>
         <hr class="colorgraph">
<section id="about">
	 <div class="container">
                <div class="row">

                    <div class="section-title text-center wow fadeInUp">
                        <h1>Request Meet</h1>    
                        <h5>Now you can send request to the other person and meet up with them if they too agree to meet up with you.</h5>


	<div class="col-xs-12 col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2">
		<form role="form" action="requestmeet.php" method="post" >
				<hr class="colorgraph">
				<div class="form-group">
                    <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address">
				</div>

                        	<button type="submit" name="request-submit" class="btn btn-primary btn-lg">Request Meet</button>
                        	<br><br><br><br><br><br><br><br><br>
                        </form>
                    </div>

                    </div>
                   
                </div>
            </div>

</section> 
        <hr class="colorgraph">

       <section id="about">
            <div class="container">
                <div class="row">

                    <div class="section-title text-center wow fadeInUp">
                        <h1>About Us</h1>    
                        <h5>We at meetutu aim to develop a platform for those who want to learn and those who want to teach.</h5>
                    </div>
                    
                   
                </div>
            </div>
        </section>

        <hr class="colorgraph">


        <footer id="footer" class="text-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-logo wow fadeInDown">
                            <h1>Project Meetutu</h1>
                        </div>
                    </div>
                </div>
            </div>
        </footer>



        
   
        <script src="js/vendor/jquery-1.11.1.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js"></script>
        <!-- jquery.nav -->
        <script src="js/jquery.nav.js"></script>
        <!-- Portfolio Filtering -->
        <script src="js/jquery.mixitup.min.js"></script>
        <!-- Fancybox -->
        <script src="js/jquery.fancybox.pack.js"></script>
        <!-- Parallax sections -->
        <script src="js/jquery.parallax-1.1.3.js"></script>
        <!-- jQuery Appear -->
        <script src="js/jquery.appear.js"></script>
        <!-- countTo -->
        <script src="js/jquery-countTo.js"></script>
        <!-- owl carousel -->
        <script src="js/owl.carousel.min.js"></script>
        <!-- WOW script -->
        <script src="js/wow.min.js"></script>
        <!-- theme custom scripts -->
        <script src="js/main.js"></script>
    </body>
</html>
