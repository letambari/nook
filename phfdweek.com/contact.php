<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->


<!-- Mirrored from backstage.dymix.us/contacts.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 24 Oct 2021 20:02:10 GMT -->
<head>

	<meta charset="utf-8" />

	<title>The Port Harcourt Fashion and Design Week</title>
	<meta content="" name="description" />

	<link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon" />
	<link rel="apple-touch-icon" href="img/favicon/apple-touch-icon.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="img/favicon/apple-touch-icon-72x72.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="img/favicon/apple-touch-icon-114x114.png" />

	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

	<!-- Google font -->
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,600,700,900' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" href="libs/animate/animate.css" />
	<!-- Materialdesignicons CSS (icon) -->
	<link rel="stylesheet" href="libs/icons/materialdesignicons.css" type="text/css" />
	<link rel="stylesheet" href="libs/icons/flaticon.css">


	<link rel="stylesheet" href="css/main.css" />
	<link rel="stylesheet" href="css/media.css" />

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjprc-1BZ4ft8yC81jNUAdtCkSByqP-DY"></script>

    <script>
    var map;
	var egglabs = new google.maps.LatLng(30.252008, -97.714325);
	var mapCoordinates = new google.maps.LatLng(30.252008, -97.714325);

	var markers = [];
	var image = new google.maps.MarkerImage(
	    'img/pin.png',
	    new google.maps.Size(60,80),
	    new google.maps.Point(0,0),
	    new google.maps.Point(42,56)
	);

	function addMarker() {
	      markers.push(new google.maps.Marker({
	      position: egglabs,
	      raiseOnDrag: false,
		  icon: image,
	      map: map,
	      draggable: false
	      }));
	}

	function initialize() {
	  var mapOptions = {
		backgroundColor: "#ffffff",
	    zoom: 14,
		disableDefaultUI: true,
	    center: mapCoordinates,
	    mapTypeId: google.maps.MapTypeId.ROADMAP,
		styles: [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#BFBFBF"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#BFBFBF"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#BFBFBF"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]

	  };
	map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
	addMarker();

	}
	google.maps.event.addDomListener(window, 'load', initialize);
    </script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body>

<!-- Header Section Start -->
<header class="header" id="header">
		<div class="header-sticky__wrapp">
			<div class="container">
				<div class="row">
					<div class="logo col-md-3 col-sm-4 col-xs-12">
						<a class="navbar-brand" href="index.html">
							<span class="logo__text"><img src='https://phfashionweek.com/assets/images/logowhite.svg'></span>
						</a>
					</div>
					<div class="main__menu-wrap col-md-8 col-sm-7 col-xs-6">
						<span class="responsive-menu__button" id="responsive-menu"><i class="mdi mdi-menu"></i></span>
						<?php include 'nav.php'; ?>
					</div>
					
				</div>
			</div>
		</div>
	</header><!-- Header Section End -->

	<!-- Slider Section Start -->
	<section class="page__img" style="background-image: url('branding/DSC_0052(2).jpg')">
		<div class="container">
			<div class="row">
				<div class="title__wrapp">
                    
				</div>
			</div>
		</div>
	</section><!-- Slider Section End -->

	<!-- Services Section Start -->
	<section class="section contacts">
		<div class="container">
			<div class="row">

				<div class="col-md-5">
				<h2>Get in touch</h2>
					<form class="vertical-form" method="POST">
						<div class="form-group">
	    					<label for="c-name">FullName <span class="req">*</span></label>
	    					<input type="text" class="form-control" id="fullname" name="fullname">
		    			</div>
		    			<div class="form-group">
	    					<label for="c-phone">Phone <span class="req">*</span></label>
	    					<input type="text" name="phone" class="form-control" id="phone">
		    			</div>
		    			<div class="form-group">
	    					<label for="c-email">Email <span class="req">*</span></label>
	    					<input type="email" class="form-control" id="email" name="email">
						</div>
						<div class="form-group">
		    				<label for="c-text">Address <span class="req">*</span></label>
							<textarea name="address" id="address" class="form-control"></textarea>
						</div>
						<input type="submit" class="btn btn__red animation" name="update_cart" value="Send message" />
					</form>

                    <div id="result"></div>
				</div>
				<div class="col-md-6 col-md-offset-1">
					<!--<div id="map-canvas"></div>-->
					
					<div class="contact-info">
						<p class="contact-info__item"><i class="mdi mdi-cellphone-android"></i>Phone: 0803 875 3903</p>
						<p><i class="mdi mdi-email"></i>info@phfdweek.com</p>
					</div>
				</div>

			</div>
		</div>
	</section><!-- Services Section End -->
    <script>
$(document).ready(function(){
    $("form").submit(function(event){
        // Stop form from submitting normally
        event.preventDefault();
        
        /* Serialize the submitted form control values to be sent to the web server with the request */
        var formValues = $(this).serialize();
        
        // Send the form data using post
        $.post("sendscript.php", formValues, function(data){
            // Display the returned data in browser
            $("#result").html(data);
        });
    });
});
</script>
	<!-- Other offices -->
	<?php include 'footer.php'; ?>
