<!DOCTYPE html>
<html lang="en">
<head>
  <title>Project</title>
  <meta charset="utf-8"/>
  <link rel="stylesheet" href="css/rating.css" />
  <link rel="stylesheet" href="css/style.css" />  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
  integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

  <link rel="stylesheet" href="css/jquery.rateyo.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script type="text/javascript" src="js/products.js"></script>

  <link rel="icon" href="img/favico.png" type="image/x-icon" />
  
</head>

<body>
  <div id="content">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">

         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
         data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </button>
       <a class="navbar-brand" href="index.html">Chandi store</a>
     </div>

     <!-- Collect the nav links, forms, and other content for toggling -->
     <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="index.php"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search</a></li>
        <?php if (isset($_SESSION['userEmail'])) echo '<li><a href="userpage.php">'.'<span class="glyphicon glyphicon-user"
        aria-hidden="true"></span>'.' '. $_SESSION['userEmail'] . '</a></li>';?>
        <?php if (!array_key_exists('userEmail', $_SESSION)) echo '<li><a href="login.php"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Log in</a></li>'; ?>
        <?php if (!array_key_exists('userEmail', $_SESSION)) echo '<li><a href="signup.php"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Sign up</a></li>'; ?>
        <?php if (array_key_exists('userEmail', $_SESSION)) echo '<li><a href="logout.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Log out</a></li>'; ?>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li></li>
      </ul>


    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>