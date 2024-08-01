<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!doctype html>
<html>
<head>
<title>Gallery Page</title>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--bootstrap-->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!--coustom css-->
<link href="css/style.css" rel="stylesheet" type="text/css"/>
<!--script-->
<script src="js/jquery-1.11.0.min.js"></script>
<!-- js -->
<script src="js/bootstrap.js"></script>
<!-- /js -->
<!--fonts-->
<link href='//fonts.googleapis.com/css?family=Open+Sans:300,300italic,400italic,400,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!--/fonts-->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="css/style.css">
	<!-- Custom CSS -->
	<style>
		body{
			background-color: lightblue;
		}
		.gallery {
			display: flex;
			flex-wrap:wrap;
			justify-content: center;
		}
		.gallery img {
			margin: 10px;
			width: 500px;
			height: 450px;
			object-fit:contain;
			cursor: pointer;
			transition: all 0.3s ease-in-out;
		}
		.gallery img:hover {
			transform: scale(1.5);
		}
		h1{
			color: Blue;
		}
		
	</style>
<!--script-->
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
				});
			});
</script>
<!--/script-->
</head>
	<body>
<!--header-->
<?php include_once('includes/header.php');?>
<!-- Top Navigation -->

<div class="container">
		<h1 class="text-center my-5">Gallery Of Library</h1>
		<div class="gallery">
			<img src="images/govt2.jpg" alt="Placeholder Image">
			<img src="images/govt3.jpg" alt="Placeholder Image">
			<img src="images/lib1 (1).jpg" alt="Placeholder Image">
			<img src="images/lib1 (2).jpg" alt="Placeholder Image">
			<img src="images/lib1 (3).jpg" alt="Placeholder Image">
			<img src="images/lib1 (4).jpg" alt="Placeholder Image">
			<img src="images/lib1 (5).jpg" alt="Placeholder Image">
			<img src="images/lib1 (6).jpg" alt="Placeholder Image">
			<img src="images/lib1 (7).jpg" alt="Placeholder Image">
			<img src="images/lib1 (8).jpg" alt="Placeholder Image">
			<!-- <img src="images/lib1 (9).jpg" alt="Placeholder Image"> -->
			<img src="images/lib1 (10).jpg" alt="Placeholder Image">
			<img src="images/lib1 (11).jpg" alt="Placeholder Image">
			<img src="images/lib1 (13).jpg" alt="Placeholder Image">
			<img src="images/library.jpg" alt="Placeholder Image">
			<img src="images/library1.jpg" alt="Placeholder Image">
			<img src="images/library2.jpg" alt="Placeholder Image">
			<!-- <img src="images/library3.jpg" alt="Placeholder Image"> -->
		</div>
	</div>
	<!-- Bootstrap JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- /About -->
<?php include_once('includes/footer.php');?>
<!--/copy-rights-->
	</body>
</html>
