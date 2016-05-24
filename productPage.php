<?php
session_start();
require 'src/db.php';
include 'header.php';


?>
<?php 


$product_id = $_GET['id'];

$records = $dbh->prepare('SELECT * FROM product WHERE id='.$product_id);
$records->execute();
$results = $records->fetchAll(PDO::FETCH_ASSOC);


$product_info = $results[0];
?>

<div class="container">
	<div class="jumbotron">
		<div class="well well-sm">
			<img  class="img-responsive img-rounded" alt='sample' src='img/<?php echo $product_info['image']?>.jpg' >

			<div id="productInfo">
				<h4><b><?php echo $product_info['name']?></b></h4>
				<h5><b><?php echo $product_info['storeName']?></b></h5>
				<h5>Price: $<?php echo $product_info['price']?></h5>
				<h5>Address: <?php echo $product_info['storeAddress']?></h5>
			</div>
			<div id="map">
				<?php echo $product_info['googleMap']?>
			</div>
		</div>
		<br>
		<div id="commentButtonContainer" style="text-align:right">
			<button class="btn" id="commentbtn"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span></button>
		</div>
	</div>


	<hr></hr>

	<div class="container" id="comments" style="display: none">

		<h3 class="comments" id="<?php echo $product_id ?>" >Comments</h3>
		<!-- this place is for loading all comments from database -->
		<div id="commentlist">
			<!-- THIS SECTION WILL BE REPLACED BY SERVER GENERATED ROWS -->
			<h4><strong>TEST@TEST</strong></h4>
			<p>example pragraph, blah blah blah</p>
			<h4><strong>TEST@TEST</strong></h4>
			<p>example pragraph, blah blah blah example pragraph, blah blah blahexample pragraph, blah blah blahexample pragraph, blah blah blah</p>
			<h4><strong>TEST@TEST</strong></h4>
			<p>example pragraph, blah blah blah example pragraph, blah blah blahexample pragraph, blah blah blah</p>
			<!-- THIS SECTION WILL BE REPLACED BY SERVER GENERATED ROWS -->
		</div>
		<hr>
		<form method="post" action="">
			<label>Add comment</label>

			<!-- this will appear when user is not logged in -->
			<?php if (!array_key_exists('userEmail', $_SESSION)) echo
			'<fieldset class="form-group">
			<input type="email" class="form-control" id="userEmail1" name="userEmail" placeholder="User Email">
			</fieldset>'
			?>

			<fieldset class="form-group">
				<label id="<?php if(isset($_SESSION['userEmail'])) echo $_SESSION['userEmail']; ?>">
					<?php if (array_key_exists('userEmail', $_SESSION)) echo $_SESSION['userEmail'];?>
				</label>
				<textarea class="form-control" id="textarea" name="textarea" rows="3" placeholder="Say something"></textarea>
			</fieldset>

			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
		<?php
		# basic pdo connection (with added option for error handling)
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			if (!$_POST['textarea']) {
				echo "<p>Please supply all of the data! You may press your back button to attempt again minion!</p>";
				exit;
			} else {
				try {
					$STH = $dbh->prepare("INSERT INTO comments (email, content, product_id) VALUES (:email,:message,:product_id)");
					if( isset($_POST['userEmail'])){
						$STH->bindParam(':email', $_POST['userEmail']);
					}else{
						$STH->bindParam(':email', $_SESSION['userEmail']);
					}

					$STH->bindParam(':message', $_POST['textarea']);
					$STH->bindParam(':product_id', $_GET['id']);

					$STH->execute();
				} catch (PDOException $e) {
					echo $e->getMessage();
				}
				echo "<p><strong>submitted successfully</strong></p>";
			}
		}
		# close the connection
		$dbh = null;
		?>
	</div>



	<script type="text/javascript" src="js/comments.js"></script>
	<script type="text/javascript" src="js/animation.js"></script>


	<script src="js/bootstrap-tour.min.js"></script>
	<script src="js/productPageTour.js"></script>

	<?php

	include 'footer.php';
	?>	