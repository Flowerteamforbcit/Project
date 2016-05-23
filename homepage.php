<?php
session_start();
include 'header.php';
?>


<img src="img/home.jpg" id="full-screen-background-image"/>


<div class="jumbotron" id="homepage">

	
	
	<?php if (!array_key_exists('userEmail', $_SESSION)) echo '<h1>Signup today</h1><br><a href="signup.php" class="btn btn-info" role="button">Sign up</a>'; ?>
	<?php if (array_key_exists('userEmail', $_SESSION)) echo '<h1>Hi ' . $_SESSION['userEmail'].'!</h1>'; 

	?>
	<h2><a href="index.php" >Go to search</a></h2>
</div>

<div class="jumbotron" id="news">
	<h2>Lated news</h2>
	<p>The practice of writing paragraphs is essential to good writing. Paragraphs help to break up large chunks of text and makes the content easier for readers to digest. They guide the reader through your argument by focusing on one main idea or goal.</p>
</div>
<div class="jumbotron" id="nothing">
	<h2>sample image</h2>

	<img src="img/racks.jpg"/>

</div>



<?php
include 'footer.php';
?>