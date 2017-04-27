<!DOCTYPE html>
<?php
	include('../config.php');
	
	$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
	$result = mysqli_query($mysqli, "SELECT * FROM texts WHERE area = 'about'");
	$about_page_text = "";
	while ($row = mysqli_fetch_array($result)) {
		$about_page_text = $row['text'];
		$about_page_text = nl2br($about_page_text);
	}
?>
<html>
<head>
	<title>Aideen Cross Designs</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Alex+Brush" />
	<script src="js/image_slider.js" type="text/javascript"></script>
	
	<!-- Blueimp image gallery CSS -->
	<link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
	
	<!-- Image gallery CSS -->
	<link rel="stylesheet" href="css/bootstrap-image-gallery.min.css">
	
	<!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i|Pinyon+Script|Open+Sans|Alex+Brush" rel="stylesheet">
	
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div class="wrapperBody">
	
		<header>
			<nav class="navbar navbar-default navbar-static-top tackNav">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar6">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">Aideen Cross Designs <span class="sub-brand">Award Winning Bridal Designer</span></a>
						
					</div>
					<div id="navbar6" class="navbar-collapse collapse">
						<ul class="nav navbar-nav navbar-right">
							<li><a href="index.php">Home</a></li>
							<li class="active"><a href="#">About</a></li>
							<li><a href="contact.php">Contact</a></li>
							<li><a href="gallery.php">Gallery</a></li>

						</ul>
					</div>
				</div>
			</nav>
			<!--end new nav bar-->
		</header>

		<div class="core">
			<p>
				<?php echo $about_page_text ?>
				
				<br>
				<br>
				<br>
					Tel: <a href="tel:086-8325694">086-8325694</a>
				<br>
					email: <a href="mailto:aideen.cross@gmail.com">aideen.cross@gmail.com</a>
				<br>
			</p>
		</div>
		
	</div>
</body>
<html>
