<?php
session_start(); //session start

require_once ('libraries/Google/autoload.php');


$client_id = '517088903669-an7k4nucf5552lstdgshi5u92fsnkf2d.apps.googleusercontent.com'; 
$client_secret = 'j4JtwiDdu2br4yW4EN71Wp1v';
$redirect_uri = 'http://localhost/meetutu/index.php';

//database
$db_username = "root"; //Database Username
$db_password = ""; //Database Password
$host_name = "localhost"; //Mysql Hostname
$db_name = 'meetutu'; //Database Name

if (isset($_GET['logout'])) {
  unset($_SESSION['access_token']);
}

$client = new Google_Client();
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->addScope("email");
$client->addScope("profile");

$service = new Google_Service_Oauth2($client);

  
if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken();
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
  exit;
}

if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  $client->setAccessToken($_SESSION['access_token']);
} else {
  $authUrl = $client->createAuthUrl();
}



if (isset($authUrl)){ 
	//show login url

} else {
	
	$user = $service->userinfo->get(); //get user info 
	
	// connect to database
	$mysqli = new mysqli($host_name, $db_username, $db_password, $db_name);
    if ($mysqli->connect_error) {
        die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    }
	

	
	$result = $mysqli->query("SELECT COUNT(google_id) as usercount FROM google_users WHERE google_id=$user->id");
	$user_count = $result->fetch_object()->usercount; //will return 0 if user doesn't exist
	

	if($user_count) 
    {
		$_SESSION['email']=$user->email;
		header("location:teacher_index.php");
		
    }
	else 
	{ 
		$statement = $mysqli->prepare("INSERT INTO google_users (google_id, google_name, google_email, google_link, google_picture_link) VALUES (?,?,?,?,?)");
		$statement->bind_param('issss', $user->id,  $user->name, $user->email, $user->link, $user->picture);
		$statement->execute();
		echo $mysqli->error;
		$_SESSION['email']=$user->email;
		header("location:teacher_index.php");
    }
	
	
}
?>

<!DOCTYPE html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Meetutu Web App</title>
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700" rel="stylesheet" type="text/css">
		<link rel="shortcut icon" href="tree.png" />
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

		<script src="https://apis.google.com/js/platform.js" async defer></script>
		<meta name="google-signin-client_id" content="517088903669-an7k4nucf5552lstdgshi5u92fsnkf2d.apps.googleusercontent.com">
     <!---####################################################################################################################################### -->  

 <!---####################################################################################################################################### -->  
    
    </head>
	
    <body>

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
                            <li><a href="#login">LogIn</a></li>
                            <li><a href="register.php">Teacher SignUp</a></li>
                             <li><a href="learner_register.php">Learner SignUp</a></li>
                           
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

                    <div class="item active"  style="background-image: url('img/slider/i2.jpg')" >
                        <div class="carousel-caption">
                            <div class="animated bounceInRight">
                                <h2>Meetutu <br>Meet someone Teach Someone...Learn Something</h2>
                                <p>Meetutu is for everyone who is passionate about learning things. It is for those who can teach and those who want to Learn.</p>
                            </div>
                        </div>
                    </div>              

                    <div class="item" style="background-image: url('img/slider/i1.jpg')">                
                        <div class="carousel-caption">
                            <div class="animated bounceInDown">
                                <h2>Meetutu <br>A platform for learning</h2>
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
        <section id="login" class="container">
       <div class="row" style="margin-top:20px">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form role="form" action="loginform.php" method="post" >
			<fieldset>
				<h2>Sign In</h2>
				<hr class="colorgraph">
				<div class="form-group">
                    <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address">
				</div>
				<div class="form-group">
                    <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password">
				</div>
				<span class="button-checkbox">
					<button type="button" class="btn" data-color="info">Remember Me</button>
                    <input type="checkbox" name="remember_me" id="remember_me" checked="checked" class="hidden">
					<a href="" class="btn btn-link pull-right">Forgot Password?</a>
				</span>
				<hr class="colorgraph">
				
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
                        <input type="submit" name="login-submit" class="btn btn-lg btn-success btn-block" value="Sign In">
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<a href="learner_register.php" class="btn btn-lg btn-primary btn-block">Learner Register</a>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<a href="register.php" class="btn btn-lg btn-info btn-block btn-space">Teacher Register</a>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12">
					<?php echo '<a href="' . $authUrl . '" class="btn btn-lg btn-danger btn-block btn-space">Sign in with Google</a>'; ?>
					
					</div>
					
					
					</div>		
				</div>
			</fieldset>
		</form>
	</div>
</div>

</section>
 <hr class="colorgraph">
<section class="container">
<center>	
 <h2 >Meetutu has maps to show the nearest teacher to teach you.<br></h2>
	</center>
     <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div >
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4518472.219666438!2d78.73883521320522!3d21.565821833083934!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30635ff06b92b791%3A0xd78c4fa1854213a6!2sIndia!5e0!3m2!1sen!2sin!4v1500923704780" width="1200" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
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
                        <p>We at meetutu aim to develop a platform for those who want to learn and those who want to teach.</p>
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
