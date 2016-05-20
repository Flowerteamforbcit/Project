<?php
session_start();
include 'header.php';

if (isset($_SESSION['userEmail'])){
  echo ' <div class="alert alert-info" role="alert" style="text-align:right">';
  echo  '<span class="glyphicon glyphicon-user" aria-hidden="true"></span>'.' Whatsup ' . $_SESSION['userEmail'];
  echo ' !</div>';
}

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
<input type="text" name="q" placeholder="Search..." id="searchfield" />
<ul id="results" class="results"></ul>
</form>

<div id="parent">
<span class="glyphicon glyphicon-question-sign" id='helpmark' aria-hidden="true"></span>
<div id="popup" style="display: none"><p>It will provide the result of materials from different companies</P></div>
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

<?php
include 'footer.php';
?>

<script>
var e = document.getElementById('parent');
e.onmouseover = function() {
  document.getElementById('popup').style.display = 'block';
}
e.onmouseout = function() {
  document.getElementById('popup').style.display = 'none';
}
</script>
 

