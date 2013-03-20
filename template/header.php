<?php
require "classes/conn.php";

print_r($_SESSION);
?>
<!doctype html>
<!--[if IE 7]>	<html class="no-js  lt-ie10 lt-ie9 lt-ie8 ie7" lang="en"> <![endif]-->
<!--[if IE 8]>	<html class="no-js lt-ie10 lt-ie9 ie8" lang="en"> <![endif]-->
<!--[if IE 9]>	<html class="no-js lt-ie10 ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="es"> <!--<![endif]-->
<head>
	<script></script>
	<meta charset="utf-8" />
	<title>Advertising</title>

	<!-- Mobile viewport optimization http://goo.gl/b9SaQ -->
	<meta name="HandheldFriendly" content="True">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta http-equiv="cleartype" content="on">

	<link rel="stylesheet" href="template/css/reset-min-0.13.1.css">
	<link rel="stylesheet" href="template/css/chico-min-0.13.1.css">
	<link rel="stylesheet" href="template/css/mesh-min-2.1.css">
	<style>
		/**
		 * Carousel demo
		 */
		.myCarousel .ch-carousel-item {
			width: 250px;
			height: 250px;
		}

		.myCarousel img {
			max-width: 100%;
			max-height: 100%;
		}

		/* Icons demo */
		.showroomIcons {
			overflow: hidden;
		}

		.showroomIcons li{
			float:left;
			width: 33%;
			line-height: 2em;
		}

		.autoComplete {
			width: 250px;
		}

		.autoComplete2 {
			width: 350px;
		}

		.autoComplete3 {
			width: 450px;
		}

		.ch-loading-small {
			display: block;
			margin:0 auto;
		}
	</style>
</head>

<body>
	<h1>Mercado Advertising</h1>
	<?php
	if($_SESSION['site_id']) {
		echo "<h6>".$msgBoasVindas."</h6>";
	}
	?>
	<div class="clear"></div>