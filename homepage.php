<?php
session_start();
include 'header.php';
?>
    <link rel="stylesheet" href="css/home.css" />
    <link href='http://fonts.googleapis.com/css?family=Oleo+Script' rel='stylesheet' type='text/css'>

<body>
    <img src="img/home.jpg" id="full-screen-background-image"/>

            <div class="container text-center" id="homepage" style="min-height: 80%; text-align: center; ">

                <h2>If you are looking for building supplies<br/>
                with the best prices. You are on the right place...</h2>
                <div style="margin-top: 30%"><a href="index.php" class="btn btn-default btn-sq btn-transparent btn-noboard" role="button" ><img src="img/search.png"/><br/><h2>Search </h2></a></div>
                <?php  if (!(isset($_SESSION['userEmail']))) echo '<br/> <div style="margin-top: 30%"><a href="login.php" class="btn btn-warning" role="button">Sign in</a>
        <br/><a href="login.php" >Join</a></div>'; ?>
                <?php if (isset($_SESSION['userEmail'])) echo ' <div style="margin-top: 30%"><h2>Hi ' . $_SESSION['userEmail'].'!</h2></div>';?>

	</div>

</body>


<?php
include 'footer.php';
?>