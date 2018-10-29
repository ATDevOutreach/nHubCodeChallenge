<!DOCTYPE html>
<html class="cspio">
<head>
	<meta charset="utf-8">
	<meta http-equiv=t started follow this checklist. "X-UA-Compatible" content="IE=edge,chrome=1">
	<title>AfriConnect</title>

	<meta name="generator" content="comingsoonpage.com 1.0.0" />
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<link href="assets/css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="/assets/css/landing.css">
	<!-- <link rel="shortcut icon" href="https://static.comingsoonpage.com/cspio-assets/1.0.0/favicon.ico"> -->
	<meta property="og:url" content="" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="AfriConnect" />
	<meta property="og:description" content="" />
	
	<!-- Font Awesome CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

	<!-- Bootstrap and default Style -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	<link rel="stylesheet" href="https://static.comingsoonpage.com/cspio-assets/1.0.0/style.css">

	<!-- Google Fonts -->
	<link class="gf-headline" href='https://fonts.googleapis.com/css?family=Pacifico:400&subset=' rel='stylesheet' type='text/css'>
			
	<!-- Animate CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css">
	
	
	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

	<!-- Modernizr -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
	
	<!-- Google Analytics Code Goes Here-->
</head>
<body>
	<div id="cspio-page">
		<div id="cspio-content">
			
			<img id="cspio-logo" src="/assets/img/logo.png">
			    				
			<h1 id="cspio-headline">AfriConnect</h1>			    				
			
			<div id="cspio-description">Page Under Construction Coming Soon!</div>			    				
			
			<form id="cspio-form" action="" method="post">
				<div id="cspio-field-wrapper">
					<div class="row">
						<div class="col-md-12 seperate"><div class="input-group"><input id="cspio-email" name="email" class="form-control input-lg form-el" type="email" placeholder="Email" required/>
					<span class="input-group-btn"><button id="cspio-subscribe-btn" type="submit" class="btn btn-lg btn-primary form-el noglow">Notify Me</button></span></div></div>
					</div>
				</div>
			</form>
			
			<span id="cspio-privacy-policy-txt">Get ready! Something really cool is coming!</span>
			    						    			    								    			    			    				
			<div id="cspio-socialprofiles">
				<a href="" target="_blank"><i class="fa fa-facebook-official fa-2x"></i></a>			
				<a href="" target="_blank"><i class="fa fa-twitter fa-2x"></i></a>
				<a href="" target="_blank"><i class="fa fa-instagram fa-2x"></i></a>
				<a href="" target="_blank"><i class="fa fa-google-plus fa-2x"></i></a>			
				<a href="mailto:" target="_blank"><i class="fa fa-envelope fa-2x"></i></a>			
			</div>
		</div><!-- end of #cspio-content -->
	</div>


	<script>
		// Animate Delay
		setTimeout(function(){ jQuery("#cspio-content").show().addClass('animated fadeIn'); }, 250);
		// Reseize	
		function resize(){
			$('head').append("<style id='form-style' type='text/css'></style>");
			$('#form-style').html('.cspio .input-group-btn, .cspio .input-group{display:block;width:100%;}.cspio #cspio-subscribe-btn{margin-left:0;width:100%;display:block;}.cspio .input-group .form-control:first-child, .cspio .input-group-addon:first-child, .cspio .input-group-btn:first-child>.btn, .cspio .input-group-btn:first-child>.dropdown-toggle, .cspio .input-group-btn:last-child>.btn:not(:last-child):not(.dropdown-toggle) {border-bottom-right-radius: 4px;border-top-right-radius: 4px;}.cspio .input-group .form-control:last-child, .cspio .input-group-addon:last-child, .cspio .input-group-btn:last-child>.btn, .cspio .input-group-btn:last-child>.dropdown-toggle, .cspio .input-group-btn:first-child>.btn:not(:first-child) {border-bottom-left-radius: 4px;border-top-left-radius: 4px;}');
		}
		
		$('#cspio-content').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', 
			function(){
				var width = $('#cspio-field-wrapper').width();
				if(width < 480 && width != 0){
					resize();
				}
			}
		);
	</script>

	</body>
</html>
