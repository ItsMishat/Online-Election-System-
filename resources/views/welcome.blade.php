<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="content-type" content="text/html; charset=UTF-8">

    <title>SWE Club-OES</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <!-- Bootstrap Css -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Style -->
    <link href="plugins/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="plugins/owl-carousel/owl.theme.css" rel="stylesheet">
    <link href="plugins/owl-carousel/owl.transitions.css" rel="stylesheet">
    <link href="plugins/Lightbox/dist/css/lightbox.css" rel="stylesheet">
    <script src="../js/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../js/sweetalert/dist/sweetalert.css">
    <link href="plugins/animate.css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <!-- Icons Font -->
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/custom.js"></script>

    <!-- JS PLUGINS -->
    <script src="plugins/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="plugins/waypoints/jquery.waypoints.min.js"></script>
    <script src="plugins/countTo/jquery.countTo.js"></script>
    <script src="plugins/inview/jquery.inview.min.js"></script>
    <script src="plugins/Lightbox/dist/js/lightbox.min.js"></script>
    <script src="plugins/WOW/dist/wow.min.js"></script>
    <script type="text/javascript"></script>
    
</head>

<body>
    <!-- Preloader
	============================================= -->
    <div class="preloader"><i class="fa fa-circle-o-notch fa-spin fa-2x"></i></div>
    <!-- Header
	============================================= -->
    @include('layouts.header')

    <!-- risecon
	============================================= -->
    @include('layouts.question')

    <!-- Services
	============================================= -->
    @include('layouts.services')

    <!-- Portfolio
	============================================= -->
    @include('layouts.awards')
    <!-- Work Process
	============================================= -->
    
    <!-- Some Fune Facts
	============================================= -->
    @include('layouts.results')
    <!-- Some Fun Facts
	============================================= -->
    @include('layouts.head')
    <!-- Testimonials
	============================================= -->
    @include('layouts.testimonials')
    <!-- Contact Us
	============================================= -->
    @include('layouts.contact')

    <!-- Google Map
	============================================= -->
    @include('layouts.map')


    <!-- Footer
	============================================= -->
    @include('layouts.footer')
    <a href="#" class="scrollToTop">Scroll To Top</a>
<script type="text/javascript">
window.onload = function()
{ 
    swal({
      title: "Greetings",
      text: "Welcome to Software Engineering Club - Online Election System",
      type: "success",
      timer: 1000,
      confirmButtonText: "Ok",
      confirmButtonClass: "success",
    });
}

$(document).ready(function(){
  
  //Check to see if the window is top if not then display button
  $(window).scroll(function(){
    if ($(this).scrollTop() > 100) {
      $('.scrollToTop').fadeIn();
    } else {
      $('.scrollToTop').fadeOut();
    }
  });
  
  //Click event to scroll to top
  $('.scrollToTop').click(function(){
    $('html, body').animate({scrollTop : 0},800);
    return false;
  });
  
});
</script>
    
</body>
</html>