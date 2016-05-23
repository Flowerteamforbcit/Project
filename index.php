<?php
session_start();
include 'header.php';

if (isset($_SESSION['userEmail'])){
	echo ' <div class="alert alert-info" role="alert" style="text-align:right">';
	echo  '<span class="glyphicon glyphicon-user" aria-hidden="true"></span>'.' Whatsup ' . $_SESSION['userEmail'];
	echo ' !</div>';
}
// var_dump($_SESSION)
?>

<div id="banner">
	<img src="img/logo.jpg"/>

</div>

<!-- search field -->
<div >
	<script src="js/data.js"></script>
	<script src="js/FuzzySearchWrup.js"></script>     
	<link rel="stylesheet" href="css/search.css" />
	<section class="main">
		<form class="search" method="post" action="index.php" >
			<input type="text" name="q" placeholder="Search..." id="searchfield" autocomplete="off" />
			<ul id="results" class="results"></ul>
		</form>

		
		<span class="glyphicon glyphicon-question-sign" id='helpmark' aria-hidden="true"></span>
		<div id="popup" style="display: none"><p>It will provide the result of materials from different companies</P></div>
		
		<div class="dropdown" id="dropdownSort">
			<button class="btn dropdown-toggle" type="button" data-toggle="dropdown">
				<span class="glyphicon glyphicon-sort" aria-hidden="true"></span> 

			</button>
			<ul class="dropdown-menu" id="dropdownmenu">
				<li><a href="#" id="Address">Address</a></li>
				<li><a href="#" id="Price">Price</a></li>
				<li><a href="#" id="Delivery">Provide delivery</a></li>
			</ul>
		</div>	
	</section>
	
</div>  






<div id="imageGallery">

	<div class="row">
		<div id="productslistforhome">
			<!-- THIS SECTION WILL BE REPLACED BY SERVER GENERATED ROWS -->

			<!-- THIS SECTION WILL BE REPLACED BY SERVER GENERATED ROWS -->
		</div>
	</div>

</div>
<script type='text/javascript' src='js/jquery.min.js'></script>
<script type='text/javascript' src='js/jquery.rateyo.min.js'></script>




<script type="text/javascript" src="js/animation.js"></script>
<script type="text/javascript" src="js/sorting.js"></script>


<script type="text/javascript" src="js/bootstrap.min.js"></script>


<script src="js/bootstrap-tour.min.js"></script>
<script src="js/searchPageTour.js"></script>